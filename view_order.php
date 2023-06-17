<?php

include 'connectdb.php';
session_start();

$userid = $_SESSION['customerid'];

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:orders.php');
}

if(isset($_POST['cancel'])){

   $update_orders = $pdo->prepare("UPDATE `tbl_catering_order_details` SET status = ? WHERE catering_id = ?");
   $update_orders->execute(['canceled', $get_id]);
   header('location:orders.php');

}

if(isset($_POST['down_pay'])){

   $update_orders = $pdo->prepare("UPDATE `tbl_catering_order_details` SET status = ? WHERE catering_id = ?");
   $update_orders->execute(['down_payment', $get_id]);
   header('location:orders.php');

}

if(isset($_POST['full_pay'])){

   $update_orders = $pdo->prepare("UPDATE `tbl_catering_order_details` SET status = ? WHERE catering_id = ?");
   $update_orders->execute(['Full_payment', $get_id]);
   header('location:orders.php');

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/header.php'; ?>

<section class="order-details">

   <h1 class="heading">order details</h1>

   <div class="box-container">

   <?php
      $grand_total = 0;
      $select_orders = $pdo->prepare("SELECT * FROM `tbl_catering_order_details` WHERE catering_id = ? LIMIT 1");
      $select_orders->execute([$get_id]);
      if($select_orders->rowCount() > 0){
         while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){

          $total2= $fetch_order['grand_total'];

          $total3 = $total2/2;


   ?>
   <div class="box">
      <div class="col">
         <p class="title"><i class="fas fa-calendar"></i><?= $fetch_order['date_of_reservation']; ?></p>

         <?php
          $commaDelimitedString = $fetch_order['order_list'];
          $array = explode(",", $commaDelimitedString);
          $result = implode("<br>", $array);

?>


         <h3 class="name" style="letter-spacing: 1px; line-height: 2.0; font-size: 25px; text-align: center;"><?= $result ?></h3>

      </div>
      <div class="col">
         <p class="title">billing address</p>
         <p class="user"><i class="fas fa-user"></i><?php echo $_SESSION['username'] ?></p>
         <p class="user"><i class="fas fa-phone"></i><?= $fetch_order['phonenum']; ?></p>
         <p class="user"><i class="fas fa-envelope"></i><?php echo $_SESSION['useremail'] ?></p>
         <p class="user"><i class="fas fa-map-marker-alt"></i><?= $fetch_order['event_address']; ?></p>
         <p class="user"><i class="fas fa-calendar"></i><?= $fetch_order['date_to_be_delivered']; ?></p>
         <p class="user"><i class="fas fa-money-bill"></i><?= $fetch_order['payment_type']; ?></p>
         <p class="title">status</p>
         <p class="status" style="color:<?php if($fetch_order['status'] == 'Not yet approved'){echo 'red';}elseif($fetch_order['status'] == 'canceled'){echo 'red';}else{echo 'green';}; ?>"><?= $fetch_order['status']; ?></p>
         <?php if ($fetch_order['status'] == 'approved') { ?>

           <form action="" method="POST" style="display: flex; justify-content: center;">
               <input type="submit" value="Down Payment?" name="down_pay" class="btn" style="width:200px; margin-right:20px;" onclick="return confirm('Are you sure you want to Down payment (Php <?php echo $total3;  ?>)?');">
               <input type="submit" value="Full Payment?" name="full_pay" class="btn" style="width:200px;" onclick="return confirm('Are you sure you want to pay?');">
           </form>

       <?php } elseif ($fetch_order['status'] == 'down_payment' || $fetch_order['status'] == 'full_payment') { ?>

           <input type="submit" value="In Progress" name="" class="btn" onclick="return confirm('Order is in progress!');">

       <?php } elseif ($fetch_order['status'] == 'Not yet approved') { ?>

           <form action="" method="POST">
               <input type="submit" value="cancel order" name="cancel" class="delete-btn" onclick="return confirm('cancel this order?');">
           </form>

       <?php } ?>

      </div>
   </div>
   <?php

         }
      }
   else{
      echo '<p class="empty">no orders found!</p>';
   }
   ?>

   </div>

</section>














<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="js/script.js"></script>

<?php include 'components/alert.php'; ?>

</body>
</html>
