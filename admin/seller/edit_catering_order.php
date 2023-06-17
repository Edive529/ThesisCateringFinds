
<?php
include_once '../connectdb.php';
session_start();

if ($_SESSION['useremail']=="") {
  header('location:../index.php');
}



include_once 'header.php';

$id= isset($_GET['id']) ? $_GET['id'] : '';

$select = $pdo->prepare("select * from tbl_catering_order_details where catering_id=$id");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['catering_id'];

$order_db = $row['order_list'];
$payment_type_db = $row['payment_type'];
$user_db = $row['user'];
$phonenum_db = $row['phonenum'];
$email_db = $row['useremail'];
$time_to_be_delivered_db = $row['time_to_be_delivered'];

$event_address_db = $row['event_address'];
$status_db = $row['status'];
$date_of_reservation_db = $row['date_of_reservation'];
$date_to_be_delivered_db = $row['date_to_be_delivered'];

$commaDelimitedString = $order_db;
$array = explode(",", $commaDelimitedString);
$result = implode("<br>", $array);

if(isset($_POST['btnupdate'])){

  $status_txt = $_POST['txtstatus'];





            $update = $pdo->prepare("update tbl_catering_order_details set status=:status where catering_id=$id");

            $update->bindParam(':status',$status_txt);



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








      $select = $pdo->prepare("select * from tbl_catering_order_details where catering_id=$id");

      $select->execute();
      $row=$select->fetch(PDO::FETCH_ASSOC);

      $id_db = $row['catering_id'];

      $order_db = $row['order_list'];
      $payment_type_db = $row['payment_type'];
      $user_db = $row['user'];
      $phonenum_db = $row['phonenum'];
      $email_db = $row['useremail'];
      $time_to_be_delivered_db = $row['time_to_be_delivered'];

      $event_address_db = $row['event_address'];
      $status_db = $row['status'];
      $date_of_reservation_db = $row['date_of_reservation'];
      $date_to_be_delivered_db = $row['date_to_be_delivered'];



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
           <label>Order Lists</label>
           <p></p>
           <h4 style="letter-spacing: 1px; line-height: 1.8; font-size: 18px; text-align: center;"><?php echo $result;?></h4>
         </div>

         <div class="form-group">
         <label>Category</label>

         <select class="form-control" name="">
           <option value="" disabled selected>Select category</option required>
                        <?php
                        $select=$pdo->prepare("select catering_id, payment_type from tbl_catering_order_details where catering_id=$id ");
                        $select->execute();

                        while($row=$select->fetch(PDO::FETCH_ASSOC)){

                          extract($row)

                         ?>
                      <option <?php if($row['payment_type']==$payment_type_db) {?>

                        selected="selected"
                      <?php } ?>>




                        <?php echo $row['payment_type']; ?></option>

                      <?php
                      }
                      ?>

         </select>
         </div>

         <div class="form-group">
            <label>Customer name</label>
            <input disabled type="text" class="form-control" name="" value="<?php echo $user_db;?>" placeholder="Enter name..." required>
          </div>

          <div class="form-group">
             <label>Customer Phone number</label>
             <input disabled type="text" class="form-control" name="" value="<?php echo $phonenum_db;?>" placeholder="Enter name..." required>
           </div>

           <div class="form-group">
              <label>Customer Email Adress</label>
              <input disabled type="text" class="form-control" name="" value="<?php echo $email_db;?>" placeholder="Enter name..." required>
            </div>




      </div>
      <div class="col-md-6">

         <div class="form-group">
            <label>Event Address</label>
            <input disabled type="text" class="form-control" name="" value="<?php echo $event_address_db;?>" placeholder="Enter name..." required>
          </div>

          <p>Status <span>*</span></p>
          <div class="form-group">


          <select  class="form-control" name="txtstatus" class="input" value= "<?php echo $status_db; ?>" required>

            <option hidden value="<?php echo $status_db; ?>" selected ><?php echo $status_db; ?></option>
             <option value="approved">approved</option>
             <option value="full_payment">full_payment</option>
             <option value="down_payment">down_payment</option>
             <option disabled value="canceled">canceled</option>


          </select>
            </div>

           <div class="form-group">
              <label>date_to_be_delivered</label>
              <input disabled type="text" class="form-control" name="" value="<?php echo $date_to_be_delivered_db;?>" placeholder="Enter name..." required>
            </div>

            <div class="form-group">
               <label>time_to_be_delivered</label>
               <input disabled type="text" class="form-control" name="" value="<?php echo $time_to_be_delivered_db;?>" placeholder="Enter name..." required>
             </div>

            <div class="form-group">
               <label>date_of_reservation	</label>
               <input disabled type="text" class="form-control" name="" value="<?php echo $date_of_reservation_db;?>" placeholder="Enter name..." required>
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

include_once 'footer.php';

 ?>
