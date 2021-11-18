<?php
include "connection.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$title = $_POST['title'];
$description =$_POST['description'];
$startDate=$_POST['startDate'];
$endDate=$_POST['endDate'];
$img=$_POST['img'];
$sql = "INSERT INTO `A_cake`.`VOTING` (`EVENT_NAME`, `EVENT_DESCRIPTION`, `START_DATE`, `END_DATE`, `IMG`) VALUES (?,?,?,?,?);

";
$statement = getPDO()->prepare($sql);
       $statement -> bindValue(1,$title);
       $statement -> bindValue(2,$description);
       $statement -> bindValue(3,$startDate);
       $statement -> bindValue(4,$endDate);
       $statement -> bindValue(5,$img);
       $statement -> execute();


echo "success";
?>