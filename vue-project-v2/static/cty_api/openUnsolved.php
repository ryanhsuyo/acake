<?php
include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$id = $_POST['id'];
//建立SQL語法
$sql = "UPDATE `MEMBER` SET`UNSOLVED_PROBLEM` = 1 WHERE `MEMBER_ID` = ?";
$statement = getPDO()->prepare($sql);
$statement -> bindValue(1,$id);
$statement -> execute();
echo "success";
?>