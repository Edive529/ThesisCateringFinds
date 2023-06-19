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

if(isset($_POST['btn_login'])) {

  $useremail = $_POST['txt_email'];
  $password = $_POST['txt_password'];

  if ($useremail == "" OR $password == "") {

    echo'<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "Warning!",
      text: "Email Or Password field is empty!",
      icon: "warning",
      button: "Ok",
    });



    });

    </script>';

  }

$select = $pdo->prepare("select * from tbl_user where useremail='$useremail'");

$select->execute();
$row= $select->fetch(PDO::FETCH_ASSOC);


if ($row) {


if($row['useremail'] == $useremail AND $row['role']=='Admin' AND $row['status']=='approved') {

  $select = $pdo->prepare("select * from tbl_user where useremail= :useremail");
  $select->execute(array(':useremail' => $useremail));

  while ($row = $select->fetch()) {
    $id = $row['userid'];
    $hashed_password = $row['password'];
    $useremail = $row['useremail'];
    $username = $row['username'];
    $role = $row['role'];

    $pwdcheck= password_verify($password, $hashed_password);

    if($pwdcheck){

      $_SESSION['userid'] = $id;
      $_SESSION['username'] = $username;
      $_SESSION['useremail'] = $useremail;
      $_SESSION['role'] = $role;

       echo'<script type ="text/javascript">
      jQuery(function validation(){

        swal({
        title: "Good job! '.$_SESSION['username'].'",
        text: "Details Matched!",
        icon: "success",
        button: "Loading...",
      });



      });

      </script>';


      header('refresh:3; admin/dashboardAdmin.php');


    }



}}else{
  echo'<script type ="text/javascript">
  jQuery(function validation(){

    swal({
    title: "Warning!",
    text: "Not yet Approved!",
    icon: "warning",
    button: "Ok",
  });



  });

  </script>';


}}if ($row) {

  if ($row['useremail'] == $useremail AND $row['role']=='Seller' AND $row['status'] == 'not approved') {

    echo'<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "Warning!",
      text: "Account not yet approved (Wait 1 to 2 weeks)!",
      icon: "warning",
      button: "Ok",
    });



    });

    </script>';

  }


elseif($row['useremail'] == $useremail AND $row['role']=='Seller' AND $row['status'] == 'approved') {

  $select = $pdo->prepare("select * from tbl_user where useremail= :useremail");
  $select->execute(array(':useremail' => $useremail));

  while ($row = $select->fetch()) {
    $id = $row['userid'];
    $hashed_password = $row['password'];
    $useremail = $row['useremail'];
    $username = $row['username'];
    $role = $row['role'];
    $restaurant = $row['restaurant'];

    $pwdcheck= password_verify($password, $hashed_password);

    if($pwdcheck){

      $_SESSION['userid'] = $id;
      $_SESSION['username'] = $username;
      $_SESSION['useremail'] = $useremail;
      $_SESSION['role'] = $role;
      $_SESSION['restaurant'] = $restaurant;

       echo'<script type ="text/javascript">
      jQuery(function validation(){

        swal({
        title: "Good job! '.$_SESSION['username'].'",
        text: "Details Matched!",
        icon: "success",
        button: "Loading...",
      });



      });

      </script>';


      header('refresh:3; seller/dashboard.php');


    }else{
      echo'<script type ="text/javascript">
      jQuery(function validation(){

        swal({
        title: "Warning!",
        text: "Email Or Password field is wrong!",
        icon: "warning",
        button: "Ok",
      });



      });

      </script>';


    }



}}else{
  echo'<script type ="text/javascript">
  jQuery(function validation(){

    swal({
    title: "Warning!",
    text: "Email Or Password field is wrong!",
    icon: "warning",
    button: "Ok",
  });



  });

  </script>';


}}
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
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control"  name="txt_email" placeholder="Email" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="txt_password" placeholder="Password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">

          

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="btn_login">Sign In</button>
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
