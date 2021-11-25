<?php

    include "connection.php";

    $pdo = getPDO();

    $CATEGORY_ID = htmlspecialchars($_POST["categoryId"]);

    // $sql = "DELETE FROM FAVORITE WHERE FAVORITE_CATEGORY_ID = ? and MEMBER_ID = ?";

    $sql = "DELETE FROM FAVORITE_CATEGORY WHERE CATEGORY_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $CATEGORY_ID);

    $statement->execute();

?>
