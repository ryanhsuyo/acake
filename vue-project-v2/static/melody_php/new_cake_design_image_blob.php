<?php

    include "connection.php";
    // 解決跨域問題
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");

    $pdo = getPDO();

    $img = htmlspecialchars($_POST["cakeImage"]);

    
    $sql = "UPDATE `CAKE` SET `CAKE_DESIGN_IMAGE_BLOB` = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $img);

    $statement->execute();
    // $data = $statement->fetchAll();

    echo 'success';

?>
