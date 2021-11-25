<?php
include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$id = $_POST['id'];
//建立SQL語法
$sql = "INSERT INTO `FAVORITE_CATEGORY` (`MEMBER_ID`, `CATEGORY_NAME`, `MEMBER_TOTAL`) VALUES (?, '所有收藏', '1');";
$statement = getPDO()->prepare($sql);
$statement -> bindValue(1,$id);
$statement -> execute();

echo"success";
?>