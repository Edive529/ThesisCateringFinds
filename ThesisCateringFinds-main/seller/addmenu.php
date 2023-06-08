
<?php
include_once '../connectdb.php';
session_start();

if ($_SESSION['useremail']=="") {
  header('location:../index.php');
}



include_once 'header.php';

if(isset($_POST['btnaddfood'])){
  $food = $_POST['txtfood'];
  $category = $_POST['txtselect_option'];
  $saleprice = $_POST['txtsaleprice'];
  $description = $_POST['txtdescription'];

$file_name = $_FILES['file']['name'];
$file_type = $_FILES['file']['type'];
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

      $upload = $f_newfile;
      if(!isset($error)){
        $insert=$pdo->prepare("insert into tbl_foodmenu(food,category,saleprice,description,image)
        values(:food,:category,:saleprice,:description,:image)");

        $insert->bindParam(':food',$food);
        $insert->bindParam(':category',$category);
        $insert->bindParam(':saleprice',$saleprice);

        $insert->bindParam(':description',$description);
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
           <label>Food</label>
           <input type="text" class="form-control" name="txtfood" placeholder="Enter name..." required>
         </div>
         <div class="form-group">
           <label>Category</label>
           <select class="form-control" name="txtselect_option">
             <option value="" disabled selected>Select category</option required>
               <?php
               $select=$pdo->prepare("select * from tbl_category order by catid desc");
               $select->execute();

               while($row=$select->fetch(PDO::FETCH_ASSOC)){

                 extract($row)

                ?>
             <option><?php echo $row['category']; ?></option>

             <?php
             }
             ?>
           </select>
         </div>
         <div class="form-group">
           <label >Sale price</label>
           <input type="number" min="1" step="1" class="form-control" name="txtsaleprice" placeholder="Enter price..." required>
         </div>


      </div>
      <div class="col-md-6">

        <div class="form-group">
          <label >Description</label>
          <textarea class="form-control" name="txtdescription" rows="6" placeholder="Enter..."></textarea>
        </div>

        <div class="form-group">
          <label >Upload image</label>
          <input type="file" class="input-group" name="file" required>

        </div>



        </div>
        </div>

    <div class="box-footer">


      <button type="submit" class="btn btn-info" name="btnaddfood">Add Menu</button>

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
