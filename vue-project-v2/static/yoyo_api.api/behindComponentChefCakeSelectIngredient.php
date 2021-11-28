<?php
  include "connection.php";
  $pdo = getPDO();

  // $memberId = htmlspecialchars($_POST["memberId"]);

  $sql = "SELECT 
  c.CAKE_ID,c.CAKE_NAME,i.INGREDIENT_NAME,i.INGREDIENT_ID
  FROM cake c
  left JOIN CAKE_INGREDIENT ci
  ON c.CAKE_ID = ci.CAKE_ID
  left JOIN INGREDIENT i
  ON ci.INGREDIENT_ID = i.INGREDIENT_ID
  group by c.CAKE_ID,c.CAKE_NAME,i.INGREDIENT_NAME,i.INGREDIENT_ID
  ;";

  $statement = $pdo->prepare($sql);
  $statement->execute();
  $data = $statement->fetchAll();

  echo json_encode($data);

?>