<?php

    include "connection.php";
    // 解決跨域問題
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");

    $pdo = getPDO();

    // $memberId = htmlspecialchars($_POST["memberId"]);
    $name = htmlspecialchars($_POST["name"]);
    $size = htmlspecialchars($_POST["size"]);
    $img = htmlspecialchars($_POST["img"]);
    $price = htmlspecialchars($_POST["price"]);
    $author = htmlspecialchars($_POST["memberid"]);
    $flavor = htmlspecialchars($_POST["flavor"]);
    $description = htmlspecialchars($_POST["description"]);

    // $sql = "SELECT * FROM FLAVOR;";
    // $sql = "SELECT * FROM FLAVOR WHERE FLAVOR_ID = ?;";
    $sql = "INSERT INTO `CAKE`(`CAKE_NAME`, `SIZE`, `CAKE_IMAGE`, `PRICE`, `MEMBER_ID`, `FLAVOR`, `CAKE_DESCRIPTION`) VALUES (?,?,?,?,?,1,?,?);";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $name);
    $statement->bindValue(2, $size);
    $statement->bindValue(3, $img);
    $statement->bindValue(4, $price);
    $statement->bindValue(5, $author);
    $statement->bindValue(6, $flavor);
    $statement->bindValue(7, $description);

    $statement->execute();
    // $data = $statement->fetchAll();

    echo 'success';
?>
