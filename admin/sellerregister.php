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

// error_reporting(0);
if(isset($_POST['btnaddfood'])){

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
$file_store = "upload/".$file_name;
$f_extension = explode('.',$file_name);
$f_extension = strtolower(end($f_extension));

$f_newfile = uniqid().'.'.$f_extension;
$file_store = "upload/".$f_newfile;

// if(isset($_POST['txtemail'])){
//
//   $row=$select=$pdo->prepare("select useremail from tbl_user where useremail='$useremail'");
//   $select->execute();
//
//   if($select->rowCount() > 0){
//     echo'<script type ="text/javascript">
//     jQuery(function validation(){
//
//       swal({
//       title: "Warning!",
//       text: "Email Already Exists!",
//       icon: "warning",
//       button: "Ok",
//     });
//
//
//
//     });
//
//     </script>';
//   }
// }
if ($f_extension == 'jpg' || $f_extension == 'png' || $f_extension == 'gif' || $f_extension == 'jpeg') {

  if($file_size>=5000000) {
    $error ='<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "Warning!",
      text: "Max file should be 5MB!",
      icon: "warning",
      button: "Ok",
    });



    });

    </script>';
    echo $error;

  }else{
    if (move_uploaded_file($file_tem_loc, $file_store)) {

      $upload = $f_newfile;



        $insert=$pdo->prepare("insert into tbl_user(username,useremail,restaurant,phonenum,address,password,latitude,longitude,image)
        values(:username,:useremail,:restaurant,:phonenum,:address,:password,:latitude,:longitude,:image)");


        $insert->bindParam(':username',$username);
        $insert->bindParam(':useremail',$useremail);
        $insert->bindParam(':restaurant',$restaurant);
        $insert->bindParam(':phonenum',$phonenum);

        $insert->bindParam(':address',$address);
        $insert->bindParam(':password',$hashed_password);
        $insert->bindParam(':latitude',$latitude);
        $insert->bindParam(':longitude',$longitude);

        $insert->bindParam(':image',$upload);




        if($insert->execute()){

          echo'<script type ="text/javascript">
          jQuery(function validation(){

            swal({
            title: "Good Job!",
            text: "Image is successfuly uploaded!",
            icon: "success",
            button: "Ok",
          });



          });

          </script>';

        }else{
          echo'<script type ="text/javascript">
          jQuery(function validation(){

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
  }else{
    $error = '<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "Warning!",
      text: "Only Jpg, Jpeg, Png and Gif file is allowed!",
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

  <style>
    .login-box{

    margin-bottom: 200px;

    }
  </style>


</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/index2.html"><b>Catering</b>Finds</a>
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
          <input type="text" class="form-control"  name="txtlatitude" placeholder="Latitude" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control"  name="txtlongitude" placeholder="Longitude" >
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
        <div class="row">
          <div class="col-8">

            <p class="mb-1">
              <a href="#" onclick="swal('To Get Password','Please Contact Admin OR Service Provider','info')">Need help?</a>
            </p>

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-info" name="btnaddfood">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->



    </div>
    <!-- /.login-card-body -->
  </div>
</div>

</body>
</html>
