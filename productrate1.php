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
}</style>

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
<?php include 'components/header1.php'; ?>

<?php
$id= isset($_GET['id']) ? $_GET['id'] : '';
   $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` where foodid= $id ");
   $select_products->execute();


      $fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC);



$fetch_prodcut['restaurant'];
?>
     <!-- top Start -->
 <div class="container-fluid mb-5">
      <div class="position-relative ">
          <div class=" position-relative">
              <div class=" top-0 start-0 w-100 h-100 d-flex align-items-center" style="background:  #ffffff;">
                  <div class="container p-4">

                    <form action="" method="post">

                      <div class="row justify-content-start ">



                      <div class="col-4 col-lg-5">
                        <h1></h1>

                            <img class="img-fluid w-auto h-auto" src="admin/upload/<?php echo $fetch_prodcut['image']; ?>"alt="">
                          </div>
                          <div class="col-4 col-lg-6">
                              <h1 class="display-5 text-black animated slideInDown mb-4"><?php echo $fetch_prodcut['food']; ?></h1>
                              <hr>
                              <p class="fs-2 fw-medium text-black "><?php echo $fetch_prodcut['saleprice']; ?></p>
                            <p>
                            <select class="form-select fs-2 fw-medium text-black " aria-label="Default select example">
                                <option selected>Party Tray</option>
                                <option value="1">Plated</option>
                                <option value="2">Packed</option>
                            </select>
                        </p>
                              <p class="fs-2 fw-medium text-black ">Description</p>
                                <br><br>
                              <p class="fs-2 fw-medium text-black position-bottom"><?php echo $fetch_prodcut['description']; ?></p>

                            <div class="form-outline row " style="width: 50%; padding:4px;">

                                <input max="4" type="number" id="" placeholder="1" class="col form-control fs-2 fw-medium text-black " />
                                <a href="#" class="btn btn-primary col m-1">Add to cart</a>
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
                    <div class="col-lg-4 col-md-6 align-items-center">
                        <h3 class="text-black mb-4">5 out of 5</h3>

                        <div class="d-flex">
							<p class=""><span class="text-muted">4.0</span>
							<span class="fa fa-star star-active "></span>
							<span class="fa fa-star star-active"></span>
							<span class="fa fa-star star-active"></span>
							<span class="fa fa-star star-active"></span>
							<span class="fa fa-star star-inactive"></span></p>


						</div>

                    </div>

                  

                    <div class="col-lg-4 col-md-6 d-flex">
                        <img src="admin/upload/" class="img-fluid rounded-circle shadow-strong" style="width:100px; height:100px; " alt="">
                        <p class="m-2 fs-3 fw-medium text-black "></p>

                    </div>


                    <div class="col-lg-4 col-md-6">
                    <p class="fs-3 fw-medium text-black ">Contact Number:</p>
                    <p class="fs-3 fw-medium text-black ">Address</p>

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

            <div class="card">
                <div class="d-flex">
					<div class="">
						<img class="profile-pic" src="https://i.imgur.com/V3ICjlm.jpg">
					</div>
					<div class="d-flex flex-column">
						<h3 class="">Vikram jit Singh</h3>
						<div class="d-flex">
							<p class=""><span class="text-muted">4.0</span>
							<span class="fa fa-star star-active "></span>
							<span class="fa fa-star star-active"></span>
							<span class="fa fa-star star-active"></span>
							<span class="fa fa-star star-active"></span>
							<span class="fa fa-star star-inactive"></span></p>


						</div>
                        <p class="text-muted text-left ">10 Sept</p>

                        <div class="row text-left">
                            <h4 class="blue-text mt-3">"An awesome activity to experience"</h4>
                            <p class="content">If you really enjoy spending your vacation 'on water' or would like to try something new and exciting for the first time.</p>
                        </div>
                        <div class="row text-left">
                            <img class="pic" src="https://i.imgur.com/kjcZcfv.jpg">
                            <img class="pic" src="https://i.imgur.com/SjBwAgs.jpg">
                            <img class="pic" src="https://i.imgur.com/IgHpsBh.jpg">
                        </div>
					</div>
				</div>
            </div>


            <div class="card">
                <div class="d-flex">
					<div class="">
						<img class="profile-pic" src="https://i.imgur.com/V3ICjlm.jpg">
					</div>
					<div class="d-flex flex-column">
						<h3 class="">Vikram jit Singh</h3>
						<div class="d-flex">
							<p class=""><span class="text-muted">4.0</span>
							<span class="fa fa-star star-active "></span>
							<span class="fa fa-star star-active"></span>
							<span class="fa fa-star star-active"></span>
							<span class="fa fa-star star-active"></span>
							<span class="fa fa-star star-inactive"></span></p>


						</div>
                        <p class="text-muted text-left ">10 Sept</p>

                        <div class="row text-left">
                            <h4 class="blue-text mt-3">"An awesome activity to experience"</h4>
                            <p class="content">If you really enjoy spending your vacation 'on water' or would like to try something new and exciting for the first time.</p>
                        </div>
                        <div class="row text-left">
                            <img class="pic" src="https://i.imgur.com/kjcZcfv.jpg">
                            <img class="pic" src="https://i.imgur.com/SjBwAgs.jpg">
                            <img class="pic" src="https://i.imgur.com/IgHpsBh.jpg">
                        </div>
					</div>
				</div>
            </div>


            <div class="card">
                <div class="d-flex">
					<div class="">
						<img class="profile-pic" src="https://i.imgur.com/V3ICjlm.jpg">
					</div>
					<div class="d-flex flex-column">
						<h3 class="">Vikram jit Singh</h3>
						<div class="d-flex">
							<p class=""><span class="text-muted">4.0</span>
							<span class="fa fa-star star-active "></span>
							<span class="fa fa-star star-active"></span>
							<span class="fa fa-star star-active"></span>
							<span class="fa fa-star star-active"></span>
							<span class="fa fa-star star-inactive"></span></p>


						</div>
                        <p class="text-muted text-left ">10 Sept</p>

                        <div class="row text-left">
                            <h4 class="blue-text mt-3">"An awesome activity to experience"</h4>
                            <p class="content">If you really enjoy spending your vacation 'on water' or would like to try something new and exciting for the first time.</p>
                        </div>
                        <div class="row text-left">
                            <img class="pic" src="https://i.imgur.com/kjcZcfv.jpg">
                            <img class="pic" src="https://i.imgur.com/SjBwAgs.jpg">
                            <img class="pic" src="https://i.imgur.com/IgHpsBh.jpg">
                        </div>
					</div>
				</div>
            </div>


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

</body>
</html>
