<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: *");
  header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
  function getPDO(){

    $db_host = "127.0.0.1";
    // $db_host = "localhost";
    $db_user = "root";
    $db_pass = "password";
    // $db_user = "tibamefe_since2021";
    // $db_pass = "vwRBSb.j&K#E";
    $db_select = "A_cake";

    $dsn = "mysql:host=".$db_host.";dbname=".$db_select;

    return $pdo = new PDO($dsn, $db_user, $db_pass);

  }

?>