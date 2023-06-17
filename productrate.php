<?php

include 'connectdb.php';
session_start();




$userid = $_SESSION['customerid'];



if(isset($_POST['add_to_cart'])){

  $id= isset($_GET['id']) ? $_GET['id'] : '';
     $select = $pdo->prepare("select * from tbl_foodmenu where foodid=$id");
     $select->execute();
     if($select->rowCount() > 0){
        while($fetch1 = $select->fetch(PDO::FETCH_ASSOC)){

          $user_db = $fetch1['restaurant'];
        }}








   $foodid = $_POST['foodid'];
   $foodid = filter_var($foodid, FILTER_SANITIZE_STRING);
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);

   $verify_cart = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ? AND foodid = ?");
   $verify_cart->execute([$userid, $foodid]);

   $verify_restaurant = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ? AND restaurant = ?");
   $verify_restaurant->execute([$userid, $user_db]);

   $max_cart_items = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ?");
   $max_cart_items->execute([$userid]);


   $verify_restaurant = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ?");
   $verify_restaurant->execute([$userid]);

   if ($verify_restaurant->rowCount() > 0) {
       // Cart already has items, check if they are from the same restaurant
       $cart_restaurant = $verify_restaurant->fetch(PDO::FETCH_ASSOC)['restaurant'];

       if ($cart_restaurant !== $user_db) {
           $warning_msg[] = 'You can only choose 1 restaurant per order. Please either proceed to checkout or empty your cart!';
       } else {
           // Items in the cart are from the same restaurant, proceed with adding to cart

           if ($verify_cart->rowCount() > 0) {
               $warning_msg[] = 'Already added to cart!';
           } elseif ($max_cart_items->rowCount() == 10) {
               $warning_msg[] = 'Cart is full!';
           } else {
               // Code to add item to cart...

               $select_price = $pdo->prepare("SELECT * FROM `tbl_foodmenu` WHERE foodid = ? LIMIT 1");
               $select_price->execute([$foodid]);
               $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

               $insert_cart = $pdo->prepare("INSERT INTO `tbl_cart`(customerid, restaurant, foodid, price, qty) VALUES(?,?,?,?,?)");
               $insert_cart->execute([$userid, $user_db, $foodid, $fetch_price['saleprice'], $qty]);
               $success_msg[] = 'Added to cart!';
           }
       }
   } else {
       // Cart is empty, can add items from any restaurant

       if ($verify_cart->rowCount() > 0) {
           $warning_msg[] = 'Already added to cart!';
       } elseif ($max_cart_items->rowCount() == 10) {
           $warning_msg[] = 'Cart is full!';
       } else {
           // Code to add item to cart...

           $select_price = $pdo->prepare("SELECT * FROM `tbl_foodmenu` WHERE foodid = ? LIMIT 1");
           $select_price->execute([$foodid]);
           $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

           $insert_cart = $pdo->prepare("INSERT INTO `tbl_cart`(customerid, restaurant, foodid, price, qty) VALUES(?,?,?,?,?)");
           $insert_cart->execute([$userid, $user_db, $foodid, $fetch_price['saleprice'], $qty]);
           $success_msg[] = 'Added to cart!';
       }
   }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

   <!-- Customized Bootstrap Stylesheet -->
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link href="bootstrap/css/style.css" rel="stylesheet">
   <link href="css/style.css" rel="stylesheet">
    <style>

.card {
    border-radius: 5px;
    background-color: #fff;
    padding-left: 60px;
    padding-right: 60px;
    margin-top: 30px;
    padding-top: 30px;
    padding-bottom: 30px
}

.rating-box {
    width: 130px;
    height: 130px;
    margin-right: auto;
    margin-left: auto;
    background-color: #FBC02D;
    color: #fff
}

.rating-label {
    font-weight: bold
}

.rating-bar {
    width: 300px;
    padding: 8px;
    border-radius: 5px
}

.bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
    border-radius: 20px;
    cursor: pointer;
    margin-bottom: 5px
}

.bar-5 {
    width: 70%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
}

.bar-4 {
    width: 30%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
}

