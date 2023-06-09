
<?php
include_once '../connectdb.php';
session_start();

if ($_SESSION['useremail']=="") {
  header('location:../index.php');
}



include_once 'headerAdmin.php';

$id= isset($_GET['id']) ? $_GET['id'] : '';

$select = $pdo->prepare("select * from tbl_user where userid=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['userid'];
$name_db = $row['username'];
$email_db = $row['useremail'];
$role_db = $row['role'];
$status_db = $row['status'];
$latitude_db = $row['latitude'];
$longitude_db = $row['longitude'];


if(isset($_POST['btnupdate'])){
  $name_txt = $_POST['txtname'];
  $email_txt = $_POST['txtemail'];
  if(isset($_POST['txtrole'])){
  $role_txt = $_POST['txtrole'];
  }
  if (isset($_POST['txtstatus'])) {
    $status_txt = $_POST['txtstatus'];

  }
  $latitude_txt = $_POST['txtlatitude'];
  $longitude_txt = $_POST['txtlongitude'];




          $update = $pdo->prepare("update tbl_user set username=:name, useremail=:email,
          role=:role, status=:status, latitude=:latitude, longitude=:longitude where userid=$id");

          $update->bindParam(':name',$name_txt);
          $update->bindParam(':email',$email_txt);
          $update->bindParam(':role',$role_txt);

          $update->bindParam(':status',$status_txt);
          $update->bindParam(':latitude',$latitude_txt);
          $update->bindParam(':longitude',$longitude_txt);


          if($update->execute()){

            echo'<script type ="text/javascript">
            jQuery(function validation(){

              swal({
              title: "Good Job!",
              text: "Update successful!",
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








$select = $pdo->prepare("select * from tbl_user where userid=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['userid'];
$name_db = $row['username'];
$email_db = $row['useremail'];
$role_db = $row['role'];
$status_db = $row['status'];
$latitude_db = $row['latitude'];
$longitude_db = $row['longitude'];


?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Edit Registration</h1>
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

     <div class="card card-outline card-primary">
         <div class="card-header with-border">
         <h3 class="box-title"><a href="sellerregistration.php" class="btn btn-primary" role="button">Back to Seller Registration</a></h3>




      </div>


        <div class="card-body">

          <form action="" method="post" name="form" enctype="multipart/form-data">



      <div class="row">


      <div class="col-md-6">
        <div class="form-group">
           <label>Name</label>
           <input type="text" class="form-control" name="txtname" value="<?php echo $name_db;?>" placeholder="Enter name..." required>
         </div>

         <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="txtemail" value="<?php echo $email_db;?>" placeholder="Enter name..." required>
          </div>

          <div class="form-group">
            <label>Role</label>
            <select class="form-control" name="txtrole">
              <option hidden value="<?php echo $role_db;?>" selected ><?php echo $role_db;?></option>

              <option>Admin</option>
              <option>Seller</option>
            </select>
          </div>


      </div>
      <div class="col-md-6">

        <div class="form-group">
          <label>Status</label>
          <select class="form-control" name="txtstatus">
            <option hidden value="<?php echo $status_db;?>?>" selected ><?php echo $status_db;?></option>


            <option>Not approved</option>
            <option>approved</option>
          </select>
        </div>

        <div class="form-group">
           <label>Latitude</label>
           <input type="text" class="form-control" name="txtlatitude" value="<?php echo $latitude_db;?>" placeholder="Enter name..." required>
         </div>

         <div class="form-group">
            <label>Longitude</label>
            <input type="text" class="form-control" name="txtlongitude" value="<?php echo $longitude_db;?>" placeholder="Enter name..." required>
          </div>







        </div>

        </div>

    <div class="box-footer">


      <button type="submit" class="btn btn-info" name="btnupdate">Update</button>

    </div>
    </form>


          </div>

            </div>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->





  <!-- /.content-wrapper -->
  <?php

include_once 'footerAdmin.php';

 ?>
