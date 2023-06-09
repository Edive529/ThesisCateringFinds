

<?php
include_once 'connectdb.php';
session_start();



if(isset($_POST['btnsave'])){
  $username=$_POST['txtname'];
  $useremail=$_POST['txtemail'];
  $password=$_POST['txtpassword'];
  $userrole=$_POST['txtselect_option'];


  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

if(isset($_POST['txtemail'])){

    $row=$select=$pdo->prepare("select useremail from tbl_user where useremail='$useremail'");
    $select->execute();

    if($select->rowCount() > 0){
      echo'<script>alert("Email Already Exists!");</script>';
    }
    else {

      $insert=$pdo->prepare("insert into tbl_user(username,useremail,password,role)values(:name,:email,:pass,:role)");


      $insert->bindParam(':name',$username);
      $insert->bindParam(':email',$useremail);
      $insert->bindParam(':pass',$hashed_password);
      $insert->bindParam(':role',$userrole);


      if ($insert->execute()) {
        echo'<script>alert("Registration Successful");</script>';

      }
    }
  }
}

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


if($row['useremail'] == $useremail AND $row['role']=='customer') {

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




      header('refresh:1; inindex.php');


    }



}}}}

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Template Stylesheet -->
    <link href="bootstrap/css/reglog.css" rel="stylesheet">

   <!-- Icon Font Stylesheet -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

   <style>

   </style>
    <title>Signin-Signup</title>


</head>
<body >
    <div class="reglogcontainer">
        <div class="signin-signup">

            <form action="" method="post"class="signInForm">
                <h2 class="title">Sign-In</h2>
                <div class="inputField">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="txt_email">
                </div>
                <div class="inputField">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="txt_password">
                </div>

                <button type="submit" class="btnr" name="btn_login">Sign In</button>

                <p class="socialText"> Or sign in with social platform</p>

                <div class="socialMedia">
                    <a href="" class="socialIcon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="socialIcon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="socialIcon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="socialIcon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                </div>
                <p class="accountText">Don't have an account? <a href="#" id="signUpBtn2">Sign Up</a></p>

            </form>

            <form role="form" action="" method="post">
                <h2 class="title">Sign-Up</h2>
                <div class="inputField">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="txtname" required>
                </div>
                <div class="inputField">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email" name="txtemail" required>
                </div>
                <div class="inputField">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="txtpassword" required>
                </div>
                <div class="form-group">
				  <label></label>
				  <input type="text" class="form-control" name="txtselect_option" value="customer" style="display:none;"  placeholder="Enter name..." required>
				</div>


                <button type="submit" class="btnr" name="btnsave">Sign-Up</button>

                <p class="socialText"> Or sign up with social platform</p>

                <div class="socialMedia">

                    <a href="" class="socialIcon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="socialIcon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="socialIcon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="socialIcon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                </div>
                <p class="accountText">Already have an account? <a href="reglogin.php" id="signInBtn2">Sign In</a></p>
            </form>

        </div>

        <div class="panelsContainer">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Member of CateringFinds?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur sapiente, ea doloremque unde similique numquam?</p>
                    <button class="btnr" id="signInBtn">Sign-In</button>
                </div>
                <img src="img/reglog/signin.svg" alt="" class="image">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>New to CateringFinds?</h3>
                    <p>Loresm ipsum dolor sit amet consectetur adipisicing elit. Aspernatur sapiente, ea doloremque unde similique numquam?</p>
                    <button class="btnr" id="signUpBtn">Sign-Up</button>
                </div>
                <img src="img/reglog/signup.svg" alt="" class="image">
            </div>
        </div>
    </div>
    <script src="bootstrap/js/reglog.js"></script>
</body>
</html>
