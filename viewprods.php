<?php

include 'connectdb.php';
session_start();



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
   <!-- Favicon -->
   <link href="img/favicon.ico" rel="icon">

   <!-- Google Web Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

   <!-- Icon Font Stylesheet -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

   <!-- Libraries Stylesheet -->
   <link href="lib/animate/animate.min.css" rel="stylesheet">
   <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

   <!-- Customized Bootstrap Stylesheet -->
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link href="bootstrap/css/style.css" rel="stylesheet">
   <style>#myBtn {
  display: none; /* Hidden by default */
  position: fixed; /* Fixed/sticky position */
  bottom: 20px; /* Place the button at the bottom of the page */
  right: 30px; /* Place the button 30px from the right */
  z-index: 99; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  background-color: red; /* Set a background color */
  color: white; /* Text color */
  cursor: pointer; /* Add a mouse pointer on hover */
  padding: 15px; /* Some padding */
  border-radius: 10px; /* Rounded corners */
  font-size: 18px; /* Increase font size */
}

#myBtn:hover {
  background-color: #555; /* Add a dark-grey background on hover */
}
.star {
     color: gold;
     font-size: 30px;
   }

</style>

</head>
<body>


<?php include 'components/header1.php'; ?>



    <!-- navmid Start -->

    <div class="container p-5 py-5" style="background-color:#ffffff;">
          <div class="position-relative d-flex">
              <div class="top-0 start-0 d-flex " >


                      <div class="d-flex p-4">
                        <?php
                        $id= isset($_GET['id']) ? $_GET['id'] : '';
                        $select = $pdo->prepare("select * from tbl_user where userid=$id");

                        $select->execute();
                        $row=$select->fetch(PDO::FETCH_ASSOC);

                        $restaurant_db = $row['restaurant'];
                        $phonenum_db = $row['phonenum'];
                        $address_db = $row['address'];
                        $banner_db = $row['banner'];

                        ?>

                      <div class="col col-lg-4 col-md-4 p-4">
                            <img class="image img-fluid " style="height:15rem; width:35rem; object-fit:cover; border-radius:50%;" src="admin/upload/<?php echo $banner_db; ?>"alt="">
                        </div>
                          <div class="col col-lg-8 col-md-4 p-4">

                              <h2 class="display-6 text-black "><?= $restaurant_db; ?></h2>

                              <hr>
                              <?php


                              $select = $pdo->prepare("select ROUND(AVG(rating)) as test, restaurant from tbl_orders where restaurant='$restaurant_db'");

                              $select->execute();
                              $row=$select->fetch(PDO::FETCH_ASSOC);

                              $rating_db = $row['test'];



                              ?>

                              <p class="fs-4 fw-medium text-black "> Ratings: <?php  for ($i = 1; $i <= $rating_db; $i++) {
                                echo '<span class="star">★</span>';
                              } ?> </p>

                              <p class="fs-4 fw-medium text-black "> Contact Number: <?php echo $phonenum_db; ?></p>

                              <p class="fs-4 fw-medium text-black "> Address: <?php echo $address_db ;?> </p>


                          </div>


                  </div>
          </div>

      </div>
      <hr>

        <nav class="navbar navbar-expand-lg navbar-light bg-white py-2">
        <center>
        <p id="maindish"></p>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav position-relative align-items-center">
            <li class="nav-item active">
                <a class="nav-link" href="#popular">Popular </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#maindish">Main Course</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#pasta">Pasta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#appetizer">Appetizer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#soup">Soup</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#dessert">Dessert</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#salad">Salad</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#package">Packages</a>
            </li>
            </ul>


        </div></center>


        </nav>

