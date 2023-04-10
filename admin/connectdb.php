<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=jackskainan','root','');

  // echo "connection succesful";
} catch (PDOException $e) {

  echo $e->getmessage();

}

 ?>
