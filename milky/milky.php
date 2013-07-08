
<?php

//----------------------------------------------------------
//Milky - A simplified PHP Framework
//
//GitHib: https://github.com/pavelk2/Milky
//Author: Pavel Kucherbaev http://kucherbaev.com
//----------------------------------------------------------
//Файл подключение функционала, плагинов и файла работы с url
//Подключение в head требуемый javascript и css
include('milky/initial-js-css-connection.php');
include('milky/functions.php');
//Подключение файла метаданных
include('view/meta.php');



function url() {
    if (!isset($_GET['title']))
        include('view/home/view.php');
    else
    if (file_exists('view/' . $_GET['title'] . '/view.php'))
        include('view/' . $_GET['title'] . '/view.php');
    else
        include('view/404/view.php');
}

function include_plugin($name, $type = 'external') {
    if ($type == 'external')
        $root = 'plugins/';
    else
        $root = 'milky/plugins/';

    include($root . $name . '/connect.php');
}

?>
