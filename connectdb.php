<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=jackskainan','root','');

  // echo "connection succesful";
} catch (PDOException $e) {

  echo $e->getmessage();

}


function create_unique_id(){
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < 20; $i++) {
          $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }

 ?>
