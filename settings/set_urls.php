<?php

function url() {
    if (!isset($_GET['title']))
        include('view/home/view.php');
    else
        include('view/' . $_GET['title'] . '/view.php');
}

?>
