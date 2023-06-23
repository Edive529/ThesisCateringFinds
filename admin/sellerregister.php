<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="plugins/sweetalert/sweetalert.min.js"></script>



<?php
include_once 'connectdb.php';
session_start();

if (isset($_POST['btnaddfood'])) {
    $username = $_POST['txtusername'];
    $useremail = $_POST['txtemail'];
    $restaurant = $_POST['txtrestaurant'];
    $phonenum = $_POST['txtphonenum'];
    $address = $_POST['txtaddress'];
    $latitude = $_POST['txtlatitude'];
    $longitude = $_POST['txtlongitude'];
    $password = $_POST['txtpassword'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_tem_loc = $_FILES['file']['tmp_name'];
    $file_store = "upload/" . $file_name;
    $f_extension = explode('.', $file_name);
    $f_extension = strtolower(end($f_extension));

    $f_newfile = uniqid() . '.' . $f_extension;
    $file_store = "upload/" . $f_newfile;

    $file_name2 = $_FILES['file2']['name'];
    $file_type2 = $_FILES['file2']['type'];
    $file_size2 = $_FILES['file2']['size'];
    $file_tem_loc2 = $_FILES['file2']['tmp_name'];
    $file_store2 = "upload/" . $file_name2;
    $f_extension2 = explode('.', $file_name2);
    $f_extension2 = strtolower(end($f_extension2));

    $f_newfile2 = uniqid() . '.' . $f_extension2;
    $file_store2 = "upload/" . $f_newfile2;

    if (($f_extension == 'jpg' || $f_extension == 'png' || $f_extension == 'gif' || $f_extension == 'jpeg') && ($f_extension2 == 'jpg' || $f_extension2 == 'png' || $f_extension2 == 'gif' || $f_extension2 == 'jpeg')) {
        if ($file_size >= 5000000 || $file_size2 >= 5000000) {
            $error = '<script type ="text/javascript">
            jQuery(function validation(){
                swal({
                    title: "Warning!",
                    text: "Max file size should be 5MB!",
                    icon: "warning",
                    button: "Ok",
                });
            });
            </script>';
            echo $error;
        } else {
            if (move_uploaded_file($file_tem_loc, $file_store) && move_uploaded_file($file_tem_loc2, $file_store2)) {
                $upload = $f_newfile;
                $upload2 = $f_newfile2;

                $insert = $pdo->prepare("INSERT INTO tbl_user (username, useremail, restaurant, phonenum, address, password, latitude, longitude, image, image2)
                VALUES (:username, :useremail, :restaurant, :phonenum, :address, :password, :latitude, :longitude, :image, :image2)");

                $insert->bindParam(':username', $username);
                $insert->bindParam(':useremail', $useremail);
                $insert->bindParam(':restaurant', $restaurant);
                $insert->bindParam(':phonenum', $phonenum);
                $insert->bindParam(':address', $address);
                $insert->bindParam(':password', $hashed_password);
                $insert->bindParam(':latitude', $latitude);
                $insert->bindParam(':longitude', $longitude);
                $insert->bindParam(':image', $upload);
                $insert->bindParam(':image2', $upload2);

                if ($insert->execute()) {
                    echo '<script type="text/javascript">
                    jQuery(function validation() {
                        swal({
                            title: "Good Job!",
                            text: "Images are successfully uploaded!",
                            icon: "success",
                            button: "Ok",
                        });
                    });
                    </script>';
                    header('location:index.php');
                } else {
                    echo '<script type="text/javascript">
                    jQuery(function validation() {
                        swal({
                            title: "Error!",
                            text: "Upload failed!",
                            icon: "error",
                            button: "Ok",
                        });
                    });
                    </script>';
                }
            }
        }
    } else {
        $error = '<script type ="text/javascript">
        jQuery(function validation(){
            swal({
                title: "Warning!",
                text: "Only Jpg, Jpeg, Png, and Gif files are allowed!",
                icon: "warning",
                button: "Ok",
            });
        });
        </script>';
        echo $error;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAif965hDy98LYDXjMrGN9-U3BlqMhZvjc&callback=initMap" async defer></script>
    <style>
      #map {
        height: 450px;
        width:auto;
      }
    </style>

</head>
<body class=" container d-flex">
<div class="login-box">
  <div class="login-logo">
    <a href="../index.php"><b>Catering</b>Finds</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Seller Registration</p>

      <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" class="form-control"  name="txtusername" placeholder="Name" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control"  name="txtemail" placeholder="Email" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control"  name="txtrestaurant" placeholder="Restaurant" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control"  maxlength="11"name="txtphonenum" placeholder="Enter phonenumber" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control"  name="txtaddress" placeholder="Address" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="text" class="form-control" name="txtlatitude" id="latitude" placeholder="Latitude" readonly>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="txtlongitude" id="longitude" placeholder="Longitude" readonly>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="txtpassword" placeholder="Password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label >Upload menu</label>
          <input type="file" class="input-group" name="file" required>

        </div>
        <div class="form-group">
          <label >Business Permit</label>
          <input type="file" class="input-group" name="file2" required>

        </div>
        <div class="row">
          <div class="col-8">

            <p class="mb-1">
              <a href="#" onclick="swal('To Get Password','Please Contact Admin OR Service Provider','info')">Need help?</a>
            </p>

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-success" name="btnaddfood">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->



    </div>
    <!-- /.login-card-body -->
  </div>

  </div>
  <div class="col-lg-9">
    <h1 class="login-logo">Right click desired location to get your coordinates of your restaurant</h1>
  <div id="map"></div>

  <div>
  <button onclick="changeToSatellite()" class="btn btn-info">Satellite</button>
  <button onclick="changeToRoadmap()" class="btn btn-info">Roadmap</button>
  </div>
</div>

    <script>
        var map;

      function initMap() {



      map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 8.2280, lng: 124.2452 }, // Iligan
        zoom: 14, // Initial map zoom level
      mapTypeId: 'roadmap', // Default map type
      });


  // Create a marker and set its initial position outside the map
  marker = new google.maps.Marker({
    map: map,
    position: { lat: -9999, lng: -9999 },
    draggable: true // Enable marker dragging if desired
  });

  google.maps.event.addListener(map, "rightclick", function (event) {
    var latitude = event.latLng.lat();
    var longitude = event.latLng.lng();

    // Update input fields with the coordinates
    document.getElementById("latitude").value = latitude;
    document.getElementById("longitude").value = longitude;

    // Update marker position
    marker.setPosition(event.latLng);
  });


}
function changeToSatellite() {
      map.setMapTypeId('satellite');
    }
    function changeToRoadmap() {
      map.setMapTypeId('roadmap');
    }

</script>


 </body>
</html>
