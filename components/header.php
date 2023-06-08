<header class="header">

   <section class="flex">
      <a href="#" class="logo">Logo</a>

      <nav class="navbar">
         <a href="add_product.php">add product</a>
         <a href="view_products.php">view products</a>
         <?php
            $count_order_items = $pdo->prepare("SELECT * FROM `tbl_catering_order_details` WHERE userid = ?");
            $count_order_items->execute([$userid]);
            $total_order_items = $count_order_items->rowCount();
         ?>
         <a href="orders.php">my orders<span><?= $total_order_items; ?></span></a>
         <?php
            $count_cart_items = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE userid = ?");
            $count_cart_items->execute([$userid]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="shopping_cart.php" class="cart-btn">cart<span><?= $total_cart_items; ?></span></a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>
   </section>

</header>
