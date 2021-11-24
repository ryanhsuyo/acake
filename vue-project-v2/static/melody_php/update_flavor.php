<?php

    include "connection.php";
    // 解決跨域問題
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");

    $pdo = getPDO();

    // $memberId = htmlspecialchars($_POST["memberId"]);
    $name = htmlspecialchars($_POST["name"]);
    $description = htmlspecialchars($_POST["description"]);
    // $img = htmlspecialchars($_POST["img"]);
    $price = htmlspecialchars($_POST["price"]);

    // $sql = "SELECT * FROM FLAVOR;";
    // $sql = "SELECT * FROM FLAVOR WHERE FLAVOR_ID = ?;";
    $sql = "UPDATE `FLAVOR` SET `NAME`= ?, `DESCRIPTION`= ?, `PRICE`= ?, `CATEGORY_NAME`= 'cake', `AVAILABLE`= 1 WHERE (`ID` = ?);";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $name);
    $statement->bindValue(2, $description);
    // $statement->bindValue(3, $img);
    $statement->bindValue(3, $price);
    $statement->bindValue(4,$_POST["id"]);

    $statement->execute();
    // $data = $statement->fetchAll();

    echo 'success';

?>
