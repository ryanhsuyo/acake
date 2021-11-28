 <?php

    include "connection.php";
    // 解決跨域問題
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");

    $pdo = getPDO();

    $name = htmlspecialchars($_POST["name"]);
    $size = htmlspecialchars($_POST["size"]);
    $price = htmlspecialchars($_POST["price"]);
    $description = htmlspecialchars($_POST["description"]);
    $flavor = htmlspecialchars($_POST["flavor"]);
    $available = htmlspecialchars($_POST["available"]);
    $id = htmlspecialchars($_POST["id"]);

    // $sql = "SELECT * FROM FLAVOR;";
    // $sql = "SELECT * FROM FLAVOR WHERE FLAVOR_ID = ?;";
    $sql = "UPDATE `CAKE` SET `CAKE_NAME`=?, `SIZE` = ?, `PRICE` = ?, `CAKE_DESCRIPTION` = ?, `FLAVOR_ID` = ?, `CAKE_AVAILABLE` = ? WHERE (`CAKE_ID` = ?);

    ";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $name);
    $statement->bindValue(2, $size);
    $statement->bindValue(3, $price);
    $statement->bindValue(4, $description);
    $statement->bindValue(5, $flavor);
    $statement->bindValue(6, $available);
    $statement->bindValue(7, $id);
    $statement->execute();

    echo 'success';
?>
