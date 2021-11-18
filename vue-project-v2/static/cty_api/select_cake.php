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

echo $flavor;
if($ingredient =='' && $flavor!=''){
    $sql = 'SELECT CAKE_NAME,c.DESCRIPTION,c.IMAGE,VOTING_NUM,c.ID
FROM INGREDIENT i 
	JOIN CAKE_INGREDIENT ci
		on i.ID = ci.INGREDIENT_ID
	JOIN CAKE c
		on ci.CAKE_ID = c.ID
	JOIN FLAVOR f
		on c.FLAVOR_ID = f.ID
        WHERE FIND_IN_SET(f.NAME,?)
        GROUP BY CAKE_NAME,c.DESCRIPTION,c.IMAGE,VOTING_NUM,c.ID;
';
$statement = getPDO()->prepare($sql);
$statement -> bindValue(1,$flavor);
    $statement -> execute();
    $data = $statement->fetchAll();
    print_r($flavor);
    print_r($data);
    print_r('配料為空');
}

// 如果糕體選項為空
if($ingredient !='' && $flavor ==''){
    $sql = 'SELECT CAKE_NAME,c.DESCRIPTION,c.IMAGE,VOTING_NUM,c.ID
    FROM INGREDIENT i 
        JOIN CAKE_INGREDIENT ci
            on i.ID = ci.INGREDIENT_ID
        JOIN CAKE c
            on ci.CAKE_ID = c.ID
        JOIN FLAVOR f
            on c.FLAVOR_ID = f.ID
            WHERE FIND_IN_SET(i.NAME,?)
            GROUP BY CAKE_NAME,c.DESCRIPTION,c.IMAGE,VOTING_NUM,c.ID;
    ';
    $statement = getPDO()->prepare($sql);
    $statement -> bindValue(1,$ingredient);
    $statement -> execute();
    $data = $statement->fetchAll();
//   print_r($ingredient_query = str_repeat('?,',count($ingredient).'?')
// );
print_r($data);
print_r("---------");
  print_r("糕體為空");

}

// 如果兩者都有
if($ingredient !='' && $flavor !=''){
    $sql = 'SELECT CAKE_NAME,c.DESCRIPTION,c.IMAGE,VOTING_NUM,c.ID
    FROM INGREDIENT i 
        JOIN CAKE_INGREDIENT ci
            on i.ID = ci.INGREDIENT_ID
        JOIN CAKE c
            on ci.CAKE_ID = c.ID
        JOIN FLAVOR f
            on c.FLAVOR_ID = f.ID
            WHERE FIND_IN_SET(i.NAME,?)
        OR FIND_IN_SET(f.NAME,?)
        GROUP BY CAKE_NAME,c.DESCRIPTION,c.IMAGE,VOTING_NUM,c.ID;
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
    print_r($data);
    print_r('兩者都有');
}

?>