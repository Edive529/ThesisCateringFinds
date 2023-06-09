<?php 
include("db/dbb.php"); 
        
include_once 'navbar.php';
 

 
if(isset($_POST['submit_add'])){
    $map_add = $_POST['imap_add'];
    $lat = $_POST['ilat'];
    $longi = $_POST['ilongi'];

         $sql = "INSERT INTO mapsamp (map_add, lat, longi) VALUES ('$map_add', '$lat', '$longi')"; 
        if(mysqli_query($connection, $sql)) {

        echo "<script> alert('Location successfully Added'); window.location='mapsamp.php';  </script>"; 
        } else {
       echo "<script>alert('Invalid Input. Please Try Again.'); window.location='mapsamp.php';  </script>"; 
        }
}

require('locations.php');
$samp = new locations;
$allData = $samp->getLocations();
$allData = json_encode($allData, true);
echo '<div id="showData">' . $allData. '</div>';  

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <script type="text/javascript" src="bootstrap/js/googlemaps.js"></script> 

   
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

    <style type="text/css">
        .container{
            height: 450px;
        }
        #map{
            width: 100%;
            height: 100%;
            border: 1px solid blue;
        }
        #showData {
            display: none;
        }
    </style>

    <title>maps</title>
</head>
<body> 
        <div class="container">
        <div class="row" >

        <div class="container col  overflow-auto"> 

        <!-- <form action="" method="POST">
            <p> 
                <input type="text" name="imap_add" placeholder="enter address" required> <br>
                <input type="text" name="ilat" placeholder="enter Latitude" required>
                <input type="text" name="ilongi" placeholder="enter Longitude" required>
            </p>
            <input type="submit" name="submit_add">

        </form> -->
      


        <div class=" py-2 m-2"> 
           
            <div class="  wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-mail-bulk text-primary"></i>
                    <h6 class="mb-3">Restaurant 1</h6>
                    <p class="mb-0">123 Address</p>
                </a>
            </div>
            <div class="  wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-mail-bulk text-primary"></i>
                    <h6 class="mb-3">Restaurant 1</h6>
                    <p class="mb-0">123 Address</p>
                </a> 
            </div>
            <div class="  wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-mail-bulk text-primary"></i>
                    <h6 class="mb-3">Restaurant 1</h6>
                    <p class="mb-0">123 Address</p>
                </a> 
            </div>
            <div class="  wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="">
                    <i class="fa fa-3x fa-mail-bulk text-primary"></i>
                    <h6 class="mb-3">Restaurant 1</h6>
                    <p class="mb-0">123 Address</p>
                </a> 
            </div>
            
        </div> 
       </div>
       
      
        <div class="col-lg-9 "> 
            <div id="map"></div>  
        </div>  

        </div>
    </div>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAif965hDy98LYDXjMrGN9-U3BlqMhZvjc&callback=initMap"></script>
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
<?php

include_once 'mainfooter.php';

 ?>