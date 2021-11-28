<?php
date_default_timezone_set('Asia/Taipei');  
  include "connection.php";
  $pdo = getPDO();

  $time=$_POST['time'];
  $accessId=$_POST['accessId'];
  $accessNum=$_POST['accessNum'];
  $accessId=mb_split(',',$accessId);
  $accessNum=mb_split(',',$accessNum);
//   $packageNum=$_POST['packageNum'];
//   print_r($accessId);
//   print_r("我是分隔線");
//   print_r($accessNum);
//   print_r($packageNum);
for($i=0;$i<COUNT($accessId);$i++){
    $sql="INSERT INTO `PRODUCT_ACCESSORIES` (`PRODUCT_ID`, `ACCESSORIES_ID`, `ACCESSORIES_QUANTITY`) VALUES 
    ((SELECT p.ID FROM PRODUCT p WHERE ORDER_ID = (SELECT ORDER_ID FROM `ORDER` WHERE CREATE_DATE =  ?)), ?, ?);
    ";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $time);
    $statement->bindValue(2, $accessId[$i]);
    $statement->bindValue(3, $accessNum[$i]);
    $statement->execute();
};
echo "ACCESS SUCCESS $time"

//     $sql = "INSERT INTO `PRODUCT` (`CAKE_ID`, `ORDER_ID`, `QUANTITY`, `PRICE`) VALUES (?, (SELECT ORDER_ID FROM A_cake.ORDER WHERE CREATE_DATE = ?), ?, ?);
//     ";
  
//     $statement->bindValue(3, $number);
//     $statement->bindValue(4, $total);
//     $statement->execute();
    
//   echo $time
?>