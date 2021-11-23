<?php

    include "connection.php";
    // 解決跨域問題
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");

    $pdo = getPDO();

    // $memberId = htmlspecialchars($_POST["memberId"]);
    $flavorId = htmlspecialchars($_POST["flavorId"]);

    $sql = "SELECT * FROM FLAVOR;";
    
    // 另外加的
    // $res=$mysqli->query($sql);
    // $arr=array();
    // while ($row=$res->fetch_assoc()) {
	// 	$arr[]=$row;
	// }
    

    $statement = $pdo->prepare($sql);
    // $statement->bindValue(1, $flavorId);
    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data);

?>
