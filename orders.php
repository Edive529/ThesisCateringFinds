<?php

include 'connectdb.php';

if(isset($_COOKIE['userid'])){
   $userid = $_COOKIE['userid'];
}else{
   setcookie('userid', create_unique_id(), time() + 60*60*24*30);
}

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
<body>

<?php include 'components/header.php'; ?>

<section class="orders">

   <h1 class="heading">my orders</h1>

   <div class="box-container">

   <?php
      $select_orders = $pdo->prepare("SELECT * FROM `tbl_catering_order_details` WHERE userid = ? ORDER BY date_of_reservation DESC");
      $select_orders->execute([$userid]);
      if($select_orders->rowCount() > 0){
         while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){
            $select_product = $pdo->prepare("SELECT * FROM `tbl_foodmenu` WHERE foodid = ?");
            $select_product->execute([$fetch_order['foodid']]);
            if($select_product->rowCount() > 0){
               while($fetch_product = $select_product->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box" <?php if($fetch_order['status'] == 'canceled'){echo 'style="border:.2rem solid red";';}; ?>>
      <a href="view_order.php?get_id=<?= $fetch_order['catering_id']; ?>">
         <p class="date"><i class="fa fa-calendar"></i><span><?= $fetch_order['date_of_reservation']; ?></span></p>
         <img src="admin/upload/<?= $fetch_product['image']; ?>" class="image" alt="">
         <h3 class="name"><?= $fetch_product['food']; ?></h3>
         <p class="price"><i class="fas fa-peso-sign"></i> <?= $fetch_order['saleprice']; ?> x <?= $fetch_order['qty']; ?></p>
         <p class="status" style="color:<?php if($fetch_order['status'] == 'delivered'){echo 'green';}elseif($fetch_order['status'] == 'canceled'){echo 'red';}else{echo 'orange';}; ?>"><?= $fetch_order['status']; ?></p>
      </a>
   </div>
   <?php
            }
         }
      }
   }else{
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
