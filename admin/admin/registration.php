<?php
include_once '../connectdb.php';
session_start();

include_once 'headerAdmin.php';

error_reporting(0);

$id = $_GET['id'];

$delete=$pdo->prepare("delete from tbl_user where userid=".$id);

if($delete->execute()){

  echo'<script type ="text/javascript">
  jQuery(function validation(){

    swal({
    title: "Good Job!",
    text: "Account has been deleted!",
    icon: "success",
    button: "Ok",
  });



  });

  </script>';

}


if(isset($_POST['btnsave'])){
  $username=$_POST['txtname'];
  $useremail=$_POST['txtemail'];
  $password=$_POST['txtpassword'];
  $userrole=$_POST['txtselect_option'];

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // echo $username .'-'. $useremail .'-'. $password .'-'. $userrole;
  if(!isset($username) || trim($username) == ''){

    echo '<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "ERROR!",
      text: "Name Field Empty! Try again",
      icon: "error",
      button: "Ok",
    });



    });

    </script>';
  }elseif (!isset($userrole) || trim($userrole) == ''){
    echo '<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "ERROR!",
      text: "Role Field Empty! Try again",
      icon: "error",
      button: "Ok",
    });



    });

    </script>';
  }elseif (!isset($password) || trim($password) == '') {
    echo '<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "ERROR!",
      text: "Password Field Empty! Try again",
      icon: "error",
      button: "Ok",
    });



    });

    </script>';
  }


  else if(isset($_POST['txtemail'])){

    $row=$select=$pdo->prepare("select useremail from tbl_user where useremail='$useremail'");
    $select->execute();

    if($select->rowCount() > 0){
      echo'<script type ="text/javascript">
      jQuery(function validation(){

        swal({
        title: "Warning!",
        text: "Email Already Exists!",
        icon: "warning",
        button: "Ok",
      });



      });

      </script>';
    }
    else {

      $insert=$pdo->prepare("insert into tbl_user(username,useremail,password,role)values(:name,:email,:pass,:role)");


      $insert->bindParam(':name',$username);
      $insert->bindParam(':email',$useremail);
      $insert->bindParam(':pass',$hashed_password);
      $insert->bindParam(':role',$userrole);

      if ($insert->execute()) {
        echo'<script type ="text/javascript">
        jQuery(function validation(){

          swal({
          title: "Good Job!",
          text: "Registration Successful!",
          icon: "success",
          button: "Ok",
        });



        });

        </script>';

      }
    }
  }
}

 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registration Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content container-fluid">




    <!--------------------------
      | Your Page Content Here |
      -------------------------->
      <!-- general form elements -->



      <div class="card card-outline">
        <div class="card-header with-border">
          <div class="modal fade" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  Register new member

                </div>
                <form role="form" action="" method="post">
                <div class="modal-body">

                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name="txtname" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                      <label >Email address</label>
                      <input type="email" class="form-control" name="txtemail" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                      <label >Password</label>
                      <input type="password" class="form-control" name="txtpassword" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                      <label>Role</label>
                      <select class="form-control" name="txtselect_option">
                        <option value="" disabled selected>Select role</option required>
                        <option>Seller</option>
                        <option>Admin</option>
                      </select>
                    </div>




                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info" name="btnsave">Register</button>
                  <button class="btn btn-danger" data-dismiss="modal" value="Close" >Close</button>

                </div>

              </div>

            </div>

          </div>
          <h3 class="card-title"><a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-info" role="button">Add new member</a></h3>
        </div>

          <div class="card-body">
        <!-- /.box-header -->
        <!-- form start -->
        <div class="row margin">



        <div class="col-md-12">


          <table class = "table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ROLE</th>
                <th>EDIT</th>
              </tr>

            </thead>
            <tbody>
              <?php

              $phrase='Admin';

              $select = $pdo->prepare("select * from tbl_user order by userid desc");

              $select->execute();

              while ($row=$select->fetch(PDO::FETCH_OBJ)) {
                echo'
                <tr>
                <td>'.$row->userid.'</td>
                <td>'.$row->username.'</td>
                <td>'.$row->useremail.'</td>
                <td>'.$row->role.'</td>




                <td>
                <a href = "editregistration.php?id='.$row->userid.'"  class="btn btn-success" role = "button" ><span class = "fas fa-trash" style = "color:#ffffff" data-toggle="tooltip" title="edit"></span></a>
                </td>
                </tr>';
              }







               ?>

            </tbody>

          </table>

        </div>
        </div>

        </div>




          </div>
          <!-- /.box-body -->



        </form>

      <!-- /.box -->




          <!-- /.col-md-6 -->


        <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Main Footer -->
  <?php

include_once'footerAdmin.php';

   ?>
