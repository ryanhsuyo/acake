<?php
include "connection.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$data = json_decode(file_get_contents("php://input"));
$ID = $_POST['id'];
$ID++;
$name =$_POST['name'];
$password =$_POST['password'];
$authority =$_POST['authority'];
$active =$_POST['active'];
$sql = "UPDATE `A_cake`.`EMPLOYEE` SET `EMPLOYEE_NAME` = ?, `PASSWORD` = ?, `AUTHORITY` = ?,`ACTIVE` = ? WHERE (`ID` = ?);
";
$statement = getPDO()->prepare($sql);
       $statement -> bindValue(1,$name);
       $statement -> bindValue(2,$password);
       $statement -> bindValue(3,$authority);
       $statement -> bindValue(4,$active);
       $statement -> bindValue(5,$ID);
       $statement -> execute();


echo $ID;
?>