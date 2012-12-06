<?php

if (isset($_POST['data']) and ($_POST['data'] != '')) {
    //echo $_POST['data'];
    $_POST['data'] = (str_replace('\"', '"', $_POST['data']));
    $GLOBALS['input'] = json_decode($_POST['data'], TRUE);
    // pre($GLOBALS['input']);
}
?>
