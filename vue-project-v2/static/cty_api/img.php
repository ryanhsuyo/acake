<?php
include "connection.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
// $image =$_FILES["img"];



$fileName = $_FILES["img"]["name"];    //檔案名稱含副檔名        
        $filePath_Temp = $_FILES["img"]["tmp_name"];   //Server上的暫存檔路徑含檔名        
        $fileType = $_FILES["img"]["type"];    //檔案種類        
        $fileSize = $_FILES["img"]["size"];    //檔案尺寸
        //Web根目錄真實路徑
        $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
        //檔案最終存放位置
        $filePath = $ServerRoot."/static/employee_images/".$fileName;
        move_uploaded_file($filePath_Temp, $filePath);

$sql = "UPDATE `A_cake`.`EMPLOYEE` SET `IMG_BLOB` = ? WHERE (`ID` = ?);";

$statement = getPDO()->prepare($sql);
       $statement -> bindValue(1,$_POST["test"]);
       $statement -> bindValue(2,($_POST["index"]));
       $statement -> execute();

print_r($_POST["index"]) ;
?>