.bar-3 {
    width: 20%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
}

.bar-2 {
    width: 10%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
}

.bar-1 {
    width: 0%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
}

td {
    padding-bottom: 10px
}

.star-active {
    color: #FBC02D;
    margin-top: 10px;
    margin-bottom: 10px
}

.star-active:hover {
    color: #F9A825;
    cursor: pointer
}

.star-inactive {
    color: #CFD8DC;
    margin-top: 10px;
    margin-bottom: 10px
}

.blue-text {
    color: #0091EA
}

.content {
    font-size: 18px
}

.profile-pic {
    width: 90px;
    height: 90px;
    border-radius: 100%;
    margin-right: 30px
}

.pic {
    width: 80px;
    height: 80px;
    margin-right: 10px
}

.vote {
    cursor: pointer
}
.star {
     color: gold;
     font-size: 30px;
   }


</style>

    <title>Homepage</title>
</head>
<body>

<div class="container bg-white p-0 ">
   <!-- Spinner Start -->
   <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

 <!-- header -->
<?php include 'components/header.php'; ?>

<?php
$id= isset($_GET['id']) ? $_GET['id'] : '';
$select=$pdo->prepare("select ROUND(AVG(rating)) AS test from tbl_orders where foodid = $id;");

$select->execute();

$row=$select->fetch(PDO::FETCH_OBJ);

$value=($row->test);

$id= isset($_GET['id']) ? $_GET['id'] : '';
   $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where foodid= $id ");
   $select_products->execute();


      $fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC);


      $restaurant = $fetch_prodcut['userid'];



      // $restaurant =($fetch_prodcut->userid);
      // $foodid1 =($fetch_prodcut->foodid);
      // $image =($fetch_prodcut->image);
      // $food =($fetch_prodcut->food);
      // $saleprice =($fetch_prodcut->saleprice);
      // $description =($fetch_prodcut->description);
      // $package_description =($fetch_prodcut->package_description);
?>
     <!-- top Start -->
 <div class="container-fluid mb-5">
      <div class="position-relative ">
          <div class=" position-relative">
              <div class=" top-0 start-0 w-100 h-100 d-flex align-items-center" style="background:  #ffffff;">
                  <div class="container p-4">

                    <form action="" method="post">

                      <div class="row justify-content-start ">



                      <div class="col-4 col-lg-2">


                            <img class="img-fluid w-auto h-auto" src="admin/upload/<?php echo $fetch_prodcut['image']; ?>"alt="">
                          </div>
                          <div class="col-4 col-lg-6">
                              <h1 class="display-5 text-black animated slideInDown mb-4"><?php echo $fetch_prodcut['food']; ?></h1>
                              <input type="hidden" name="foodid" value="<?=  $fetch_prodcut['foodid']; ?>">

                              <p class="fs-2 fw-medium text-black ">Rating: </p><p class=""><span class="text-muted"><?php echo $value; ?></span>
																<?php
									  // Generate stars based on the rating value
									  for ($i = 1; $i <= $value; $i++) {
										echo '<span class="star">★</span>';
									  }
									?>


                              <hr>
                              <p class="fs-2 fw-medium text-black ">Price: Php <?php echo $fetch_prodcut['saleprice']; ?></p>

                              <p class="fs-2 fw-medium text-black ">Description: </p>

                                <br><br>
                              <p class="fs-2 fw-medium text-black position-bottom"><?php echo $fetch_prodcut['description'];   ?></p>
                              <p class="fs-2 fw-medium text-black position-bottom"><?php echo $fetch_prodcut['package_description']; ?></p>



                            <div class="form-outline row " style="width: 50%; padding:4px;">
                                <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="col form-control fs-2 fw-medium text-black " />



                                <input type="submit" name="add_to_cart" value="add to cart" class="btn btn-primary col m-1 ">
                            </div>

                          </div>



                      </div>

                       </form>
                  </div>
              </div>
          </div>

      </div>
  </div>

  <!--   End -->
