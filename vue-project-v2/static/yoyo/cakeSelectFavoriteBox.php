<?php
  include "connection.php";
  $pdo = getPDO();


  $sql = "SELECT m.MEMBER_ID, fc.CATEGORY_ID, fc.CATEGORY_NAME,f.CAKE_ID
  FROM FAVORITE_CATEGORY fc
  JOIN `MEMBER` m on fc.MEMBER_ID = m.MEMBER_ID
  JOIN FAVORITE f on fc.CATEGORY_ID = f.FAVORITE_CATEGORY_ID
  where m.MEMBER_ID = 1
  GROUP BY m.MEMBER_ID, fc.CATEGORY_ID, fc.CATEGORY_NAME,f.CAKE_ID;";

  $statement = $pdo->prepare($sql);
  $statement->execute();
  $data = $statement->fetchAll();

  echo json_encode($data);

?>