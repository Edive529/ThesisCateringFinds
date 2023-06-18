<?php

include 'connectdb.php';

session_start();

$userid = $_SESSION['customerid'];



$select = $pdo->prepare("select * from tbl_customer where customerid='$userid'");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['customerid'];
$name_db = $row['username'];
$email_db = $row['useremail'];
$phonenum_db = $row['phonenum'];
$event_address_db = $row['event_address'];
$payment_type_db = $row['payment_type'];
$image_db = $row['image'];

if(isset($_POST['btnupdate'])){
  $phonenum_txt = $_POST['txtphonenum'];
  $event_address_txt = $_POST['txtevent_address'];
  $payment_type_txt = $_POST['txtpayment_type'];

$file_name = $_FILES['file']['name'];

if(!empty($file_name)){

  $file_size = $_FILES['file']['size'];
  $file_tem_loc = $_FILES['file']['tmp_name'];
  $file_store = "admin/upload/".$file_name;
  $f_extension = explode('.',$file_name);
  $f_extension = strtolower(end($f_extension));

  $f_newfile = uniqid().'.'.$f_extension;
  $file_store = "admin/upload/".$f_newfile;


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
          $update = $pdo->prepare("update tbl_customer set phonenum=:pnum, event_address=:evaddress,
          payment_type=:paytype, image=:image where customerid='$userid'");

          $update->bindParam(':pnum',$phonenum_txt);
          $update->bindParam(':evaddress',$event_address_txt);
          $update->bindParam(':paytype',$payment_type_txt);

          $update->bindParam(':image',$f_newfile);

          if($update->execute()){

            $success_msg[] = 'Profile Updated!';

          }else{
            // echo'<script type ="text/javascript">
            // jQuery(function validation(){
            //
            //   swal({
            //   title: "Error!",
            //   text: "Upload failed!",
            //   icon: "error",
            //   button: "Ok",
            // });
            //
            //
            //
            // });
            //
            // </script>';
            $error_msg[] = 'Upload Failed!';

          }

          }
      }
    }
  }else{
    // $error = '<script type ="text/javascript">
    // jQuery(function validation(){
    //
    //   swal({
    //   title: "Warning!",
    //   text: "Only Jpg, Jpeg, Png and Gif file is allowed!",
    //   icon: "warning",
    //   button: "Ok",
    // });
    //
    //
    //
    // });
    //
    // </script>';
    // echo $error;
    $warning_msg[] = 'Only Jpg, Jpeg, Png and Gif file is allowed!';
  }






}else{

  $update = $pdo->prepare("update tbl_customer set phonenum=:pnum, event_address=:evaddress,
  payment_type=:paytype, image=:image where customerid='$userid'");

  $update->bindParam(':pnum',$phonenum_txt);
  $update->bindParam(':evaddress',$event_address_txt);
  $update->bindParam(':paytype',$payment_type_txt);

  $update->bindParam(':image',$image_db);

  if($update->execute()){

  $success_msg[] = 'Profile Updated!';


}else{

    //  $error ='<script type ="text/javascript">
    // jQuery(function validation(){
    //
    //   swal({
    //   title: "Warning!",
    //   text: "task failed",
    //   icon: "warning",
    //   button: "Ok",
    // });
    //
    //
    //
    // });
    //
    // </script>';
    //
    // echo $error;
    $error_msg[] = 'Update failed';

  }
}


}



// if(isset($_POST['btnupdate'])){
//   $phonenum_txt = $_POST['txtphonenum'];
//   $event_address_txt = $_POST['txtevent_address'];
//   $payment_type_txt = $_POST['txtpayment_type'];
//
//
//
//
//   $update = $pdo->prepare("update tbl_customer set phonenum=:pnum, event_address=:evaddress,
//   payment_type=:paytype where customerid='$userid'");
//
//   $update->bindParam(':pnum',$phonenum_txt);
//   $update->bindParam(':evaddress',$event_address_txt);
//   $update->bindParam(':paytype',$payment_type_txt);
//
//
//
//   if($update->execute()){
//
//     echo'<script type ="text/javascript">
//     jQuery(function validation(){
//
//       swal({
//       title: "Good Job!",
//       text: "Update successful!",
//       icon: "success",
//       button: "Ok",
//     });
//
//
//
//     });
//
//     </script>';
//
//   }else{
//     echo'<script type ="text/javascript">
//     jQuery(function validation(){
//
//       swal({
//       title: "Error!",
//       text: "Upload failed!",
//       icon: "error",
//       button: "Ok",
//     });
//
//
//
//     });
//
//     </script>';
//
//   }
//
//
//
//   }
//
//
//





  $select = $pdo->prepare("select * from tbl_customer where customerid='$userid'");

  $select->execute();
  $row=$select->fetch(PDO::FETCH_ASSOC);

  $id_db = $row['customerid'];
  $name_db = $row['username'];
  $email_db = $row['useremail'];
  $phonenum_db = $row['phonenum'];
  $event_address_db = $row['event_address'];
  $payment_type_db = $row['payment_type'];
  $image_db = $row['image'];

  $_SESSION['event_address'] = $event_address_db;
  $_SESSION['phonenum'] = $phonenum_db;
  $_SESSION['payment_type'] = $payment_type_db;



 ?>












<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/header.php'; ?>

<section class="checkout">

   <h1 class="heading">Personal Details</h1>

   <div class="row">

      <form action="" method="post" name="form" enctype="multipart/form-data">
         <h3>billing details</h3>
         <div class="flex">
            <div class="box">
               <p>your name <span>*</span></p>
               <input type="text" name="user" required maxlength="50" value="<?php echo $_SESSION['username']; ?>" disabled class="input">
               <p>your email <span>*</span></p>
               <input type="email" name="useremail" required maxlength="50" value="<?php echo $_SESSION['useremail']; ?>" disabled class="input">
               <p>your number <span>*</span></p>
               <input type="text" name="txtphonenum"  placeholder="" value="<?php echo $phonenum_db ?>" class="input" min="0" max="9999999999">



            </div>
            <div class="box">
              <p>payment method <span>*</span></p>
              <select name="txtpayment_type" class="input" value="<?php echo $payment_type_db ?>" required>

                <option hidden value="<?php echo $payment_type_db ?>" selected ><?php echo $payment_type_db ?></option>



                 <option value="credit card">credit card</option>
                 <option value="debit card">debit card</option>
                 <option value="Visa">visa card</option>

              </select>

              <p>Event Address <span>*</span></p>
              <input type="textarea" name="txtevent_address" value="<?php echo $event_address_db ?>"  rows="4" cols="50" placeholder="e.g. flat & building number" class="input">

              <div class="form-group">
                <p>Profile icon <span>*</span></p>
                <img src = "admin/upload/<?php echo $image_db;?>" class = "img-responsive" width = "100px" height = "100px">
                <input type="file" class="input-group" name="file">

              </div>


            </div>
         </div>

         <button type="submit" name="btnupdate" class="btn"> update</button>
      </form>
    </div>

 </section>



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



 <script src="js/script.js"></script>

 <?php include 'components/alert.php'; ?>


 </body>
 </html>
