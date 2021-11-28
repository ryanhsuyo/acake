<?php
date_default_timezone_set('Asia/Taipei');  
  include "connection.php";
  $pdo = getPDO();

  $payment=$_POST['payment'];
  $coupon=$_POST['coupon'];
  $memberId=$_POST['memberId'];
  $shipday=$_POST['shipday'];
  $fee=$_POST['fee'];
  $recipient=$_POST['recipient'];
  $address=$_POST['address'];
  $deliver_method=$_POST['deliver_method'];
  $phone=$_POST['phone'];
  $mark=$_POST['mark'];

  $DateAndTime = date('Y-m-d H:i:s a', time()); 
  if($coupon != 0){
   
    $sql = "INSERT INTO `ORDER` (`PAYMENT_METHOD`, `COUPON_ID`, `MEMBER_ID`, `SHIPPING_DATE`, `FINISHED`, `DELIVER_FEE`, `RECEIVER`, `ADDRESS`, `DELIVER_METHOD`, `PHONE`, `NOTE`) 
    VALUES (?, ?,?, ?, '0', ?, ?, ?, ?, ?, ?);
    ";
  
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $payment);
    $statement->bindValue(2, $coupon);
    $statement->bindValue(3, $memberId);
    $statement->bindValue(4, $shipday);
    $statement->bindValue(5, $fee);
    $statement->bindValue(6, $recipient);
    $statement->bindValue(7, $address);
    $statement->bindValue(8, $deliver_method);
    $statement->bindValue(9, $phone);
    $statement->bindValue(10, $mark);
    $statement->execute();
    // print_r($DateAndTime)
    $DateAndTime = date('Y-m-d H:i:s', time());  
echo "$DateAndTime";
  }else{
    $sql = "INSERT INTO `ORDER` (`PAYMENT_METHOD`, `MEMBER_ID`, `SHIPPING_DATE`, `FINISHED`, `DELIVER_FEE`, `RECEIVER`, `ADDRESS`, `DELIVER_METHOD`, `PHONE`, `NOTE`) 
    VALUES (?, ?, ?, '0', ?, ?, ?, ?, ?, ?);
    ";
  
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $payment);
    $statement->bindValue(2, $memberId);
    $statement->bindValue(3, $shipday);
    $statement->bindValue(4, $fee);
    $statement->bindValue(5, $recipient);
    $statement->bindValue(6, $address);
    $statement->bindValue(7, $deliver_method);
    $statement->bindValue(8, $phone);
    $statement->bindValue(9, $mark);
    $statement->execute();
  
    // print_r($DateAndTime) 
    $DateAndTime = date('Y-m-d H:i:s', time());  
echo "$DateAndTime";
  }

?>