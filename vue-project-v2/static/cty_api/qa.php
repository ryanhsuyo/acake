<?php
include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$id = $_POST['id'];
//建立SQL語法
$sql = "SELECT ms.MESSAGE,ms.SENDER,m.MEMBER_ID,m.UNSOLVED_PROBLEM 
FROM A_cake.MESSAGE ms 
JOIN MEMBER m 
	ON ms.MEMBER_ID = m.MEMBER_ID 
    WHERE ms.MEMBER_ID = ?;";
$statement = getPDO()->prepare($sql);
$statement -> bindValue(1,$id);
$statement -> execute();

//執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
// $statement = getPDO()->query($sql);
//抓出全部且依照順序封裝成一個二維陣列
$data = $statement->fetchAll();
echo json_encode($data);
?>