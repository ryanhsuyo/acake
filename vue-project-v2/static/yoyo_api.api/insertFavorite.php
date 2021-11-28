<?php
  include "connection.php";
  header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
  $pdo = getPDO();

  // $memberId = htmlspecialchars($_POST["memberId"]);
    $fileId=$_POST['fileID'];
    $cakeID=$_POST['cakeID'];
    $allID=$_POST['allID'];
  $sql = "INSERT INTO `FAVORITE` (`FAVORITE_CATEGORY_ID`, `CAKE_ID`) VALUES (?, ?);
  ";
    $statement = $pdo->prepare($sql);
    $statement -> bindValue(1,$fileId);
    $statement -> bindValue(2,$cakeID);
    $statement->execute();
  $sql = "INSERT INTO `FAVORITE` (`FAVORITE_CATEGORY_ID`, `CAKE_ID`) VALUES (?, ?);
  ";

  $statement = $pdo->prepare($sql);
  $statement -> bindValue(1,$allID);
  $statement -> bindValue(2,$cakeID);
  $statement->execute();

  echo ($fileId);
  echo "<br>";
  echo ( $cakeID);

?>