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
$sql = "INSERT INTO `A_cake`.`VOTING` (`EVENT_NAME`, `EVENT_DESCRIPTION`, `IMG_BLOB`, `START_DATE`, `END_DATE`) VALUES (?,?,?,?,?);

";
$statement = getPDO()->prepare($sql);
       $statement -> bindValue(1,$title);
       $statement -> bindValue(2,$description);
       $statement -> bindValue(3,$img);
       $statement -> bindValue(4,$startDate);
       $statement -> bindValue(5,$endDate);
       $statement -> execute();


echo "success";
?>