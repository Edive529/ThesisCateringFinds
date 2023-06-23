<?php

include 'connectdb.php';
session_start();

$userid = $_SESSION['customerid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>My Orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<style media="screen">
  .box {
    height: 300px;
  }
</style>
<body>

<?php include 'components/header.php'; ?>

<section class="orders">

   <h1 class="heading">my orders</h1>

   <div class="box-container" >

   <?php

   $select_products = $pdo->prepare("select * from tbl_catering_order_details where userid = '$userid' AND status = 'approved' OR status = 'full_payment' order by date_of_reservation desc");
   $select_products->execute();
   if($select_products->rowCount() > 0){
      while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){;


   ?>
   <div class="box" <?php if( $fetch_prodcut['status'] == 'approved'){echo 'style="border:.2rem solid orange";';}elseif ($fetch_prodcut['status'] == 'full_payment') {
     echo 'style="border:.2rem solid green";';

   } ?>>
      <a href="view_order.php?get_id=<?= $fetch_prodcut['catering_id'] ?>">
         <p class="date"><i class="fa fa-calendar"></i><span><?=$fetch_prodcut['date_of_reservation'];  ?></span></p>

         <?php
          $commaDelimitedString = $fetch_prodcut['order_list'];
          $array = explode(",", $commaDelimitedString);
          $result = implode("<br>", $array);

?>

         <h3 class="name" style="letter-spacing: 1px; line-height: 1.8; font-size: 18px; text-align: center;"><?= $result ?></h3>

         <p class="status" style="color:<?php if($fetch_prodcut['status'] == 'approved'){echo 'orange';}elseif($fetch_prodcut['status'] == 'canceled'){echo 'red';}else{echo 'green';}; ?>"><?= $fetch_prodcut['status'] ?></p>
      </a>
   </div>
   <?php
 }
}



   // else{
   //    echo '<p class="empty">no orders found!</p>';
   // }
   ?>

   </div>

</section>














<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="js/script.js"></script>

<?php include 'components/alert.php'; ?>

</body>
</html>
