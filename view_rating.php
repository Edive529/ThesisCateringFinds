<?php

include 'connectdb.php';
session_start();

$userid = $_SESSION['customerid'];

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:orders.php');
}

if(isset($_POST['place_order'])){

   $rating = $_POST['rating'];
   $rating = filter_var($rating, FILTER_SANITIZE_STRING);
   $review = $_POST['review'];
   $review = filter_var($review, FILTER_SANITIZE_STRING);
   $status = $_POST['status'];
   $status = filter_var($status, FILTER_SANITIZE_STRING);

   $update = $pdo->prepare("update tbl_orders set rating=:rating, review=:review, status=:status where id=$get_id");
   $update->bindParam(':rating',$rating);
   $update->bindParam(':review',$review);
   $update->bindParam(':status',$status);

   if ($update->execute()) {

     $sucess_msg[] = 'Rated Successfully!';

     header('location:rating.php');

   }else {
     $error_msg[] = 'Rating Failed!';
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


</head>
<body>

<?php include 'components/header.php'; ?>

<section class="order-details">

   <h1 class="heading">Rate Order</h1>

   <div class="box-container">

   <?php

      $select_orders = $pdo->prepare("SELECT * FROM `tbl_orders` WHERE id = ? LIMIT 1");
      $select_orders->execute([$get_id]);
      if($select_orders->rowCount() > 0){
         while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){

           $food = $fetch_order['foodid'];


   ?>
   <div class="box">
      <div class="col">
         <p class="title"><i class="fas fa-calendar"></i><?= $fetch_order['date']; ?></p>

         <?php

         $select_orders1 = $pdo->prepare("SELECT * FROM `tbl_foodmenu` WHERE foodid = ? LIMIT 1");
         $select_orders1->execute([$food]);
         if($select_orders1->rowCount() > 0){
            while($fetch_order1 = $select_orders1->fetch(PDO::FETCH_ASSOC)){


              $food1 = $fetch_order1['food'];



          ?>



          <h1><?php echo $fetch_order1['restaurant']; ?></h1>
         <h3 class="name" style="letter-spacing: 1px; line-height: 2.0; font-size: 25px; text-align: center;"><?php echo $food1; ?></h3>

         <img style="width:150px;  display: block; margin: auto; border-radius:10%;" src="admin/upload/<?php echo $fetch_order1['image'];; ?>"alt="">


      </div>
      <div class="col">
         <p class="title">Rate me?</p>

         <p>Rating<span>* How many Stars will you give?</span></p>
         <form action="" method="POST">

      <input type="number" name="rating" required min="1" value="1" max="5" maxlength="2" style=" width: 20%;
       background-color: #eee;
       border-radius: .5rem;
       padding: 1.4rem;
       color: black;
       font-size: 1.8rem;
       margin: 1rem 0;" >

         <p>Review<span>*</span></p>
         <textarea type="text" name="review" required maxlength="255" value=""  style=" width: 70%;
          background-color: #eee;
          border-radius: .5rem;
          padding: 1.4rem;
          color: black;
          font-size: 1.8rem;
          margin: 1rem 0;"></textarea>
         <input type="hidden" name="status" value="Already Rated!">


<?php  ?>

            <input type="submit" value="Rate Order" name="place_order" class="btn">
         </form>





      </div>
   </div>
 <?php } }}}?>


   </div>

</section>











<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>




<script src="js/script.js"></script>



<?php include 'components/alert.php'; ?>

</body>
</html>
