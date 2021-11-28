<?php
  include "connection.php";
  $pdo = getPDO();
  $pageID = $_POST["pageID"];

  $sql = "SELECT CAKE_ID,CAKE_NAME, CAKE_DESCRIPTION, SIZE, CAKE_IMAGE_BLOB, PRICE FROM CAKE WHERE CAKE_ID = $pageID;";


  $statement = $pdo->prepare($sql);
  $statement->execute();
  $data = $statement->fetchAll();

  echo json_encode($data);

?>