<?php



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

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />



</head>
<body>

<?php include 'components/header.php'; ?>




<section class="checkout">



   <div class="row">

		 <div class="container">
	 <h2 align="center">Search</h2><br />
	 <div class="form-group">
		 <div class="input-group">
			 <span class="input-group-addon">Search</span>
			 <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
		 </div>
	 </div>
	 <br />
	 <div id="result"></div>
 </div>
 <div style="clear:both"></div>








   </div>

</section>





<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetchin.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}

	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
	});
});
</script>

<script src="js/script.js"></script>



<?php include 'components/alert.php'; ?>
   <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

</body>
</html>
