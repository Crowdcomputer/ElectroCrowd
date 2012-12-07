<?php

if (isset($_POST['data'])) {
    pre($_POST['data']);
    $query = 'insert into `Resource` (`data`) values ("' . scv_esc($_POST['data']) . '")';
    mysql_query($query);
}
?>
