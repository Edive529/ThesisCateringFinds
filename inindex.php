<?php
include_once 'connectdb.php';
session_start();

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

   <!-- Customized Bootstrap Stylesheet -->
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link href="bootstrap/css/style.css" rel="stylesheet">

    <title>Homepage </title>
</head>
<body>
      <!-- <h1><?php echo $_SESSION['username']; ?></h1> -->

    <div class="container-xxl bg-white p-0">

   <!-- Spinner Start -->
   <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light shadow sticky-top p-0 " style="background-color: #2a9df4; ">
      <div class="container-fluid">
      <a href="inindex.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h2 class="m-0 text-primary">CateringFinds</h2>
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">

            </li>
            <li class="nav-item">

            </li>
            <li class="nav-item  ">

            </li>
            <li class="nav-item">
            </li>
          </ul>

          <a href="rating.php" style = "padding:30px;">Rate Orders</a>


          <a href="orders.php" style = "padding:30px;">My Orders</a>

          <a href="shopping_cart.php" class="cart-btn" style = "padding:30px;">My Cart</a>

          <a href="logout.php" style = "padding:30px;">Logout</a>
 
            <a href="profilepage.php">
              <i class="fa fa-user"></i>
            </a>

        </div>
      </div>
    </nav>

    <!--navbar end -->
    <!-- Carousel Start -->
    <div class="container-fluid p-0 ">
      <div class="owl-carousel header-carousel position-relative">
          <div class="owl-carousel-item position-relative">
              <div class=" top-0 start-0 w-100 h-100 d-flex align-items-center" style="background:  #2a9df4;">
                  <div class="container">
                      <div class="row justify-content-start ">
                          <div class="col-4 col-lg-6">
                              <h1 class="display-5 text-white animated slideInDown mb-4">Find Catering Service Near You</h1>
                              <p class="fs-5 fw-medium text-white ">Ease and Convenience is what we offer you. Press the "Use Map" to start finding the nearest catering server.</p>
                              <a href="cateringMapsin.php" class="btn btn-outline-success py-md-auto px-md-auto me-auto animated slideInLeft">Use Map</a>
                          </div>
                          <div class="col-4 col-lg-4">
                            <img class="img-fluid w-auto h-auto" src="img/car/car1.jpg"alt="">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="owl-carousel-item position-relative">
              <div class=" top-0 start-0 w-100 h-100 d-flex align-items-center" style="background:  #2a9df4;">
                  <div class="container">
                      <div class="row justify-content-start ">
                          <div class="col-4 col-lg-6">
                              <h1 class="display-5 text-white animated slideInDown mb-4">Find The Perfect Catering For You</h1>
                              <p class="fs-5 fw-medium text-white  ">Check Out the nearest catering server near you, and order exquisite food and satisfactory service.</p>
                              <a href="cateringMapsin.php" class="btn btn-outline-success py-md-auto px-md-auto me-auto animated slideInLeft">Use Map</a>
                          </div>
                          <div class="col-4 col-lg-4">
                            <img class="img-fluid  w-auto h-auto" src="img/car/car2.png" alt="">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Carousel End -->




  <!--Card2 -->

<!-- Category Start -->
<div class="container-xxl py-5 " >
  <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">We Guarantee</h1>
      <div class="row g-4">
          <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
              <a class="cat-item rounded p-4" href="">
                  <i class="fa fa-3x fa-check text-primary mb-4"></i>
                  <h6 class="mb-3">Easy to Use</h6>
                  <p class="mb-0">We made sure that the UI is people friendly so that any people of age can have ease of use</p>
              </a>
          </div>
          <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
              <a class="cat-item rounded p-4" href="">
                  <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                  <h6 class="mb-3">Outstanding Service</h6>
                  <p class="mb-0">Delivers outstanding service that goes above and beyond customer expectations.</p>
              </a>
          </div>
          <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
              <a class="cat-item rounded p-4" href="">
                  <i class="fa fa-3x fa-cog text-primary mb-4"></i>
                  <h6 class="mb-3">Efficient Proces</h6>
                  <p class="mb-0">Ensures optimal utilization of resources leading to streamlined operations and improved outcomes.</p>
              </a>
          </div>

      </div>
  </div>
</div>



  <!--end of card2-->

  <!-- map Start -->
        <div class="container-xxl py-5" style="background-color: #2a9df4;">
            <div class="container">

                <div class="row g-4">

                    <div class="col-md-4">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">CATERER MAP</h1>
                            <p class="mb-4">This is where you can find and pinpoint the nearest catering server in Iligan City, so what are you waiting for , open the map and book food for any occassion from any establishment that pops in the map.</p>

                        </div>
                    </div>
                    <div class="col-md-8 wow fadeInUp" data-wow-delay="0.1s">
                    <iframe src="https://maps.google.com/maps?q=8.2280,124.2452&output=embed"
                width="100%" height="500"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

  <!-- Testimonial Start -->
  <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container">
          <h1 class="text-center mb-5">Customer Reviews</h1>
          <div class="owl-carousel testimonial-carousel">
            <?php



               $select_products = $pdo->prepare("SELECT * FROM `tbl_orders` order by date desc;");
               $select_products->execute();
               if($select_products->rowCount() > 0){
                  while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){



                    $id = $fetch_prodcut['user_id'];


















                    $select_products1 = $pdo->prepare("SELECT * FROM `tbl_customer` where customerid = $id ;");
                    $select_products1->execute();
                    if($select_products1->rowCount() > 0){
                       while($fetch_prodcut1 = $select_products1->fetch(PDO::FETCH_ASSOC)){








             ?>
              <div class="testimonial-item bg-light rounded p-4">
                  <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                  <p><?php echo $fetch_prodcut['review'];  ?></p>
                  <div class="d-flex align-items-center">
                      <img class="img-fluid flex-shrink-0 rounded" src="admin/upload/<?php echo $fetch_prodcut1['image']; ?>" style="width: 50px; height: 50px;">
                      <div class="ps-3">
                          <h5 class="mb-1"><?php echo $fetch_prodcut['name']; ?></h5>
                          <small><?php echo $fetch_prodcut['date']; ?></small>
                      </div>
                  </div>
              </div>
            <?php }}}} ?>

          </div>
      </div>
  </div>
        <!-- Testimonial End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-4">Company</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>MSU-IIT, Iligan City, Philippines</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>KKD@thesis.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="inindex.php">CateringFinds</a>, All Right Reserved.

                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>
        <!-- Footer End -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="bootstrap/js/main.js"></script>


</body>
</html>
