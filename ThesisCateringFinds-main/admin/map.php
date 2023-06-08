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
  $restaurant=$_POST['txtrestaurant'];
  $latitude=$_POST['txtlatitude'];
  $longitude=$_POST['txtlongitude'];


  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // echo $username .'-'. $useremail .'-'. $password .'-'. $userrole;
  if(!isset($restaurant) || trim($restaurant) == ''){

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
  }elseif (!isset($latitude) || trim($latitude) == ''){
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
  }elseif (!isset($longitude) || trim($longitude) == '') {
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

    $row=$select=$pdo->prepare("select restaurant from tbl_user where restaurant='$restaurant'");
    $select->execute();

    if($select->rowCount() > 0){
      echo'<script type ="text/javascript">
      jQuery(function validation(){

        swal({
        title: "Warning!",
        text: "restaurant Already Exists!",
        icon: "warning",
        button: "Ok",
      });



      });

      </script>';
    }
    else {

      $insert=$pdo->prepare("insert into tbl_user(restaurant,latitude,longitude)values(:restaurant,:latitude,:longitude)");


      $insert->bindParam(':restaurant',$restaurant);
      $insert->bindParam(':latitude',$latitude);
      $insert->bindParam(':longitude',$longitude);


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
                      <label>Restaurant</label>
                      <input type="text" class="form-control" name="txtrestaurant" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                      <label >Latitude</label>
                      <input type="email" class="form-control" name="txtlatitude" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                      <label >Longitude</label>
                      <input type="password" class="form-control" name="txtpassword" placeholder="Password" required>
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
                <th>Restaurant</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>EDIT</th>
                <th>DELETE</th>
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
                <td>'.$row->restaurant.'</td>
                <td>'.$row->latitude.'</td>
                <td>'.$row->longitude.'</td>





                <td>
                <a href = "editreg.php?id='.$row->userid.'"  class="btn btn-success" role = "button" ><span class = "fas fa-trash" style = "color:#ffffff" data-toggle="tooltip" title="edit"></span></a>
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
