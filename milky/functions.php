<?php
if (isset($_GET['ajax']))
    if ($_GET['ajax']) {
        session_start();
        chdir('../');
    }
//connect data_base
include('settings/global.php');
if (!isset($_GET['ajax']))
    include('settings/global_js.php');
if ($database_connect)
    include('milky/database.php');

//connect general files
include('milky/functions/scaven.php');
include('milky/functions/general.php');
//connect database_integration files
include('milky/functions/CRUD.php');
include('milky/functions/complex_query.php');

//connect custom files
include('controller/functions.php');
?>
