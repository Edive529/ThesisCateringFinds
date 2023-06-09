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



if(isset($_POST['btnupdate'])){
  $phonenum_txt = $_POST['txtphonenum'];
  $event_address_txt = $_POST['txtevent_address'];
  $payment_type_txt = $_POST['txtpayment_type'];




  $update = $pdo->prepare("update tbl_customer set phonenum=:pnum, event_address=:evaddress,
  payment_type=:paytype where customerid='$userid'");

  $update->bindParam(':pnum',$phonenum_txt);
  $update->bindParam(':evaddress',$event_address_txt);
  $update->bindParam(':paytype',$payment_type_txt);



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








  $select = $pdo->prepare("select * from tbl_customer where customerid='$userid'");

  $select->execute();
  $row=$select->fetch(PDO::FETCH_ASSOC);

  $id_db = $row['customerid'];
  $name_db = $row['username'];
  $email_db = $row['useremail'];
  $phonenum_db = $row['phonenum'];
  $event_address_db = $row['event_address'];
  $payment_type_db = $row['payment_type'];



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

                <option value="<?php echo $payment_type_db ?>" selected ><?php echo $payment_type_db ?></option>


                 <option value="cash on delivery">cash on delivery</option>
                 <option value="credit or debit card">credit or debit card</option>
                 <option value="net banking">net banking</option>
                 <option value="UPI or wallets">UPI or RuPay</option>
              </select>

              <p>Event Address <span>*</span></p>
              <input type="textarea" name="txtevent_address" value="<?php echo $event_address_db ?>"  rows="4" cols="50" placeholder="e.g. flat & building number" class="input">


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
