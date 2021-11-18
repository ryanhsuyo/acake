<?php
include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$email = $_POST['email'];
$password = $_POST['password'];
//建立SQL語法
$sql = "SELECT * FROM A_cake.MEMBER WHERE EMAIL = ? && PASSWORD = ?;";
$statement = getPDO()->prepare($sql);
$statement -> bindValue(1,$email);
$statement -> bindValue(2,$password);
$statement -> execute();

//執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
// $statement = getPDO()->query($sql);
//抓出全部且依照順序封裝成一個二維陣列
$data = $statement->fetchAll();
if(COUNT($data)>0){
    echo json_encode($data);
}else{
    echo "登入失敗";
}
?>