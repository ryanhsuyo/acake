<?php

    include "connection.php";

    $pdo = getPDO();

    $sql = "SELECT *
    FROM CAKE c 
        JOIN `MEMBER` m 
            on c.MEMBER_ID = m.MEMBER_ID 
    ORDER by CAKE_ID desc;";

    $statement = $pdo->query($sql);

    $data = $statement->fetchAll();

    echo json_encode($data);

?>
