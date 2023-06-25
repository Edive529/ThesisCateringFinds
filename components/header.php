<?php
include_once 'connectdb.php';

if ($_SESSION['useremail']=="" OR $_SESSION['role']!="customer" ) {
  header('location:index.php');
}
 ?>


<header class="header"  style="background-color:#2a9df4;">

   <section class="flex" >
     <a  type="button" onclick="goback()" class="back" style="    color: var(--white);
    margin-left: 2rem;
    font-size: 1.8rem;
    text-transform: capitalize;">Go Back</a>
      <a href="inindex.php" class="logo">CateringFinds</a>

      <nav class="navbar" >
        <a href="cateringMapsin.php" class="cart-btn">Map</a>
        <a href="rating.php" >Rate Orders</a>





         <a href="orders.php">Active Orders</a>
         <a href="orders_history.php">Order History</a>
         <?php
            $count_cart_items = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ?");
            $count_cart_items->execute([$userid]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="shopping_cart.php" class="cart-btn">cart<span><?= $total_cart_items; ?></span></a>
           <a href="index_Searchin.php" >Search <span class="fas fa-search" style="color:#2a9df4;"></span></a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>
   </section>
   <script>
    function goback(){
        window.history.go(-1);
    }

    $('#ph').on('keypress',function(){
         var text = $(this).val().length;
         if(text > 9){
              return false;
         }else{
            $('#ph').text($(this).val());
         }

    });
</script>

</header>
