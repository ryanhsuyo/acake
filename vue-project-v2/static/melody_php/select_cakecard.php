<?php

    include "connection.php";
    // 解決跨域問題
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");

    $pdo = getPDO();

    $sql = "SELECT * FROM CAKE WHERE MEMBER_ID = 0 ORDER BY CAKE_ID desc LIMIT 6;";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();

    echo json_encode($data);

?>
