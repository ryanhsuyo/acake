<?php
include "connection.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$message = htmlspecialchars($_POST["message"]);
$id = htmlspecialchars($_POST["id"]);
$sql = "INSERT INTO `A_cake`.`MESSAGE` (`MESSAGE`, `SENDER`, `SENT_TIME`, `CONVERSATION_ID`) VALUES (?, '1', NOW(), ?);
";
$statement = getPDO()->prepare($sql);
       $statement -> bindValue(1,$message);
       $statement -> bindValue(2,$id);
       $statement -> execute();

echo $message;
?>