<?php
date_default_timezone_set('Asia/Taipei');  
  include "connection.php";
  $pdo = getPDO();

  $coupon=$_POST['coupon'];


  $sql="UPDATE `COUPON` SET `USED` = '1' WHERE (`COUPON_ID` = ?);
  ";
  
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $coupon);

    $statement->execute();
    
?>