<hr>

    <!--restaurant reviews Start -->
            <div class=" container d-flex p-2 align-items-center">
                <h2 class=" text-black animated slideInDown mb-4"><?php echo $fetch_prodcut['food']; ?> Reviews</h2>
            </div>


            <div class=" footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s" style="background-color:#e0e0e0;">
            <div class=" p-5">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-4 align-items-center">
                      <?php


                         $select_products1 = $pdo->prepare("SELECT * FROM `tbl_user` where userid= $restaurant");
                         $select_products1->execute();


                            $fetch_prodcut1 = $select_products1->fetch(PDO::FETCH_OBJ);

                            if ($fetch_prodcut1) {
                              $restaurant1 =($fetch_prodcut1->restaurant);
                              $phonenum =($fetch_prodcut1->phonenum);
                              $address =($fetch_prodcut1->address);
                              $banner = ($fetch_prodcut1->banner);








                       ?>
                        <h3 class="text-black mb-4"><?php echo $value; ?> out of 5</h3>

                        <div class="d-flex">
							<p class=""><span class="text-muted"><?php echo $value; ?></span>
														<?php
									  // Generate stars based on the rating value
									  for ($i = 1; $i <= $value; $i++) {
										echo '<span class="star">★</span>';
									  }
									?>

						</div>

                    </div>




                    <div class="col-lg-4 col-md-6 d-flex">


                        <img src="admin/upload/<?php echo $banner; ?>" class="img-fluid rounded-circle shadow-strong" style="width:100px; height:100px; " alt="">
                        <h2 style="margin-top: 27px; margin-left: 27px;"><?php echo $restaurant1; ?></h2>
                        <p class="m-2 fs-3 fw-medium text-black "></p>

                    </div>


                    <div class="col-lg-4 col-md-6">

                    <p class="fs-3 fw-medium text-black ">Contact Number: <?php echo $phonenum; }?></p>
                    <p class="fs-3 fw-medium text-black ">Address: <?php echo $address; ?></p>

                        <div class="position-relative mx-auto" style="max-width: 400px;">

                        </div>
                    </div>

                </div>
            </div>

        </div>


















  <!--   End -->

  <!--user reviews Start -->
<div class="container-fluid px-1 py-5 mx-auto">

    <div class="row justify-content-left">
        <div class=" col-12 mb-5">

          <?php

                  $id= isset($_GET['id']) ? $_GET['id'] : '';
                     $select_products = $pdo->prepare("select * from tbl_orders where foodid = $id;");
                     $select_products->execute();
                     if($select_products->rowCount() > 0){
                        while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){


                          $name = $fetch_prodcut['name'];
                          $review = $fetch_prodcut['review'];
                          $date = $fetch_prodcut['date'];
                          $star = $fetch_prodcut['rating'];
                          $userid = $fetch_prodcut['user_id'];















                          $select_products1 = $pdo->prepare("select * from tbl_customer where customerid = $userid;");
                          $select_products1->execute();
                          if($select_products1->rowCount() > 0){
                             while($fetch_prodcut1 = $select_products1->fetch(PDO::FETCH_ASSOC)){

                             $icon = $fetch_prodcut1['image'];





           ?>

            <div class="card">
                <div class="d-flex">
					<div class="">
						<img class="profile-pic" src="admin/upload/<?php echo $icon; ?>">
					</div>
					<div class="d-flex flex-column">
						<h3 class=""><?php echo $name; ?></h3>
						<div class="d-flex">
							<p class=""><span class="text-muted"><?php echo $star; ?></span>
                <?php
                // Generate stars based on the rating value
                for ($i = 1; $i <= $star; $i++) {
                echo '<span class="star">★</span>';
                }
              ?>



						</div>
                        <p class="text-muted text-left "><?php echo $date; ?></p>

                        <div class="row text-left">

                            <p class="content"><?php echo $review ?></p>
                        </div>

					</div>
				</div>
            </div>
          <?php }}}} else {
            echo '<div class="" style="text-align:center;"><h1 style="color: red;">No Reviews!</h1></div>';
          }?>





        </div>
    </div>
</div>



</div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/main.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<?php include 'components/alert.php'; ?>
</body>
</html>
