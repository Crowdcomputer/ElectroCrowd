<?php
if (isset($_POST['function']))
    if ($_POST['function'] == 'getObjects') {
        echo getObjects($_POST['object'], $_POST['parameter'], $_POST['value']);
    } elseif ($_POST['function'] == 'getChildren') {
        echo getChildren($_POST['children'], $_POST['parent'], $_POST['parent_id']);
    }

if ($_GET['function'] == 'upload') {
    include 'controller/functions/upload.php';
    upload_file();
}
if ($_GET['function'] == 'createBucket') {
    $par = array('title', 'parent');
    //pre($_POST);
    $val = array($_POST['bucket_title'], ['bucket_parent']);
    $id = insertObject('bucket', $par, $val);
    ?>
    <script>
        window.location ='bucket&bucket=<?php echo $id; ?>';
    </script>
    <?php
}
if ($_GET['function'] == 'saveValidations') {
    $i = 0;
    if (count($_POST['resource']) > 0) {
        foreach ($_POST['resource'] as $value) {
            $annotation_title = scv_esc($_POST['annotation'][$i]);
            $annotation_id = intval($_POST['annotation_id'][$i]);
            mysql_query('update annotation set title="' . $title . '" where id=' . $annotation_id);
            $category_resource_id = intval($_POST['category_resource_id'][$i]);
            $category_id = intval($_POST['category'][$i]);
            mysql_query('update category_resource set category_id=' . $category_id . ' where id=' . $category_resource_id);
            //pre($connection);
            $i++;
        }
    }
    //$ = insertObject('bucket', $par, $val);
    ?>

    <?php
}

if ($_GET['function'] == 'uploadPicture') {
    // Проверяем загружен ли файл
    if (is_uploaded_file($_FILES["filename"]["tmp_name"])) {
        $targetDir = 'static/files/';
        // Если файл загружен успешно, перемещаем его
        // из временной директории в конечную

        $fileName = get_rand_id(20);
        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        move_uploaded_file($_FILES["filename"]["tmp_name"], $filePath);

        $par = array('title', 'url');
        $val = array($fileName, $targetDir . $fileName);
        global $bucket;
        $id = insertObject('resource', $par, $val);
        $par_link = array('resource_id', 'bucket_id');
        $val_link = array($id, $bucket);
        insertObject('resource_bucket', $par_link, $val_link);
        ?>
        <script>
            var connection = new Object();
            connection.id = <?php echo $id; ?>;
            connections.push(connection);
            console.log(connections);
        </script>
        <?php
    } else {
        echo("error");
    }
    //$ = insertObject('bucket', $par, $val);
    ?>
    <?php
}
if ($_GET['function'] == 'saveAnnotations') {
    $i = 0;
    if (count($_POST['annotation']) > 0) {
        foreach ($_POST['annotation'] as $value) {
            if (trim($value) != '') {
                $par = array('title');
                $val = array(trim($value));
                $annotation = insertObject('annotation', $par, $val);
                //pre($annotation);
                $resource = intval($_POST['resource'][$i]);
                $par = array('resource_id', 'annotation_id');
                $val = array($resource, $annotation);
                $connection = insertObject('annotation_resource', $par, $val);
                //pre($connection);
                ?>
                <script>
                    var connection = new Object();
                    connection.resource_id = <?php echo $resource; ?>;
                    connection.annotation_resource_id = <?php echo $connection; ?>;
                    connections.push(connection);
                    console.log('-------'+connections);
                </script>
                <?php
            }
            $i++;
        }
    }
    //$ = insertObject('bucket', $par, $val);
    ?>
    <?php
}
if ($_GET['function'] == 'saveCategories') {
    $i = 0;
    if (count($_POST['category']) > 0) {
        foreach ($_POST['category'] as $value) {
            if (intval($value) > 0) {
                $resource = intval($_POST['resource'][$i]);
                $par = array('resource_id', 'category_id');
                $val = array($resource, intval($value));
                $connection = insertObject('category_resource', $par, $val);
                //pre($connection);
                ?>
                <script>
                    var connection = new Object();
                    connection.resource_id = <?php echo $resource; ?>;
                    connection.category_resource_id = <?php echo $connection; ?>;
                    connections.push(connection);
                    console.log(connections);
                </script>
                <?php
            }
            $i++;
        }
    }
    ?>
    <?php
}
if ($_GET['function'] == 'saveValidations') {
    //pre($_POST);
    $i = 0;
    if (count($_POST['resource']) > 0) {
        foreach ($_POST['resource'] as $value) {
            if (count($_POST['annotation_' . $value]) > 0) {
                mysql_query('update annotation set validated=1 where id=' . intval($_POST['annotation_' . $value][0]));
                ?>
                <script>
                    var connection = new Object();
                    connection.id = <?php echo $_POST['annotation_' . $value][0]; ?>;
                    connections.push(connection);
                    console.log(connections);
                </script>
                <?php
            }
        }
    }
}
?>
