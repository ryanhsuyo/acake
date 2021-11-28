<?php
date_default_timezone_set('Asia/Taipei');  
  include "connection.php";
  $pdo = getPDO();

  $cakeId=$_POST['cakeId'];
  $time=$_POST['time'];
  $number=$_POST['number'];
  $total=$_POST['total'];


    $sql = "INSERT INTO `PRODUCT` (`CAKE_ID`, `ORDER_ID`, `QUANTITY`, `PRICE`) VALUES (?, (SELECT ORDER_ID FROM `ORDER` WHERE CREATE_DATE = ?), ?, ?);
    ";
  
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $cakeId);
    $statement->bindValue(2, $time);
    $statement->bindValue(3, $number);
    $statement->bindValue(4, $total);
    $statement->execute();
    
  echo $time
?>