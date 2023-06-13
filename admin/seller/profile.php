
<?php
include_once '../connectdb.php';
session_start();

if ($_SESSION['useremail']=="") {
  header('location:../index.php');
}



include_once 'header.php';

$id = $_SESSION['userid'];

$select = $pdo->prepare("select * from tbl_user where userid=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$user_db = $row['username'];
$phonenum_db = $row['phonenum'];
$useremail_db = $row['useremail'];
$restaurant_db = $row['restaurant'];
$address_db = $row['address'];
$banner_db = $row['banner'];


if(isset($_POST['btnupdate'])){
  $phonenum_txt = $_POST['txtphonenum'];


$file_name = $_FILES['file']['name'];

if(!empty($file_name)){

  $file_size = $_FILES['file']['size'];
  $file_tem_loc = $_FILES['file']['tmp_name'];
  $file_store = "../upload/".$file_name;
  $f_extension = explode('.',$file_name);
  $f_extension = strtolower(end($f_extension));

  $f_newfile = uniqid().'.'.$f_extension;
  $file_store = "../upload/".$f_newfile;


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

        $f_newfile;
        if(!isset($error)){
          $update = $pdo->prepare("update tbl_user set phonenum=:phonenum, banner=:banner where userid=$id");

          $update->bindParam(':phonenum',$phonenum_txt);
          $update->bindParam(':banner',$f_newfile);

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






}else{

  $update = $pdo->prepare("update tbl_user set phonenum=:phonenum, banner=:banner where userid=$id");

  $update->bindParam(':phonenum',$phonenum_txt);


  $update->bindParam(':banner',$banner_db);

  if($update->execute()){

      echo $error = '<script type ="text/javascript">
      jQuery(function validation(){

        swal({
        title: "Good Job!",
        text: "Service list is Updated",
        icon: "success",
        button: "Ok",
      });



      });

      </script>';


}else{

     $error ='<script type ="text/javascript">
    jQuery(function validation(){

      swal({
      title: "Warning!",
      text: "task failed",
      icon: "warning",
      button: "Ok",
    });



    });

    </script>';

    echo $error;

  }
}


}

$select = $pdo->prepare("select * from tbl_user where userid=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$user_db = $row['username'];
$phonenum_db = $row['phonenum'];
$useremail_db = $row['useremail'];
$restaurant_db = $row['restaurant'];
$address_db = $row['address'];
$banner_db = $row['banner'];

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Restaurant Details</h1>
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



        <div class="card-body">

          <form action="" method="post" name="form" enctype="multipart/form-data">



      <div class="row">


      <div class="col-md-6">
        <div class="form-group">
           <label>Username</label>
           <input disabled type="text" class="form-control" name="" value="<?php echo $user_db;?>" placeholder="Enter name..." required>
         </div>
         <div class="form-group">
            <label>Restaurant</label>
            <input disabled type="text" class="form-control" name="" value="<?php echo $restaurant_db;?>" placeholder="Enter name..." required>
          </div>

    

         <div class="form-group">
            <label>Phone number</label>
            <input type="text" class="form-control" name="txtphonenum" value="<?php echo $phonenum_db;?>" placeholder="Enter name..." required>
          </div>






      </div>
      <div class="col-md-6">
        <div class="form-group">
           <label>Email</label>
           <input disabled type="text" class="form-control" name="" value="<?php echo $useremail_db;?>" placeholder="Enter name..." required>
         </div>

         <div class="form-group">
            <label>Address</label>
            <input disabled type="text" class="form-control" name="" value="<?php echo $address_db;?>" placeholder="Enter name..." required>
          </div>

        <div class="form-group">
          <label >Upload banner image</label>
          <img src = "../upload/<?php echo $banner_db;?>" class = "img-responsive" width = "100px" height = "100px">
          <input type="file" class="input-group" name="file">

        </div>



        </div>
        </div>

    <div class="box-footer">


      <button type="submit" class="btn btn-info" name="btnupdate">Update Details</button>

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

include_once 'footer.php';

 ?>
