<?php

    include "connection.php";
    // 解決跨域問題
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");

    $pdo = getPDO();

    // $memberId = htmlspecialchars($_POST["memberId"]);
    $ingredientId = htmlspecialchars($_POST["ingredientId"]);

    // $sql = "SELECT * FROM INGREDIENT WHERE INGREDIENT_ID = ?;";
    $sql = "SELECT * FROM INGREDIENT WHERE CATEGORY = ?;";

    

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $ingredientId);
    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data);

?>
