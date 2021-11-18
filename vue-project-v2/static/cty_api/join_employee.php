<?php
include "connection.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$number = htmlspecialchars($_POST["number"]);
$password = htmlspecialchars($_POST["password"]);
$name = htmlspecialchars($_POST["name"]);
$biulder = htmlspecialchars($_POST["biulder"]);
$create_date = htmlspecialchars($_POST["create_date"]);
$authority = htmlspecialchars($_POST["authority"]);
$img = htmlspecialchars($_POST["img"]);
$data = json_decode(file_get_contents("php://input"));
// $number = $data->number;
// $password = $data->password;
// $name = $data->name;
// $biulder = $data->biulder;
// $create_date = $data->create_date;
// $authority = $data->authority;
$sql = "INSERT INTO `A_cake`.`EMPLOYEE` ( `EMPLOYEE_NUMBER`, `EMPLOYEE_NAME`, `PASSWORD`, `AUTHORITY`,
 `CREATE_DATE`, `PHONE`, `BIULDER`, `ACTIVE`, `IMG`) VALUES ( ?, ?, ?, ?, NOW(), '3201252', ?, '1', ?);";
$statement = getPDO()->prepare($sql);
       $statement -> bindValue(1,$number);
       $statement -> bindValue(2,$name);
       $statement -> bindValue(3,$password);
       $statement -> bindValue(4,$authority);
       $statement -> bindValue(5,$biulder);
       $statement -> bindValue(6,$img);
       $statement -> execute();

echo $img
?>