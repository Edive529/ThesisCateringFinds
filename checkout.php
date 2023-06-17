<?php

include 'connectdb.php';

session_start();



$userid = $_SESSION['customerid'];

if(isset($_POST['place_order'])){

   $name = $_POST['user'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $catering_style = $_POST['catering_style'];
   $catering_style = filter_var($catering_style, FILTER_SANITIZE_STRING);
   $grand_total = $_POST['grand_total'];
   $grand_total = filter_var($grand_total, FILTER_SANITIZE_STRING);
   $restaurantname = $_POST['restaurant'];
   $restaurantname = filter_var($restaurantname, FILTER_SANITIZE_STRING);
   $number = $_POST['phonenum'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $order = $_POST['order_list'];
   $order = filter_var($order, FILTER_SANITIZE_STRING);
   $email = $_POST['useremail'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $event_address = $_POST['event_address'];
   $event_address = filter_var($event_address, FILTER_SANITIZE_STRING);
   $method = $_POST['payment_type'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $date_to_be_delivered = $_POST['date_to_be_delivered'];
   $date_to_be_delivered = filter_var($date_to_be_delivered, FILTER_SANITIZE_STRING);
   $time_to_be_delivered = $_POST['time_to_be_delivered'];
   $time_to_be_delivered = filter_var($time_to_be_delivered, FILTER_SANITIZE_STRING);

   $verify_cart = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ?");
   $verify_cart->execute([$userid]);

   $insert_catering = $pdo->prepare("INSERT INTO `tbl_catering_order_details`(userid, order_list, user, catering_style, restaurant, grand_total, phonenum, useremail, event_address, payment_type, date_to_be_delivered, time_to_be_delivered) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
   $insert_catering->execute([$userid, $order, $name, $catering_style, $restaurantname, $grand_total, $number, $email, $event_address,  $method, $date_to_be_delivered, $time_to_be_delivered]);
   header('location:orders.php');



   if(isset($_GET['get_id'])){

      $get_product = $pdo->prepare("SELECT * FROM `tbl_foodmenu` WHERE id = ? LIMIT 1");
      $get_product->execute([$_GET['get_id']]);
      if($get_product->rowCount() > 0){
         while($fetch_p = $get_product->fetch(PDO::FETCH_ASSOC)){
            $insert_order = $pdo->prepare("INSERT INTO `tbl_orders`(user_id, name, email, restaurant, foodid, price, qty) VALUES(?,?,?,?,?,?,?)");
            $insert_order->execute([$userid, $name, $email, $restaurantname, $fetch_p['foodid'], $fetch_p['saleprice'], 1]);





         }





      }else{
         $warning_msg[] = 'Something went wrong!';
      }

   }elseif($verify_cart->rowCount() > 0){

      while($f_cart = $verify_cart->fetch(PDO::FETCH_ASSOC)){

        $insert_order = $pdo->prepare("INSERT INTO `tbl_orders`(user_id, name, email, restaurant, foodid, price, qty) VALUES(?,?,?,?,?,?,?)");
        $insert_order->execute([$userid, $name, $email, $restaurantname, $f_cart['foodid'], $f_cart['price'], $f_cart['qty']]);

      }







      // else{
      //    $warning_msg[] = 'Something went wrong!';
      // }

   // if($verify_cart->rowCount() > 0){
   //
   //    while($f_cart = $verify_cart->fetch(PDO::FETCH_ASSOC)){
   //
   //       $insert_order = $pdo->prepare("INSERT INTO `tbl_catering_order_details`(userid, order_list, user, phonenum, useremail, event_address, payment_type, date_to_be_delivered, time_to_be_delivered) VALUES(?,?,?,?,?,?,?,?,?)");
   //       $insert_order->execute([$userid, $order, $name, $number, $email, $event_address,  $method, $date_to_be_delivered, $time_to_be_delivered]);
   //
   //    }

      if($insert_order){
         $delete_cart_id = $pdo->prepare("DELETE FROM `tbl_cart` WHERE customerid = ?");
         $delete_cart_id->execute([$userid]);
         header('location:orders.php');
      }
    }

   // }else{
   //    $warning_msg[] = 'Your cart is empty!';
   // }




if(isset($_POST['update_cart'])){

   $cart_id = $_POST['cart_id'];
   $cart_id = filter_var($cart_id, FILTER_SANITIZE_STRING);
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);

   $update_qty = $pdo->prepare("UPDATE `tbl_cart` SET qty = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);

   $success_msg[] = 'Cart quantity updated!';

}
}

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
  <?php $id= isset($_GET['id']) ? $_GET['id'] : ''; ?>

   <h1 class="heading">checkout summary<?php echo $id ?></h1>



   <div class="row">

     <div class="summary">
        <h3 class="title">cart items</h3>
        <?php
           $grand_total = 0;
           if(isset($_GET['get_id'])){
              $select_get = $pdo->prepare("SELECT * FROM `tbl_foodmenu` WHERE foodid = ?");
              $select_get->execute([$_GET['get_id']]);
              while($fetch_get = $select_get->fetch(PDO::FETCH_ASSOC)){

                $restaurant = $fetch_get['restaurant'];
        ?>
        <div class="flex">
           <img src="admin/upload/<?= $fetch_get['image']; ?>" class="image" alt="">
           <div>


              <h3 class="food"><?= $fetch_get['food']; ?></h3>
              <p class="price"><i class="fas fa-peso-sign"></i> <?= $fetch_get['saleprice']; ?></p>

              <input type="number" name="qty" required min="1" value="<?= $fetch_cart['qty']; ?>" max="99" maxlength="2" class="qty">
              <button type="submit" name="update_cart" class="fas fa-edit">
              </button>
           </div>




        </div>
        <?php
              }
           }else{
             $result = " ";
              $select_cart = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ?");
              $select_cart->execute([$userid]);
              if($select_cart->rowCount() > 0){
                 while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
                    $select_products = $pdo->prepare("SELECT * FROM `tbl_foodmenu` WHERE foodid = ?");
                    $select_products->execute([$fetch_cart['foodid']]);
                    $fetch_product = $select_products->fetch(PDO::FETCH_ASSOC);
                    $sub_total = ($fetch_cart['qty'] * $fetch_product['saleprice']);

                    $result .=$fetch_product['food'] . ": ₱" . $fetch_product['saleprice'] . "x" . $fetch_cart['qty'] . "= ₱" . $sub_total . ",";





                    $grand_total += $sub_total;
                    $restaurantname = $fetch_product['restaurant'];


        ?>

        <div class="flex">
           <img src="admin/upload/<?= $fetch_product['image']; ?>" class="image" alt="">
           <div>
             <h3></h3>
             <h3><?= $fetch_product['restaurant']; ?></h3>
              <h3 class="food"><?= $fetch_product['food']; ?></h3>
              <p class="saleprice"><i class="fas fa-peso-sign"></i> <?= $fetch_product['saleprice']; ?> x <?= $fetch_cart['qty']; ?></p>
           </div>
        </div>


        <?php
                 }
              }else{
                 echo '<p class="empty">your cart is empty</p>';
              }
           } $maonani = $result."Total = "."₱".$grand_total;
           $restaurantname;

        ?>
        <div class="grand-total"><span>grand total :</span><p><i class="fas fa-peso-sign"></i> <?= $grand_total; ?></p></div>










     </div>



      <form action="" method="POST">
         <h3>billing details</h3>
         <div class="flex">
            <div class="box">
               <p>your name <span>*</span></p>
               <input type="text" name="user" required maxlength="50" value="<?php echo $_SESSION['username']; ?>" disabled class="input">
               <input type="hidden" name="user" value="<?php echo $_SESSION['username']; ?>">

              <input type="hidden" name="useremail" value="<?php echo $_SESSION['useremail']; ?>">
              <input hidden type="float" name="grand_total" value="<?php echo $grand_total; ?>">

               <p>your email <span>*</span></p>
               <input type="email" name="" required maxlength="50" value="<?php echo $_SESSION['useremail']; ?>" disabled class="input">
               <p>your number <span>*</span></p>
               <input type="number" value="<?php echo $_SESSION['phonenum']; ?>" name="phonenum" required maxlength="10" placeholder="enter your number" class="input" min="0" max="9999999999">

               <p>payment method <span>*</span></p>
               <select name="payment_type" class="input" value= "<?php echo $_SESSION['payment_type']; ?>" required>

                 <option hidden value="<?php echo $_SESSION['payment_type']; ?>" selected ><?php echo $_SESSION['payment_type']; ?></option>
                  <option value="cash on delivery">cash on delivery</option>
                  <option value="credit or debit card">credit or debit card</option>
                  <option value="GCASH">GCASH</option>

               </select>


            </div>
            <div class="box">
              <p>Catering Style <span>*</span></p>

              <select name="catering_style" class="input" required>
                  <option value="Party Tray">Party Tray</option>
                  <option value="Plated">Plated</option>
                  <option value="Packed">Packed</option>
              </select>

              <p>Event Address <span>*</span></p>

              <input type="text" name="event_address" value="<?php echo $_SESSION['event_address']; ?>"  rows="4" cols="50" placeholder="e.g. flat & building number" class="input">
<p>Delivery Date</p>
               <input type="date" name="date_to_be_delivered" required maxlength="" placeholder="date to be delivered" class="input">
               <p>Delivery time<span>*</span></p>
               <input type="time" name="time_to_be_delivered" required maxlength="" placeholder="time to be delivered" class="input">
               <input hidden type="text"  name="order_list" value="<?php echo $maonani?>" required maxlength="" placeholder="" class="input">
               <input hidden type="text"  name="restaurant" value="<?php echo $restaurantname?>" required maxlength="" placeholder="" class="input">
               <textarea hidden type="text" name="order_list" value="<?php echo $maonani?>" required maxlength="" placeholder="" class="input"><?php echo$maonani?></textarea>


            </div>
         </div>
         <input type="submit" value="place order" name="place_order" class="btn">
      </form>



   </div>

</section>





<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="js/script.js"></script>

<?php include 'components/alert.php'; ?>

</body>
</html>
