
<?php
include_once '../connectdb.php';
session_start();

if ($_SESSION['useremail']=="") {
  header('location:../index.php');
}



include_once 'header.php';

$id= isset($_GET['id']) ? $_GET['id'] : '';

$select = $pdo->prepare("select * from tbl_package where packageid=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['packageid'];
$package_db = $row['package'];
$food_db = $row['food'];
$saleprice_db = $row['saleprice'];
$description_db = $row['description'];
$image_db = $row['image'];

if(isset($_POST['btnupdate'])){
  $food_txt = $_POST['txtfood'];
  $package_txt = $_POST['txtpackage'];
  $saleprice_txt = $_POST['txtsaleprice'];

  $description_txt = $_POST['txtdescription'];

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
          $update = $pdo->prepare("update tbl_package set food=:food, package=:package,
          saleprice=:saleprice, description=:description, image=:image where packageid=$id");

          $update->bindParam(':food',$food_txt);
          $update->bindParam(':package',$package_txt);
          $update->bindParam(':saleprice',$saleprice_txt);

          $update->bindParam(':description',$description_txt);
          $update->bindParam(':image',$f_newfile);

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

  $update = $pdo->prepare("update tbl_package set package=:package, food=:food,
  saleprice=:saleprice, description=:description, image=:image where packageid=$id");

  $update->bindParam(':food',$food_txt);
  $update->bindParam(':package',$package_txt);
  $update->bindParam(':saleprice',$saleprice_txt);

  $update->bindParam(':description',$description_txt);
  $update->bindParam(':image',$image_db);

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

$select = $pdo->prepare("select * from tbl_package where packageid=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['packageid'];
$package_db = $row['package'];
$food_db = $row['food'];
$package_db = $row['package'];
$saleprice_db = $row['saleprice'];

$description_db = $row['description'];
$image_db = $row['image'];

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Add menu</h1>
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
         <h3 class="box-title"><a href="menu.php" class="btn btn-primary" role="button">Back to Menu list</a></h3>




      </div>


        <div class="card-body">

          <form action="" method="post" name="form" enctype="multipart/form-data">



      <div class="row">


      <div class="col-md-6">
        <div class="form-group">
           <label>Package</label>
           <input type="text" class="form-control" name="txtpackage" value="<?php echo $package_db;?>" placeholder="Enter name..." required>
         </div>

         <div class="form-group">
           <label >Menu List</label>
           <textarea class="form-control" name="txtfood"  rows="6" placeholder="Enter..."><?php echo $food_db;?></textarea>
         </div>



         <div class="form-group">
           <label >Sale price</label>
           <input type="number" min="1" step="1" class="form-control" name="txtsaleprice" value="<?php echo $saleprice_db;?>" placeholder="Enter price..." required>
         </div>


      </div>
      <div class="col-md-6">

        <div class="form-group">
          <label >Description</label>
          <textarea class="form-control" name="txtdescription"  rows="6" placeholder="Enter..."><?php echo $description_db;?></textarea>
        </div>

        <div class="form-group">
          <label >Upload image</label>
          <img src = "../upload/<?php echo $image_db;?>" class = "img-responsive" width = "100px" height = "100px">
          <input type="file" class="input-group" name="file">

        </div>



        </div>
        </div>

    <div class="box-footer">


      <button type="submit" class="btn btn-info" name="btnupdate">Add Menu</button>

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
