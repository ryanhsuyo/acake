<?php
include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
//建立SQL語法
$sql = "SELECT * FROM `VOTING` ORDER BY ID desc limit 1;";
$statement = getPDO()->prepare($sql);
$statement -> execute();
$data = $statement->fetchAll();
echo json_encode($data);
?>