
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="bower_components/sweetalert/sweetalert.js"></script>


<?php

include_once 'connectdb.php';
session_start();

if(isset($_POST['btn_login'])) {

  $useremail = $_POST['txt_email'];
  $password = $_POST['txt_password'];

  // echo $useremail." - ".$password;
$select = $pdo->prepare("select * from tbl_user where email= :email");

$select->execute(array(':email' => $useremail));

while ($row = $select->fetch()) {

  $id = $row['userid'];
  $hashed_password = $row['password'];
  $useremail = $row['email'];
  $username = $row['username'];
  $usertypeid = $row['usertypeid'];

  if(password_verify($password, $hashed_password)) {

    $_SESSION['userid'] = $id;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $useremail;
    $_SESSION['usertypeid'] = $useremail;

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


    header('refresh:3;dashboard.php');

  }else{
    echo'<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "Warning!",
      text: "Email Or Password is wrong!",
      icon: "warning",
      button: "Ok",
    });



    });

    </script>';
  }
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
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/index2.html"><b>RESERVATION</b>SYSTEM</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="txt_email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="txt_password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
            <a href="#" onclick="swal('To Get Password','Please Contact Admin OR Service Provider','error')">I forgot my password</a><br>
            <a href="register.php"  >Register a new account?</a><br>

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn_login">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>



      <!-- /.social-auth-links -->



    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


</body>
</html>
