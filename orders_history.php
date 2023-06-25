<?php

include 'connectdb.php';

session_start();

if ($_SESSION['useremail']=="" OR $_SESSION['role']!="customer" ) {
  header('location:index.php');
}

$userid = $_SESSION['customerid'];


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


   <h1 class="heading">Order History</h1>



   <div class="row">

     <div class="summary">
       <div class="col-md-12">

         <table id="tablefoodmenu" class = "table table-striped">
           <thead>
             <tr>

               <th>Order list</th>

               <th>Payment type</th>
               <th>User</th>

               <th>Restaurant</th>
               <th>Event address</th>
                <th>Status</th>
               <th>Cateringstyle</th>

               <th>Date_of_reservation</th>
               <th>Date to be delivered</th>

             </tr>


           </thead>
           <tbody>
             <?php

               $select=$pdo->prepare("select * from tbl_catering_order_details where userid = '$userid' AND status = 'Delivered' or status = 'not approved' order by catering_id desc");

               $select->execute();

               while($row=$select->fetch(PDO::FETCH_OBJ)){
                $status1 = $row->status;

                 echo'<tr>

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
                 <td style="color: ' . ($status1 == 'Delivered' ? 'green' : 'red') . '">
               ' . $row->status . '
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
