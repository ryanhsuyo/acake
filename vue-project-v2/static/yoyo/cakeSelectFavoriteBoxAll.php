<?php
  include "connection.php";
  $pdo = getPDO();


  $sql = "SELECT CATEGORY_NAME,CATEGORY_ID FROM FAVORITE_CATEGORY
  WHERE MEMBER_ID = 1;";

  $statement = $pdo->prepare($sql);
  $statement->execute();
  $data = $statement->fetchAll();

  echo json_encode($data);

?>