<?php
include ("connection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$ingredient = $_POST['ingredient'];
$flavor = $_POST['flavor'];
$ingredient_el = mb_split(',',$ingredient);
$flavor_el = mb_split(',',$flavor);
// $flavor = mb_split(',',$flavor);
// $ingredient_query = str_repeat('?,',count($ingredient).'?');
// 如果配料選項為空
if($ingredient =='' && $flavor!=''){
    $sql = 'SELECT CAKE_NAME,c.CAKE_DESCRIPTION,c.CAKE_IMAGE,VOTING_NUM,c.CAKE_ID,c.CAKE_IMAGE_BLOB
FROM INGREDIENT i 
	JOIN CAKE_INGREDIENT ci
		on i.INGREDIENT_ID = ci.INGREDIENT_ID
	JOIN CAKE c
		on ci.CAKE_ID = c.CAKE_ID
	JOIN FLAVOR f
		on c.FLAVOR_ID = f.ID
        WHERE FIND_IN_SET (f.NAME,?)
        GROUP BY CAKE_NAME,c.CAKE_DESCRIPTION,c.CAKE_IMAGE,VOTING_NUM,c.CAKE_ID,c.CAKE_IMAGE_BLOB;
';
$statement = getPDO()->prepare($sql);
$statement -> bindValue(1,$flavor);
    $statement -> execute();
    $data = $statement->fetchAll();
 
    echo json_encode($data);
}

// 如果糕體選項為空
if($ingredient !='' && $flavor ==''){
    $sql = 'SELECT CAKE_NAME,c.CAKE_DESCRIPTION,c.CAKE_IMAGE,VOTING_NUM,c.CAKE_ID,c.CAKE_IMAGE_BLOB
    FROM INGREDIENT i 
        JOIN CAKE_INGREDIENT ci
            on i.INGREDIENT_ID = ci.INGREDIENT_ID
        JOIN CAKE c
            on ci.CAKE_ID = c.CAKE_ID
        JOIN FLAVOR f
            on c.FLAVOR_ID = f.ID
            WHERE FIND_IN_SET (i.INGREDIENT_NAME,?)
            GROUP BY CAKE_NAME,c.CAKE_DESCRIPTION,c.CAKE_IMAGE,VOTING_NUM,c.CAKE_ID,c.CAKE_IMAGE_BLOB;
    ';
    $statement = getPDO()->prepare($sql);
    $statement -> bindValue(1,$ingredient);
    $statement -> execute();
    $data = $statement->fetchAll();
//   print_r($ingredient_query = str_repeat('?,',count($ingredient).'?')
// );
echo json_encode($data);

}

// 如果兩者都有
if($ingredient !='' && $flavor !=''){
    $sql = 'SELECT CAKE_NAME,c.CAKE_DESCRIPTION,c.CAKE_IMAGE,VOTING_NUM,c.CAKE_ID,c.CAKE_IMAGE_BLOB
    FROM INGREDIENT i 
        JOIN CAKE_INGREDIENT ci
            on i.INGREDIENT_ID = ci.INGREDIENT_ID
        JOIN CAKE c
            on ci.CAKE_ID = c.CAKE_ID
        JOIN FLAVOR f
            on c.FLAVOR_ID = f.ID
            WHERE FIND_IN_SET(i.INGREDIENT_NAME,?)
        OR FIND_IN_SET (f.NAME,?)
        GROUP BY CAKE_NAME,c.CAKE_DESCRIPTION,c.CAKE_IMAGE,VOTING_NUM,c.CAKE_ID,c.CAKE_IMAGE_BLOB;
    ';
    $statement = getPDO()->prepare($sql);
    $statement -> bindValue(1,$ingredient);
    $statement -> bindValue(2,$flavor);
    $statement -> execute();
    $data = $statement->fetchAll();
    // print_r($data);
    // echo $ingredient;
    // echo "<br>";
    // echo $flavor;
    echo json_encode($data);
}

?>