<section class="products "  style="background-color:#f8f9fa;">

   <h1 class="heading " >Main Course</h1>

   <div class="box-container">
     <?php
     $id= isset($_GET['id']) ? $_GET['id'] : '';
        $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where category = 'Main Dish' AND userid = $id ");
        $select_products->execute();
        if($select_products->rowCount() > 0){
           while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){

             $foodid = $fetch_prodcut['foodid'];











             $select_orders = $pdo->prepare("select ROUND(AVG(rating)) AS test from tbl_orders where foodid = $foodid;");
             $select_orders->execute();
             if($select_orders->rowCount() > 0){
                while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){

                        $value = $fetch_order['test'];



     ?>


   <form action="" method="POST" class="box" style="height:350px; width:280px;">
      <a href="productrate1.php?id=<?php echo $fetch_prodcut['foodid'];  ?>">



      <img  src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <?php
if ($value) {


      for ($i = 1; $i <= $value; $i++) {
      echo '<span class="star">★</span>';
    }
  }else {
    echo '<h4 style="padding-top:20px;">not yet rated</h4>';
  }


       ?>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">

      </a>



   </form>


   <?php
      }
   }}}else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>

   <p id="pasta"></p>

   <h1 class="heading py-5" >Pasta</h1>

   <div class="box-container">
     <?php
     $id= isset($_GET['id']) ? $_GET['id'] : '';
        $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where category = 'Pasta' AND userid = $id ");
        $select_products->execute();
        if($select_products->rowCount() > 0){
           while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){

             $foodid = $fetch_prodcut['foodid'];











             $select_orders = $pdo->prepare("select ROUND(AVG(rating)) AS test from tbl_orders where foodid = $foodid;");
             $select_orders->execute();
             if($select_orders->rowCount() > 0){
                while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){

                        $value = $fetch_order['test'];



     ?>


   <form action="" method="POST" class="box" style="height:350px; width:280px;">
      <a href="productrate1.php?id=<?php echo $fetch_prodcut['foodid'];  ?>">



      <img  src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <?php
if ($value) {


      for ($i = 1; $i <= $value; $i++) {
      echo '<span class="star">★</span>';
    }
  }else {
    echo '<h4 style="padding-top:20px;">not yet rated</h4>';
  }


       ?>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">

      </a>



   </form>


   <?php
      }
   }}}else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>


   <p id="appetizer"></p>

   <h1 class="heading py-5" >Appetizer</h1>

   <div class="box-container">
     <?php
     $id= isset($_GET['id']) ? $_GET['id'] : '';
        $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where category = 'Appetizer' AND userid = $id ");
        $select_products->execute();
        if($select_products->rowCount() > 0){
           while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){

             $foodid = $fetch_prodcut['foodid'];











             $select_orders = $pdo->prepare("select ROUND(AVG(rating)) AS test from tbl_orders where foodid = $foodid;");
             $select_orders->execute();
             if($select_orders->rowCount() > 0){
                while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){

                        $value = $fetch_order['test'];



     ?>


   <form action="" method="POST" class="box" style="height:350px; width:280px;">
      <a href="productrate1.php?id=<?php echo $fetch_prodcut['foodid'];  ?>">



      <img  src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <?php
   if ($value) {


      for ($i = 1; $i <= $value; $i++) {
      echo '<span class="star">★</span>';
    }
   }else {
    echo '<h4 style="padding-top:20px;">not yet rated</h4>';
   }


       ?>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">

      </a>



   </form>


   <?php
      }
   }}}else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>
   <p id="soup"></p>

   <h1 class="heading py-5" >Soup</h1>

   <div class="box-container">
     <?php
     $id= isset($_GET['id']) ? $_GET['id'] : '';
        $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where category = 'Soup' AND userid = $id ");
        $select_products->execute();
        if($select_products->rowCount() > 0){
           while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){

             $foodid = $fetch_prodcut['foodid'];











             $select_orders = $pdo->prepare("select ROUND(AVG(rating)) AS test from tbl_orders where foodid = $foodid;");
             $select_orders->execute();
             if($select_orders->rowCount() > 0){
                while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){

                        $value = $fetch_order['test'];



     ?>


   <form action="" method="POST" class="box" style="height:350px; width:280px;">
      <a href="productrate1.php?id=<?php echo $fetch_prodcut['foodid'];  ?>">



      <img  src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <?php
   if ($value) {


      for ($i = 1; $i <= $value; $i++) {
      echo '<span class="star">★</span>';
    }
   }else {
    echo '<h4 style="padding-top:20px;">not yet rated</h4>';
   }


       ?>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">

      </a>



   </form>


   <?php
      }
   }}}else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>
