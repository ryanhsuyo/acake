<?php
include "connection.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$title = $_POST['title'];
$description =$_POST['description'];
$endDate=$_POST['endDate'];
$id=($_POST['id']);
$sql = "UPDATE `A_cake`.`VOTING` SET `EVENT_NAME` = ?, `EVENT_DESCRIPTION` = ?, `END_DATE` = ? WHERE (`ID` = ?);
";
$statement = getPDO()->prepare($sql);
       $statement -> bindValue(1,$title);
       $statement -> bindValue(2,$description);
       $statement -> bindValue(3,$endDate);
       $statement -> bindValue(4,$id);
       $statement -> execute();


echo "success";
?>