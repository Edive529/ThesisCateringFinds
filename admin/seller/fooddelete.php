<?php

include_once '../connectdb.php';

$id = $_POST['foodidd'];

$sql = "delete from tbl_foodmenu where foodid=$id";


$delete=$pdo->prepare($sql);

if($delete->execute()){


}else{
  echo'error in deleting';
}








 ?>
