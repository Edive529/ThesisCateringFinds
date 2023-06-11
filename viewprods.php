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
}</style>

</head>
<body>


<?php include 'components/header1.php'; ?>



    <!-- navmid Start -->

    <div class="container p-5 py-5" style="background-color:#ffffff;">
          <div class="position-relative d-flex">
              <div class="top-0 start-0 d-flex " >


                      <div class="d-flex p-4">

                      <div class="col col-lg-8 col-md-4 p-4">
                            <img class="image img-fluid " src="img/car/avd.jpg"alt="">
                        </div>
                          <div class="col col-lg-8 col-md-4 p-4">
                            <?php
                            $id= isset($_GET['id']) ? $_GET['id'] : '';
                            $select = $pdo->prepare("select * from tbl_user where userid=$id");

                            $select->execute();
                            $row=$select->fetch(PDO::FETCH_ASSOC);

                            $restaurant_db = $row['restaurant'];
                            $phonenum_db = $row['phonenum'];
                            $address_db = $row['address'];

                            ?>
                              <h2 class="display-6 text-black "><?= $restaurant_db; ?></h2>

                              <hr>

                              <p class="fs-4 fw-medium text-black "> Ratings: </p>

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
     ?>


   <form action="" method="POST" class="box">
      <img src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">
      <div class="flex">
         <p class="price"><i class="fas fa-peso-sign"></i><?= $fetch_prodcut['saleprice'] ?></p>
         <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
      </div>

      <a href="reglogin.php" name="" value="" class="btn">Add to cart</a>
      <a href="reglogin.php" class="delete-btn">buy now</a>
   </form>


   <?php
      }
   }else{
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
   ?>
   <form action="" method="POST" class="box">
      <img src="admin/upload/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['food'] ?></h3>
      <input type="hidden" name="foodid" value="<?= $fetch_prodcut['foodid']; ?>">
      <div class="flex">
         <p class="price"><i class="fas fa-peso-sign"></i><?= $fetch_prodcut['saleprice'] ?></p>
         <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
      </div>
      <input type="submit" name="add_to_cart" value="add to cart" class="btn" >
      <a href="" class="delete-btn">buy now</a>
   </form>
   <?php
      }
   }else{
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
      <a href="" class="delete-btn">buy now</a>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>
<p id="dessert"></p>

   <h1 class="heading py-5" >Dessert</h1>

   <div class="box-container ">

   <?php
   $id= isset($_GET['id']) ? $_GET['id'] : '';
      $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where category = 'Dessert' AND userid = $id ");
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
      <a href="" class="delete-btn">buy now</a>
   </form>
   <?php
      }
   }else{
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
      <a href="" class="delete-btn">buy now</a>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>

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
