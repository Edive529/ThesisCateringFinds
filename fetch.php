<?php
// $host = "localhost";
// $dbname = "jackskainan";
// $username = "root";
// $password = "";
//
// try {
// 	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
// 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
// 	die("Connection failed: " . $e->getMessage());
// }
include_once 'connectdb.php';
$output = '';
if (isset($_POST["query"])) {
	$search = $_POST["query"];
	$query = "
	SELECT * FROM tbl_foodmenu
	WHERE restaurant LIKE :search
	OR food LIKE :search
	";
	$stmt = $pdo->prepare($query);
	$stmt->bindValue(':search', '%' . $search . '%');
} else {
	$query = "SELECT * FROM tbl_foodmenu ORDER BY foodid";
	$stmt = $pdo->prepare($query);
}

$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($rows) > 0) {
	$output .= '<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>Restaurant</th>
							<th>Food</th>
						</tr>';
	foreach ($rows as $row) {
		$output .= '
			<tr>
				<td><a href="viewprods.php?id='.$row['userid'].'">'.$row["restaurant"].'</a></td>
				<td><a href="productrate1.php?id='.$row["foodid"].'">'.$row["food"].'</a></td>


			</tr>
		';
	}
	$output .= '</table></div>';
	echo $output;
} else {
	echo 'Data Not Found';
}

?>
