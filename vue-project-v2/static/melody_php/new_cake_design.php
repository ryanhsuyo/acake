<?php

    include "connection.php";
    // 解決跨域問題
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");

    $pdo = getPDO();

    $name = htmlspecialchars($_POST["name"]);
    $nameEng = htmlspecialchars($_POST["nameEng"]);
    // $size = htmlspecialchars($_POST["size"]);
    $price = htmlspecialchars($_POST["price"]);
    $description = htmlspecialchars($_POST["description"]);
    $flavorID = htmlspecialchars($_POST["flavorID"]);
    $cakeDesignImageBlob = htmlspecialchars($_POST["cakeDesignImageBlob"]);
    $memberID = htmlspecialchars($_POST["memberID"]);
    $authorization = htmlspecialchars($_POST["authorization"]);
    $votingID = htmlspecialchars($_POST["votingID"]);

    
    $sql = "INSERT INTO `CAKE`  (`CAKE_NAME`,`CAKE_NAME_ENG`,`SIZE`, `PRICE`,`CAKE_DESCRIPTION`, `FLAVOR_ID`, CAKE_DESIGN_IMAGE_BLOB , `MEMBER_ID`, `AUTHORIZATION`, `VOTING_ID`) VALUES ( ?, ?, '6', ?, ?, ?, ?, ?, ?, ?);";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $name);
    $statement->bindValue(2, $nameEng);
    // $statement->bindValue(3, $size);
    $statement->bindValue(3, $price);
    $statement->bindValue(4, $description);
    $statement->bindValue(5, $flavorID);
    $statement->bindValue(6, $cakeDesignImageBlob);
    $statement->bindValue(7, $memberID);
    $statement->bindValue(8, $authorization);
    $statement->bindValue(9, $votingID);
    // $statement->bindValue(2,$_POST["id"]);

    $statement->execute();
    // $data = $statement->fetchAll();

    echo 'success';

?>
