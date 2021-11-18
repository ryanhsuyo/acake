<?php
include "connection.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$email = htmlspecialchars($_POST["email"]);
$password = htmlspecialchars($_POST["password"]);
$name = htmlspecialchars($_POST["name"]);
$birthday = htmlspecialchars($_POST["birthday"]);
$sql = "INSERT INTO `A_cake`.`MEMBER` (`EMAIL`, `PASSWORD`, `BIRTHDAY`, `NAME`) VALUES (?, ?, ?, ?);
";
$statement = getPDO()->prepare($sql);
       $statement -> bindValue(1,$email);
       $statement -> bindValue(2,$password);
       $statement -> bindValue(3,$birthday);
       $statement -> bindValue(4,$name);
       $statement -> execute();

echo "success"
?>