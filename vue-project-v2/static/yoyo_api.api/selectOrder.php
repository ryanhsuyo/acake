<?php
  date_default_timezone_set('Asia/Taipei');  
  include "connection.php";
  $pdo = getPDO();

  $memberId = htmlspecialchars($_POST["memberId"]);

  $sql = "SELECT * FROM `ORDER` WHERE MEMBER_ID = ?;";

  $statement = $pdo->prepare($sql);
  $statement->bindValue(1, $memberId);
  $statement->execute();
  $data = $statement->fetchAll();

  echo json_encode($data);

?>