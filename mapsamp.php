<?php 
include("db/dbb.php");
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
        <h3>Thesis Maps Demo</h3> 
        <form action="" method="POST">
            <p> 
                <input type="text" name="imap_add" placeholder="enter address" required> <br>
                <input type="text" name="ilat" placeholder="enter Latitude" required>
                <input type="text" name="ilongi" placeholder="enter Longitude" required>
            </p>
            <input type="submit" name="submit_add">

        </form>
        <?php 
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

        <div id="map"></div> 
    </div>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAif965hDy98LYDXjMrGN9-U3BlqMhZvjc&callback=initMap"></script>
     
    
     </body>
     
</html>