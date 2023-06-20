<?php

include 'connectdb.php';
session_start();

$userid = $_SESSION['customerid'];

if(isset($_POST['update_cart'])){

   $cart_id = $_POST['cart_id'];
   $cart_id = filter_var($cart_id, FILTER_SANITIZE_STRING);
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);

   $update_qty = $pdo->prepare("UPDATE `tbl_cart` SET qty = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);

   $success_msg[] = 'Cart quantity updated!';

}

if(isset($_POST['delete_item'])){

   $cart_id = $_POST['cart_id'];
   $cart_id = filter_var($cart_id, FILTER_SANITIZE_STRING);

   $verify_delete_item = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE id = ?");
   $verify_delete_item->execute([$cart_id]);

   if($verify_delete_item->rowCount() > 0){
      $delete_cart_id = $pdo->prepare("DELETE FROM `tbl_cart` WHERE id = ?");
      $delete_cart_id->execute([$cart_id]);
      $success_msg[] = 'Cart item deleted!';
   }else{
      $warning_msg[] = 'Cart item already deleted!';
   }

}

if(isset($_POST['empty_cart'])){

   $verify_empty_cart = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ?");
   $verify_empty_cart->execute([$userid]);

   if($verify_empty_cart->rowCount() > 0){
      $delete_cart_id = $pdo->prepare("DELETE FROM `tbl_cart` WHERE customerid = ?");
      $delete_cart_id->execute([$userid]);
      $success_msg[] = 'Cart emptied!';
   }else{
      $warning_msg[] = 'Cart already emptied!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- header -->
<?php include 'components/header.php'; ?>



<section class="products">

   <h1 class="heading">shopping cart</h1>

   <div class="box-container">

   <?php
      $grand_total = 0;
      $select_cart = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ?");
      $select_cart->execute([$userid]);
      if($select_cart->rowCount() > 0){
         while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){

         $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` WHERE foodid = ?");
         $select_products->execute([$fetch_cart['foodid']]);
         if($select_products->rowCount() > 0){
            $fetch_product = $select_products->fetch(PDO::FETCH_ASSOC);

            $foodid1 =$fetch_product['foodid'];

   ?>
   <form action="" method="POST" class="box">
      <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
      <img src="admin/upload/<?= $fetch_product['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_product['food']; ?></h3>
      <div class="flex">
         <p class="price"><i class="fas fa-peso-sign"></i> <?= $fetch_cart['price']; ?></p>
         <input type="number" name="qty" required min="1" value="<?= $fetch_cart['qty']; ?>" max="99" maxlength="2" class="qty">
         <button type="submit" name="update_cart" class="fas fa-edit">
         </button>
      </div>
      <p class="sub-total">sub total : <span><i class="fas fa-peso-sign"></i> <?= $sub_total = ($fetch_cart['qty'] * $fetch_cart['price']); ?></span></p>
      <input type="submit" value="delete" name="delete_item" class="delete-btn" onclick="return confirm('delete this item?');">
   </form>
   <?php
      $grand_total += $sub_total;
      }else{
         echo '<p class="empty">product was not found!</p>';
      }
      }
   }else{
      echo '<p class="empty">your cart is empty!</p>';
   }
   ?>

   </div>

   <?php if($grand_total != 0){ ?>
      <div class="cart-total">
         <p>grand total : <span><i class="fas fa-peso-sign"></i> <?= $grand_total; ?></span></p>
         <form action="" method="POST">
          <input type="submit" value="empty cart" name="empty_cart" class="delete-btn" onclick="return confirm('empty your cart?');">
         </form>
         <a href="checkout.php?id=<?php echo $foodid1;  ?>" class="btn">proceed to checkout</a>
      </div>
   <?php } ?>

</section>





<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="js/script.js"></script>

<?php include 'components/alert.php'; ?>

</body>
</html>
