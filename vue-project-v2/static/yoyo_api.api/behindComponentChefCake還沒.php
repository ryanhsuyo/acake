<?php
  include "connection.php";
  $pdo = getPDO();

  // $memberId = htmlspecialchars($_POST["memberId"]);

  $sql = "SELECT *
  FROM CAKE c
    JOIN FLAVOR f
  on c.FLAVOR_ID = f.ID
    JOIN MEMBER m
  on c.MEMBER_ID = m.MEMBER_ID
    LEFT JOIN CAKE_INGREDIENT i
  on c.CAKE_ID = i.CAKE_ID
    LEFT JOIN INGREDIENT it
  on i.INGREDIENT_ID = it.INGREDIENT_ID
  WHERE m.MEMBER_ID != 0;";
  // $sql = "SELECT * FROM A_cake.CAKE;";

  $statement = $pdo->prepare($sql);
  $statement->execute();
  $data = $statement->fetchAll();

  echo json_encode($data);

?>