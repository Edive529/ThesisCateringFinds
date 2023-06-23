<?php

include 'connectdb.php';
session_start();

$userid = $_SESSION['customerid'];

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}

if(isset($_POST['place_order'])){

  $card_number= $_POST["card_number"];
  $cvc= $_POST["cvc"];
  $card_expiry= $_POST["card_expiry"];





   $id1= isset($_GET['id']) ? $_GET['id'] : '';
      $select_get = $pdo->prepare("SELECT * FROM `tbl_catering_order_details` WHERE catering_id = $get_id");
      $select_get->execute();
      while($fetch_get = $select_get->fetch(PDO::FETCH_ASSOC)){

        $restaurant12 = $fetch_get['restaurant'];
        $grand_total = $fetch_get['grand_total'];
        $order = $fetch_get['order_list'];
        $name = $fetch_get['user'];
        $email = $fetch_get['useremail'];
        $method = $fetch_get['payment_type'];
}

$select = $pdo->prepare("select * from tbl_user where restaurant ='$restaurant12'");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);
      $skey_db = $row['skey'];
      $pkey_db = $row['spkey'];





   require_once "stripe-php-master/init.php";

   $stripeDetails = array(
       "secretKey" => $skey_db ,
       "publishableKey" => $pkey_db
   );

   \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);



       $stripe = new \Stripe\StripeClient($skey_db);

       $paymentIntent = $stripe->paymentIntents->create([
         'amount' => str_replace(",", "", $grand_total) * 100,
         'currency' => 'php',
         'description' => $order,
         'payment_method_types' => ['card'],
         'metadata' => [
           'name' => $name,
           'card_number' => $card_number,
           'cvc' => $cvc,
           'card_expiry' => $card_expiry,
           'email' => $email,
           'payment_type' => $method
         ],
       ]);

       if ($paymentIntent) {




   $verify_cart = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ?");
   $verify_cart->execute([$userid]);
   $status_txt = "Full_payment";
   $update = $pdo->prepare("update tbl_catering_order_details set status=:status where catering_id=$get_id");

   $update->bindParam(':status',$status_txt);

   if($update->execute()){

   header('location:orders.php');
 }

    }
  }















?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<style media="screen">
	.input {
   width: 100%;
   background-color: #eee;
   border-radius: .5rem;
   padding: 1.4rem;
   color: black;
   font-size: 1.8rem;
   margin: 1rem 0;
	}
</style>
<body>

<?php include 'components/header.php'; ?>

<section class="order-details">

   <h1 class="heading">order details</h1>

   <div class="box-container">

   <?php
      $grand_total = 0;
      $select_orders = $pdo->prepare("SELECT * FROM `tbl_catering_order_details` WHERE catering_id = ? LIMIT 1");
      $select_orders->execute([$get_id]);
      if($select_orders->rowCount() > 0){
         while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){

          $total2= $fetch_order['grand_total'];

          $total3 = $total2/2;










   ?>
   <div class="box">
      <div class="col">
         <p class="title"><i class="fas fa-calendar"></i><?= $fetch_order['date_of_reservation']; ?></p>

         <?php
          $commaDelimitedString = $fetch_order['order_list'];
          $array = explode(",", $commaDelimitedString);
          $result = implode("<br>", $array);

?>


         <h3 class="name" style="letter-spacing: 1px; line-height: 2.0; font-size: 25px; text-align: center;"><?= $result ?></h3>

      </div>
      <div class="col">
         <p class="title">billing address</p>
         <p class="user"><i class="fas fa-user"></i><?php echo $_SESSION['username'] ?></p>
         <p class="user"><i class="fas fa-phone"></i><?= $fetch_order['phonenum']; ?></p>
         <p class="user"><i class="fas fa-envelope"></i><?php echo $_SESSION['useremail'] ?></p>
         <p class="user"><i class="fas fa-map-marker-alt"></i><?= $fetch_order['event_address']; ?></p>
         <p class="user"><i class="fas fa-calendar"></i><?= $fetch_order['date_to_be_delivered']; ?></p>
         <p class="user"><i class="fas fa-money-bill"></i><?= $fetch_order['payment_type']; ?></p>
         <p class="title">status</p>
         <p class="status" style="color:<?php if($fetch_order['status'] == 'Not yet approved'){echo 'red';}elseif($fetch_order['status'] == 'canceled'){echo 'red';}else{echo 'green';}; ?>"><?= $fetch_order['status']; ?></p>
         <?php if ($fetch_order['status'] == 'approved') { ?>

















       <?php } elseif ($fetch_order['status'] == 'down_payment' || $fetch_order['status'] == 'full_payment') { ?>

           <input type="submit" value="In Progress" name="" class="btn" onclick="return confirm('Order is in progress!');">

       <?php } elseif ($fetch_order['status'] == 'Not yet approved') { ?>

           <form action="" method="POST">
               <input type="submit" value="cancel order" name="cancel" class="delete-btn" onclick="return confirm('cancel this order?');">
           </form>

       <?php } ?>


      </div>
      <?php if ($fetch_order['status'] == 'approved') {?>


      <form action="" method="POST">
         <h3>billing details</h3>
         <div class="flex">

            <div class="box" style="text-align:center;">







           <p>Card number<span>*</span></p>
           <input style="padding-right:500px;" value="" name="card_number" id="ccn" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" class="input">

           <p>Expiry Date<span>*</span></p>
           <input type="text" value="" name="card_expiry" required maxlength="5" placeholder="00/00" class="input">


           <p>CVC<span>*</span></p>
           <input type="text" value="" name="cvc" required maxlength="3" placeholder="enter your cvc" class="input" min="0" max="3">


            </div>
         </div>
         <input type="submit" value="Full payment" name="place_order" class="btn">
      </form>
      <?php}   ?>

   </div>
   <?php

 }}
      }
   ?>

   </div>

</section>














<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="js/script.js"></script>

<?php include 'components/alert.php'; ?>

</body>
</html>