<p id="dessert"></p>

   <h1 class="heading py-5" >Dessert</h1>

   <div class="box-container">
     <?php
     $id= isset($_GET['id']) ? $_GET['id'] : '';
        $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where category = 'Dessert' AND userid = $id ");
        $select_products->execute();
        if($select_products->rowCount() > 0){
           while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){

             $foodid = $fetch_prodcut['foodid'];











             $select_orders = $pdo->prepare("select ROUND(AVG(rating)) AS test from tbl_orders where foodid = $foodid;");
             $select_orders->execute();
             if($select_orders->rowCount() > 0){
                while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){

                        $value = $fetch_order['test'];



     ?>


   <form action="" method="POST" class="box" style="height:350px; width:280px;">
      <a href="productrate1.php?id=<?php echo $fetch_prodcut['foodid'];  ?>">



      <img  src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <?php
 if ($value) {


      for ($i = 1; $i <= $value; $i++) {
      echo '<span class="star">★</span>';
    }
  }else {
    echo '<h4 style="padding-top:20px;">not yet rated</h4>';
  }


       ?>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">

      </a>



   </form>


   <?php
      }
   }}}else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>
   <p id="salad"></p>


   <h1 class="heading py-5" >Salad</h1>


   <div class="box-container">
     <?php
     $id= isset($_GET['id']) ? $_GET['id'] : '';
        $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where category = 'Salad' AND userid = $id ");
        $select_products->execute();
        if($select_products->rowCount() > 0){
           while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){

             $foodid = $fetch_prodcut['foodid'];











             $select_orders = $pdo->prepare("select ROUND(AVG(rating)) AS test from tbl_orders where foodid = $foodid;");
             $select_orders->execute();
             if($select_orders->rowCount() > 0){
                while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){

                        $value = $fetch_order['test'];



     ?>


   <form action="" method="POST" class="box" style="height:350px; width:280px;">
      <a href="productrate1.php?id=<?php echo $fetch_prodcut['foodid'];  ?>">



      <img  src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <?php
   if ($value) {


      for ($i = 1; $i <= $value; $i++) {
      echo '<span class="star">★</span>';
    }
   }else {
    echo '<h4 style="padding-top:20px;">not yet rated</h4>';
   }


       ?>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">

      </a>



   </form>


   <?php
      }
   }}}else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>
   <p id="package"></p>


   <h1 class="heading py-5" >Package</h1>


   <div class="box-container">
     <?php
     $id= isset($_GET['id']) ? $_GET['id'] : '';
        $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where category = 'Package' AND userid = $id ");
        $select_products->execute();
        if($select_products->rowCount() > 0){
           while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){

             $foodid = $fetch_prodcut['foodid'];











             $select_orders = $pdo->prepare("select ROUND(AVG(rating)) AS test from tbl_orders where foodid = $foodid;");
             $select_orders->execute();
             if($select_orders->rowCount() > 0){
                while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){

                        $value = $fetch_order['test'];



     ?>


   <form action="" method="POST" class="box" style="height:350px; width:280px;">
      <a href="productrate1.php?id=<?php echo $fetch_prodcut['foodid'];  ?>">



      <img  src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <?php
   if ($value) {


      for ($i = 1; $i <= $value; $i++) {
      echo '<span class="star">★</span>';
    }
   }else {
    echo '<h4 style="padding-top:20px;">not yet rated</h4>';
   }


       ?>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">

      </a>



   </form>


   <?php
      }
   }}}else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>

   <style media="screen">
    .box-container {
       display: flex;
       flex-wrap: wrap;
    }

    .box {
       flex: 0 0 80px; /* Set a fixed width for the boxes */
       background-color: #f9f9f9;
       padding: 5px; /* Decreased padding to make the boxes smaller */
       border-radius: 8px;
       margin: 5px; /* Added margin to create space between the boxes */
    }

    .box-container .image {
       width: 20px; /* Decreased image size */
       height: 40px; /* Decreased image size */
       object-fit: cover;

       margin-right: 5px; /* Decreased margin */
    }

    .name {
       font-size: 14px; /* Decreased font size */
       margin: 0;
    }

    .flex {
       display: flex;
       margin-bottom: 5px; /* Decreased margin */
    }

    .price {
       margin-right: 3px; /* Decreased margin */
       font-size: 12px; /* Decreased font size */
    }

    .qty {
       width: 20px; /* Decreased input width */
       text-align: center;
       padding: 3px;
    }

    .btn {
       background-color: #0088cc;
       color: #fff;
       text-decoration: none;
       padding: 3px 6px; /* Decreased padding */
       border-radius: 4px;
       font-size: 14px; /* Decreased font size */
    }

    .delete-btn {
       color: #fff;
       text-decoration: none;
       font-size: 14px; /* Decreased font size */
    }

    a:hover {
       color: #666565;
    }
 </style>



</section>


<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>




<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="js/script.js"></script>
 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="bootstrap/js/main.js"></script>
    <script>// Get the button:
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}</script>


<?php include 'components/alert.php'; ?>

</body>

</html>
