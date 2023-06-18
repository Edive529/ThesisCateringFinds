<?php
include_once 'connectdb.php';

if ($_SESSION['useremail']=="" OR $_SESSION['role']!="customer" ) {
  header('location:index.php');
}
 ?>


<header class="header"  style="background-color:#ffa7a6;">

   <section class="flex" >
      <a href="inindex.php" class="logo">CateringFinds</a>

      <nav class="navbar" >
        <a href="rating.php" >Rate Orders</a>

        <a href="cateringMapsin.php" class="cart-btn">Map</a>



         <a href="orders.php">my orders</a>
         <?php
            $count_cart_items = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ?");
            $count_cart_items->execute([$userid]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="shopping_cart.php" class="cart-btn">cart<span><?= $total_cart_items; ?></span></a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>
   </section>

</header>
