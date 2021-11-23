<?php
include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$name = $_POST['name'];
//建立SQL語法
$sql = "SELECT * FROM `EMPLOYEE` WHERE EMPLOYEE_NAME LIKE ? ";
$statement = getPDO()->prepare($sql);
$statement -> bindValue(1,"%".$name."%");
$statement -> execute();

//執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
// $statement = getPDO()->query($sql);
//抓出全部且依照順序封裝成一個二維陣列
$data = $statement->fetchAll();
echo json_encode($data);
?>