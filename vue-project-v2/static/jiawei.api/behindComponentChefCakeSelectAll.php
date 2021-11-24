<?php
  include "connection.php";
  $pdo = getPDO();

  // $memberId = htmlspecialchars($_POST["memberId"]);

  $sql = "SELECT c.CAKE_ID,c.CAKE_NAME,c.SIZE,c.PRICE,c.CAKE_DESCRIPTION,c.CAKE_IMAGE,it.INGREDIENT_NAME,c.CREATE_TIME
  FROM CAKE c
    JOIN FLAVOR f
  on c.FLAVOR_ID = f.ID
    JOIN MEMBER m
  on c.MEMBER_ID = m.MEMBER_ID
    LEFT JOIN CAKE_INGREDIENT i
  on c.CAKE_ID = i.CAKE_ID
    LEFT JOIN INGREDIENT it
  on i.INGREDIENT_ID = it.INGREDIENT_ID
  where m.MEMBER_ID = 1";

  $statement = $pdo->prepare($sql);
  $statement->execute();
  $data = $statement->fetchAll();

  echo json_encode($data);

?>