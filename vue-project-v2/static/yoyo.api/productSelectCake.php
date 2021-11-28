<?php
  include "connection.php";
  $pdo = getPDO();


  // $sql = "SELECT * FROM A_cake.ELECT * FROM A_cake.CAKE ";
  $sql = "SELECT * FROM CAKE ";


  $statement = $pdo->prepare($sql);
  $statement->execute();
  $data = $statement->fetchAll();

  echo json_encode($data);

?>