<?php

include 'connectdb.php';

session_start();

if ($_SESSION['useremail']=="" OR $_SESSION['role']!="customer" ) {
  header('location:index.php');
}

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

   $id1= isset($_GET['id']) ? $_GET['id'] : '';
      $select_get = $pdo->prepare("SELECT * FROM `tbl_foodmenu` WHERE foodid = $id1");
      $select_get->execute();
      while($fetch_get = $select_get->fetch(PDO::FETCH_ASSOC)){

        $restaurant12 = $fetch_get['restaurant'];
}






   $verify_cart = $pdo->prepare("SELECT * FROM `tbl_cart` WHERE customerid = ?");
   $verify_cart->execute([$userid]);
   $status = "Not approved";
   $insert_catering = $pdo->prepare("INSERT INTO `tbl_catering_order_details`(userid, order_list, user, status, catering_style, restaurant, grand_total, phonenum, useremail, event_address, payment_type, date_to_be_delivered, time_to_be_delivered) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
   $insert_catering->execute([$userid, $order, $name, $status,$catering_style, $restaurantname, $grand_total, $number, $email, $event_address,  $method, $date_to_be_delivered, $time_to_be_delivered]);
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

   <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">



</head>
<body>

<?php include 'components/header.php'; ?>




<section class="checkout">
  <?php $id= isset($_GET['id']) ? $_GET['id'] : ''; ?>

   <h1 class="heading">Order History</h1>



   <div class="row">

     <div class="summary">
       <div class="col-md-12">

         <table id="tablefoodmenu" class = "table table-striped">
           <thead>
             <tr>
               <th>catering_id</th>
               <th>order_list_id</th>

               <th>payment_type</th>
               <th>user</th>

               <th>restaurant</th>
               <th>event_address</th>
               <th>catering_style</th>

               <th>date_of_reservation</th>
               <th>date_to_be_delivered</th>

             </tr>


           </thead>
           <tbody>
             <?php

               $select=$pdo->prepare("select * from tbl_catering_order_details order by catering_id desc");

               $select->execute();

               while($row=$select->fetch(PDO::FETCH_OBJ)){

                 echo'<tr>
                 <td>
                 '.$row->catering_id.'
                 </td>
                 <td>
                 '.$row->order_list.'
                 </td>
                 <td>
                 '.$row->payment_type.'
                 </td>
                 <td>
                 '.$row->user.'
                 </td>
                 <td>
                 '.$row->restaurant.'
                 </td>
                 <td>
                 '.$row->event_address.'
                 </td>
                 <td>
                 '.$row->catering_style.'
                 </td>

                 <td>
                 '.$row->date_of_reservation.'
                 </td>
                 <td>
                 '.$row->date_to_be_delivered.'
                 </td>


                     </tr>';


               }
                ?>



             </tbody>




         </table>

       </div>










     </div>






   </div>

</section>

  <script src="admin/plugins/jquery/jquery.min.js"></script>
<script src="admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="admin/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="admin/plugins/datatables/datatables-responsive/js/responsive.bootstrap4.js"></script>
<script>
  // Get today's date
  var today = new Date();
  // Set the minimum date to tomorrow
  today.setDate(today.getDate() + 1);

  // Format the minimum date as "yyyy-mm-dd"
  var minDate = today.toISOString().split('T')[0];

  // Set the minimum attribute of the date input field
  document.getElementById("delivery-date").setAttribute("min", minDate);
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="js/script.js"></script>



<?php include 'components/alert.php'; ?>
   <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script>
 $(document).ready(function() {
   $('#tablefoodmenu').DataTable({

     "order":[[0,"desc"]]




   });
});
</script>
</body>
</html>
