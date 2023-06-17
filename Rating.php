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
<body>

<?php include 'components/header.php'; ?>

<section class="orders">

   <h1 class="heading">Rate Orders</h1>

   <div class="box-container">

   <?php

   $select_products = $pdo->prepare("select * from tbl_orders where user_id = '$userid' and status = 'Rate me?' order by date desc");
   $select_products->execute();
   if($select_products->rowCount() > 0){
      while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){

        $food = $fetch_prodcut['foodid'];



   ?>
   <div class="box" <?php if ($fetch_prodcut['status'] == 'Rate me?') { echo 'style="border:0.2rem solid red;"'; } ?>>

      <a href="view_rating.php?get_id=<?= $fetch_prodcut['id'] ?>">
         <p class="date"><i class="fa fa-calendar"></i><span><?=$fetch_prodcut['date'];  ?></span></p>

         <?php

         $select_products1 = $pdo->prepare("select food from tbl_foodmenu where foodid = '$food'");
         $select_products1->execute();
         if($select_products1->rowCount() > 0){
            while($fetch_prodcut1 = $select_products1->fetch(PDO::FETCH_ASSOC)){

              $result = $fetch_prodcut1['food'];



          ?>



         <h3 class="name" style="letter-spacing: 1px; line-height: 1.8; font-size: 18px; text-align: center;"><?= $result ?></h3>

         <p class="status" style="color:<?php if($fetch_prodcut['status'] == 'Already Rated!'){echo 'green';}elseif($fetch_prodcut['status'] == 'Rate me?'){echo 'red';}else{echo 'orange';}; ?>"><?= $fetch_prodcut['status'] ?></p>
      </a>
   </div>
   <?php
 }
}}}



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
