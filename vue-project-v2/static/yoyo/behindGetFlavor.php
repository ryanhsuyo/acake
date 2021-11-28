<?php
  include "connection.php";
  $pdo = getPDO();


    $sql = "SELECT * FROM `FLAVOR`;

    ";
  
    $statement = $pdo->prepare($sql);

    $statement->execute();
    $data = $statement->fetchAll();

  echo json_encode($data);
?>