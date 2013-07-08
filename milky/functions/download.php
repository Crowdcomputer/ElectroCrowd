<?php
if (isset($_GET['fileurl'])) {
    $fileurl = $_GET['fileurl'];
    header('Content-type: application/force-download');
    header('Content-Transfer-Encoding: Binary');
    header('Content-disposition: attachment; filename='.$_GET['code'].'.mp3');
    readfile($fileurl);
}
?>
