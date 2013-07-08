<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include('milky/milky.php');
        ?>
    </head>
    <body>
        <?php
        //Подключение файлов внешнего представления:
        //------------------------------------------
        include('view/body.php');
        //------------------------------------------
        //Подключение остальных плагинов
        
        pre($_GET);
        pre($_POST);
        pre($_FILES);
        ?>
    </body>
</html>
