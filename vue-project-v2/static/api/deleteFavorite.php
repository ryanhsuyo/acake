<?php

    include "connection.php";

    $pdo = getPDO();

    $favoriteCategoryID = htmlspecialchars($_POST["favoriteCategoryID"]);
    $cakeID = htmlspecialchars($_POST["cakeID"]);

    $sql = "DELETE FROM FAVORITE WHERE FAVORITE_CATEGORY_ID = ? and CAKE_ID = ?";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $favoriteCategoryID);
    $statement->bindValue(2, $cakeID);
    $statement->execute();

    $data = $statement->fetchAll();

    echo json_encode($data);

?>
