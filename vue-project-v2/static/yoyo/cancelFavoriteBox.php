<?php
  include "connection.php";
  header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
  $pdo = getPDO();

  // $memberId = htmlspecialchars($_POST["memberId"]);

  $sql = "delete from `FAVORITE` where FAVORITE_CATEGORY_ID in
  (select CATEGORY_ID 
  from FAVORITE_CATEGORY
  WHERE MEMBER_ID = ?
  )
  and CAKE_ID =? ;";

  $statement = $pdo->prepare($sql);
  $statement -> bindValue(1,$_POST['id']);
  $statement -> bindValue(2,$_POST['cakeid']);
  $statement->execute();
  $data = $statement->fetchAll();

  echo ($_POST['id']);
  echo "<br>";
  echo ($_POST['cakeid']);

?>