<?php

//Реквизиты подключения к рабочей (хостинг) и локальной БД
//локальная БД- БД при проверке на локальной машине (не на хостинге)
if (getenv("VCAP_SERVICES")) {
    $services_json = json_decode(getenv("VCAP_SERVICES"), true);
    $mysql_config = $services_json["mysql-5.1"][0]["credentials"];
    $username = $mysql_config["username"];
    $password = $mysql_config["password"];
    $hostname = $mysql_config["hostname"];
    $port = $mysql_config["port"];
    $db = $mysql_config["name"];
    $link = mysql_connect("$hostname:$port", $username, $password);
    mysql_set_charset("utf8");
    $db_selected = mysql_select_db($db, $link);
} elseif ($_SERVER['HTTP_HOST'] == 'localhost') {

//local DataBase server
    $link = mysql_connect($local_host, $local_username, $local_password);
    mysql_set_charset("utf8");
    $db = mysql_select_db($local_db);
} else {
    $link = mysql_connect($production_host, $production_username, $production_password);
    mysql_set_charset("utf8");
    $db = mysql_select_db($production_db);
}
//production DataBase server


if (!isset($link)) {
    echo "The SQL server connection failed";
    exit(1);
}
?>
