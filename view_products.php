<?php

include 'connectdb.php';
session_start();

$userid = $_SESSION['customerid'];

if(isset($_POST['add_to_cart'])){

  


   $foodid = $_POST['foodid'];
   $foodid = filter_var($foodid, FILTER_SANITIZE_STRING);
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);

   $verify_cart = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ? AND foodid = ?");
   $verify_cart->execute([$userid, $foodid]);

   $max_cart_items = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ?");
   $max_cart_items->execute([$userid]);

   if($verify_cart->rowCount() > 0){
      $warning_msg[] = 'Already added to cart!';
   }elseif($max_cart_items->rowCount() == 10){
      $warning_msg[] = 'Cart is full!';
   }else{

      $select_price = $pdo->prepare("SELECT * FROM `tbl_foodmenu` WHERE foodid = ? LIMIT 1");
      $select_price->execute([$foodid]);
      $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

      $insert_cart = $pdo->prepare("INSERT INTO `tbl_cart`(customerid, foodid, price, qty) VALUES(?,?,?,?)");
      $insert_cart->execute([$userid, $foodid, $fetch_price['saleprice'], $qty]);
      $success_msg[] = 'Added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Products</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/header.php'; ?>

<section class="products">

   <h1 class="heading">Main Dish</h1>

   <div class="box-container">

   <?php
      $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where category = 'Main Dish' ");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="POST" class="box">
      <img src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">
      <div class="flex">
         <p class="price"><i class="fas fa-peso-sign"></i><?= $fetch_prodcut['saleprice'] ?></p>
         <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
      </div>
      <input type="submit" name="add_to_cart" value="add to cart" class="btn">
      <a href="checkout.php?get_id=<?= $fetch_prodcut['foodid']; ?>" class="delete-btn">buy now</a>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>

   <h1 class="heading">Appetizer</h1>

   <div class="box-container">

   <?php
      $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where category = 'Appetizer' ");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="POST" class="box">
      <img src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">
      <div class="flex">
         <p class="price"><i class="fas fa-peso-sign"></i><?= $fetch_prodcut['saleprice'] ?></p>
         <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
      </div>
      <input type="submit" name="add_to_cart" value="add to cart" class="btn">
      <a href="checkout.php?get_id=<?= $fetch_prodcut['foodid']; ?>" class="delete-btn">buy now</a>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>

   <h1 class="heading">Soup</h1>

   <div class="box-container">

   <?php
      $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where category = 'Soup' ");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="POST" class="box">
      <img src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">
      <div class="flex">
         <p class="price"><i class="fas fa-peso-sign"></i><?= $fetch_prodcut['saleprice'] ?></p>
         <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
      </div>
      <input type="submit" name="add_to_cart" value="add to cart" class="btn">
      <a href="checkout.php?get_id=<?= $fetch_prodcut['foodid']; ?>" class="delete-btn">buy now</a>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>


   <h1 class="heading">Dessert</h1>

   <div class="box-container">

   <?php
      $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where category = 'Dessert' ");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="POST" class="box">
      <img src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">
      <div class="flex">
         <p class="price"><i class="fas fa-peso-sign"></i><?= $fetch_prodcut['saleprice'] ?></p>
         <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
      </div>
      <input type="submit" name="add_to_cart" value="add to cart" class="btn">
      <a href="checkout.php?get_id=<?= $fetch_prodcut['foodid']; ?>" class="delete-btn">buy now</a>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>


   <h1 class="heading">Salad</h1>


   <div class="box-container">

   <?php
      $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where category = 'Salad'");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="POST" class="box">
      <img src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">
      <div class="flex">
         <p class="price"><i class="fas fa-peso-sign"></i><?= $fetch_prodcut['saleprice'] ?></p>
         <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
      </div>
      <input type="submit" name="add_to_cart" value="add to cart" class="btn">
      <a href="checkout.php?get_id=<?= $fetch_prodcut['foodid']; ?>" class="delete-btn">buy now</a>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>

</section>







<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="js/script.js"></script>

<?php include 'components/alert.php'; ?>

</body>
</html>
