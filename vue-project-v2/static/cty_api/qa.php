<?php
include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$id = $_POST['id'];
//建立SQL語法
$sql = "SELECT ms.MESSAGE,ms.SENDER,m.MEMBER_ID,m.UNSOLVED_PROBLEM 
FROM `MESSAGE` ms 
JOIN `MEMBER` m 
	ON ms.MEMBER_ID = m.MEMBER_ID 
    WHERE ms.MEMBER_ID = ?;";
$statement = getPDO()->prepare($sql);
$statement -> bindValue(1,$id);
$statement -> execute();
$data = $statement->fetchAll();
// print_r(COUNT($data));
if(COUNT($data)>0){
    echo json_encode($data);
}else{
    // echo'1';
$sql="INSERT INTO `MESSAGE` (`MESSAGE`, `SENDER`, `MEMBER_ID`,`SENT_TIME`) VALUES ('請輸入您的問題', '0', ?,NOW());";
$statement = getPDO()->prepare($sql);
$statement -> bindValue(1,$id);
$statement -> execute();
// echo '2';
}
?>