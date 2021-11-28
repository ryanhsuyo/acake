<?php
// date_default_timezone_set('Asia/Taipei');
include "connection.php";
$pdo = getPDO();

$memberId = $_POST["memberId"];
$time = $_POST["orderDate"];
$sql = "SELECT * FROM `ORDER` WHERE MEMBER_ID = ? AND CREATE_DATE = ?";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $memberId);
$statement->bindValue(2, $time);
$statement->execute();
$data = $statement->fetchAll();
echo json_encode($data);
