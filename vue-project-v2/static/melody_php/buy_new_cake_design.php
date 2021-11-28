<?php
    date_default_timezone_set('Asia/Taipei');  
    include "connection.php";
    // 解決跨域問題
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");

    $pdo = getPDO();

    
    $time= htmlspecialchars($_POST["time"]);

    // $DateAndTime = date('Y-m-d Ｈ:i:s', time()); 
    $sql = "SELECT * FROM `CAKE` WHERE CREATE_TIME = ?";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $time);

    $statement->execute();
    $data = $statement->fetchAll();
    
    // echo 'success';
    echo json_encode($data);

?>
