<?php
include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$id = $_POST['id'];
//建立SQL語法
$sql = "SELECT * FROM A_cake.MEMBER WHERE EMAIL = ?;";
$statement = getPDO()->prepare($sql);
$statement -> bindValue(1,$id);
$statement -> execute();

//執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
// $statement = getPDO()->query($sql);
//抓出全部且依照順序封裝成一個二維陣列
$data = $statement->fetchAll();
if(COUNT($data)>0){
    echo "此信箱已使用";
}else{
    echo "此信箱可使用";
}
?>