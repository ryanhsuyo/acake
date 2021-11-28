<?php
  include "connection.php";
  $pdo = getPDO();

  // $memberId = htmlspecialchars($_POST["memberId"]);

  $sql = "SELECT * FROM ACCESSORIES;";
  // $sql = "SELECT * FROM A_cake.CAKE;";

  $statement = $pdo->prepare($sql);
  $statement->execute();
  $data = $statement->fetchAll();

  echo json_encode($data);

?>