<?php

    include "connection.php";

    $pdo = getPDO();

    $memberID = htmlspecialchars($_POST["memberID"]);
    $favCategoryID = htmlspecialchars($_POST["favCategoryID"]);

    if($favCategoryID != 0){
        $sql = "SELECT c.CAKE_IMAGE, c.CAKE_IMAGE_BLOB, c.CAKE_NAME, c.CAKE_NAME, c.CAKE_ID, c.CAKE_DESCRIPTION FROM CAKE c JOIN FAVORITE f on c.CAKE_ID = f. CAKE_ID JOIN FAVORITE_CATEGORY fc on f.FAVORITE_CATEGORY_ID = fc.CATEGORY_ID WHERE fc.MEMBER_ID = ? and CATEGORY_ID = ?;";
    
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $memberID);
        $statement->bindValue(2, $favCategoryID);
    }else{
        $sql = "SELECT distinct c.CAKE_IMAGE, c.CAKE_IMAGE_BLOB, c.CAKE_NAME, c.CAKE_NAME, c.CAKE_ID, c.CAKE_DESCRIPTION FROM CAKE c JOIN FAVORITE f on c.CAKE_ID = f. CAKE_ID JOIN FAVORITE_CATEGORY fc on f.FAVORITE_CATEGORY_ID = fc.CATEGORY_ID WHERE fc.MEMBER_ID = ?;";
    
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $memberID);
    }

    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data);

?>
