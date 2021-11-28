<?php
  include "connection.php";
  $pdo = getPDO();


  $sql = "SELECT * FROM ACCESSORIES WHERE ACCESSORIES_CATEGORY = 3;";

  $statement = $pdo->prepare($sql);
  $statement->execute();
  $data = $statement->fetchAll();

  echo json_encode($data);

?>