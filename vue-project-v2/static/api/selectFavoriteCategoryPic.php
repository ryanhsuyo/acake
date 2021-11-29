<?php

    include "connection.php";

    $pdo = getPDO();

    $memberId = htmlspecialchars($_POST["memberId"]);

    $sql = "SELECT fc.CATEGORY_NAME, fc.CATEGORY_ID, c.CAKE_IMAGE_BLOB, c.CAKE_DESIGN_IMAGE_BLOB
    FROM FAVORITE_CATEGORY fc 
        LEFT JOIN FAVORITE f 
            on fc.CATEGORY_ID = f.FAVORITE_CATEGORY_ID
        LEFT JOIN CAKE c 
            on f.CAKE_ID = c.CAKE_ID
    WHERE fc.MEMBER_ID = ? and fc.MEMBER_TOTAL != '1' 
    ORDER BY CATEGORY_ID;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $memberId);
    $statement->execute();

    $data = $statement->fetchAll();

    echo json_encode($data);

?>
