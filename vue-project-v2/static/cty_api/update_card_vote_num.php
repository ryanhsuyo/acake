<?php
include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$vote = $_POST['vote'];
$id = $_POST['id'];
//建立SQL語法
$sql = "UPDATE `CAKE` SET `VOTING_NUM` = ? WHERE (`CAKE_ID` = ?);
";
$statement = getPDO()->prepare($sql);
$statement -> bindValue(1,$vote);
$statement -> bindValue(2,$id);
$statement -> execute();
echo "success";
?>