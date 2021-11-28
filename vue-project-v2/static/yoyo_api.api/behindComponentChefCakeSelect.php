<?php
  include "connection.php";
  $pdo = getPDO();

  // $memberId = htmlspecialchars($_POST["memberId"]);

  $sql = "SELECT * FROM CAKE c 
  JOIN `MEMBER` m 
  ON m.MEMBER_ID = c.MEMBER_ID
  Where m.MEMBER_ID = 0;";

  $statement = $pdo->prepare($sql);
  $statement->execute();
  $data = $statement->fetchAll();

  echo json_encode($data);

?>