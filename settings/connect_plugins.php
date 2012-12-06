<?php
function include_plugin($name) {
    $root = 'plugins/';
    include($root . $name . '/connect.php');
}
?>
