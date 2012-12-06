<?php
//$link = mysql_connect('localhost', 'wm22943_pavel', '512437');
$link = mysql_connect('localhost', 'root', 'root');

if (!isset($link)) {
    echo "The SQL server connection failed";
    exit(1);
} else {
    //$db = mysql_select_db('wm22943_showitme_beta');
    $db = mysql_select_db('crowdm');
    if (!isset($db)) {
        echo "The SQL server connection failed";
        exit(1);
    }
}
?>