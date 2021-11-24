<?php

    include "connection.php";
    // 解決跨域問題
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");

    $pdo = getPDO();

    // $memberId = htmlspecialchars($_POST["memberId"]);
    // $name = htmlspecialchars($_POST["name"]);
    // $description = htmlspecialchars($_POST["description"]);
    $img = htmlspecialchars($_POST["img"]);
    // $price = htmlspecialchars($_POST["price"]);

    
    $sql = "UPDATE `CAKE` SET `CAKE_DESIGN_IMAGE_BLOB` = ? WHERE (`ID` = ?);";

    $statement = $pdo->prepare($sql);
    // $statement->bindValue(1, $name);
    // $statement->bindValue(2, $description);
    $statement->bindValue(1, $img);
    // $statement->bindValue(3, $price);
    $statement->bindValue(2,$_POST["id"]);

    $statement->execute();
    // $data = $statement->fetchAll();

    echo 'success';

?>
