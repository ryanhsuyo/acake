<?php
date_default_timezone_set('Asia/Taipei');  
  include "connection.php";
  $pdo = getPDO();
  $time=$_POST['time'];
  $packages=$_POST['packages'];
    $sql="INSERT INTO `PRODUCT_ACCESSORIES` (`PRODUCT_ID`, `ACCESSORIES_ID`, `ACCESSORIES_QUANTITY`) VALUES 
    ( (SELECT p.ID FROM PRODUCT p WHERE ORDER_ID = (SELECT ORDER_ID FROM `ORDER` WHERE CREATE_DATE =  ?)), ?, 1);
    ";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $time);
    $statement->bindValue(2, $packages);
    $statement->execute();
// echo "PACKAGE  SUCCESS $time";
// echo $packages;
?>