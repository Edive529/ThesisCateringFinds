<?php

include 'connectdb.php';
session_start();

$userid = $_SESSION['customerid'];

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
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

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

             <script
              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
              data-key="pk_test_51NIkXMSGeKy7WLs6P4GQfu5DuePNId864WbrdeQQptQ5XYAHHYL6QEkBx4sxqu3PCnnT7LqVlXmM0aWf8yYUlQ2e00yVJZ3M7T"
              data-amount=<?php echo str_replace(",","",$total2) * 100?>
              data-name="<?php echo $result?>"
              data-description="<?php echo $result?>"

              data-currency="php"
              data-locale="auto"
              data-label="Pay downpayment">
              </script>



<?php






if (isset($_POST['full_pay'])) {
include("./config.php");

  ?>


  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Find the Stripe button element
      var stripeButton = document.querySelector(".stripe-button");

      // Simulate a click event on the button
      stripeButton.click();
    });
  </script>

  // code...

  <?php

         $token = $_POST["stripeToken"];
         $contact_name = $_SESSION['username'];
         $token_card_type = $_POST["stripeTokenType"];
         $phone = $fetch_order['phonenum'];
         $email = $_SESSION['useremail'];
         $address = $fetch_order['event_address'];
         $amount = $fetch_order['grand_total'];
         $desc = $result;

         $stripe = new \Stripe\StripeClient('sk_test_51NIkXMSGeKy7WLs6bxSx9nJI5gytzyDJ7YnYK13AeCCwpuRzrBi4mjjtr6zgcAMt0NziY8tpaPVsjJdJCswsty5700D9443m68');

         $paymentIntent = $stripe->paymentIntents->create([
           'amount' => str_replace(",", "", $amount) * 100,
           'currency' => 'php',
           'description' => $desc,
           'payment_method_types' => ['card'],
           'metadata' => [
             'name' => $contact_name,
             'payment_type' => $token_card_type
           ],
         ]);

         if ($paymentIntent) {

           $update_orders = $pdo->prepare("UPDATE `tbl_catering_order_details` SET status = ? WHERE catering_id = ?");
           $update_orders->execute(['Full_payment', $get_id]);
         }
}





 ?>










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
  
   ?>

   </div>

</section>














<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="js/script.js"></script>

<?php include 'components/alert.php'; ?>

</body>
</html>
