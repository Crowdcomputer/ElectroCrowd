<?php

//----------------------------------------------------------
//Отображение ошибок (можно убрать при отсутствии необходимости)
//ini_set("display_errors", 1);
//error_reporting(E_ALL);
//DataBase connection properties:
//
//Uncomment if you use the MySQL database:
$database_connect = true;
//local_database
//----------------------------------------------------------
$local_host = 'localhost';
$local_username = 'root';
$local_password = 'root';
$local_db = 'electrocrowd';
//----------------------------------------------------------
//
//production_database
//----------------------------------------------------------
$production_host = 'localhost';
$production_username = 'Pavel';
$production_password = 'vnrcwpxeg3536';
$production_db = 'Pavel_electrocrowd';
//----------------------------------------------------------
$indexurl = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$bucket = $_SESSION['bucket'];
if (isset($_GET['bucket']))
    $bucket = intval($_GET['bucket']);
$_SESSION['bucket'] = $bucket;
//-----------------------------------------------------------
if (count(($_POST))>0)
    $CC_input = $_POST;
?>
