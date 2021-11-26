<?php

    include "connection.php";

    $pdo = getPDO();

    $CATEGORY_ID = htmlspecialchars($_POST["categoryId"]);

    $sql = "DELETE FROM FAVORITE WHERE FAVORITE_CATEGORY_ID = ?;";

    $statement1 = $pdo->prepare($sql);
    $statement1->bindValue(1, $CATEGORY_ID);
    $statement1->execute();


    $sql = "DELETE FROM FAVORITE_CATEGORY WHERE CATEGORY_ID = ?;";

    $statement1 = $pdo->prepare($sql);
    $statement1->bindValue(1, $CATEGORY_ID);
    $statement1->execute();

?>
