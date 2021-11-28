<?php
include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$page = $_POST['page'];
$page = $page*9;
//建立SQL語法
$sql = "SELECT * FROM `CAKE` WHERE `MEMBER_ID` != 0 AND `AUTHORIZATION` = 1 LIMIT $page,9;";
$statement = getPDO()->prepare($sql);
$statement -> execute();
$data = $statement->fetchAll();
echo json_encode($data);
?>