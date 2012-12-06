<h2>Categorization</h2>
<?php
$category_list = ['Abstract', 'Animals', 'Black and white', 'Celebrities', 'City and Architecture', 'Commercial', 'Concert', 'Family'
    , 'Fashion', 'Film', 'Fine art', 'Food', 'Journalism', 'Landscapes', 'Macro', 'Nature', 'Nude', 'People', 'Performing', 'Sport'
    , 'Still Life', 'Street', 'Transportation', 'Travel', 'Underwater', 'Urban Exploration', 'Wedding', 'Uncategorized'];

if (isset($GLOBALS['input'])) {
    ?>
    <table class = "table table-hover table-bordered">
        <tbody>
            <?php
            foreach ($GLOBALS['input'] as $element) {
                ?>
                <tr class="resource" resource_id="<?php echo $element['id']; ?>">
                    <td>
                        <img class="resource_image" src="<?php echo $element['url']; ?>" />
                    </td>
                    <td>

                        Category:
                        <select class="resource_category">
                            <?php
                            foreach ($category_list as $category) {
                                $s = '';
                                if ($category == $element['category'])
                                    $s = ' selected ';
                                echo '<option ' . $s . ' >' . $category . '</option>';
                            }
                            ?>
                        </select>
                        <br/>
                        Annotation:
                        <textarea class="resource_annotation" row="3">
                            <?php echo $element['annotation']; ?>
                        </textarea>
                        <br/>Information received about this element:
                        <?php
                        pre($element);
                        ?>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <?php
} else {
    ?>
    <div class="alert">
        <strong>Warning</strong>&nbsp;<span>The input information has not been provided.</span>
    </div>
    <?php
}
?>

<button id="finish_task" class="btn btn-success">Finish</button>

<script>
    $(document).ready(function(){
        $('#finish_task').click(function(){
            var container=$('.resource');
            var resources=new Array();
            console.log(container);
            $.each(container, function() { 
                var resource=new Object();
                resource.id=$(this).attr('resource_id');
                resource.url=$(this).children('td:eq(0)').children('img').attr('src');
                resource.annotation=$(this).children('td:eq(1)').children('.resource_annotation').val();
                resource.category=$(this).children('td:eq(1)').children('.resource_category').val();
                resources.push(resource);
            });
            CM_result(JSON.stringify(resources));
        }); 
    });
</script>