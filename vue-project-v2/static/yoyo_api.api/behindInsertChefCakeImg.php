<?php
  include "connection.php";
  $pdo = getPDO();

  $test=$_POST['test'];
  $index=$_POST['index'];


    $sql = "UPDATE `CAKE` SET `CAKE_IMAGE_BLOB` = ? WHERE (`CAKE_ID` = ?);

    ";
  
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $test);
    $statement->bindValue(2, $index);
    $statement->execute();
    
  echo "OK";
?>