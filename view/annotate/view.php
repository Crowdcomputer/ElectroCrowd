<h2>Annotation</h2>


<?php
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
                        <textarea class="resource_annotation" row="3">
                            <?php echo $element['annotation']; ?>
                        </textarea>
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
                resources.push(resource);
                
                //add_resource('{"resource_id":"'+$(this).attr('resource_id')+'","resource_url":"'+$(this).children('td:eq(0)').children('img').attr('src')+'","resource_annotation":"'+$(this).children('td:eq(1)').children('.resource_annotation').val()+'"}');     
                //alert($(this).children('td:eq(1)').children('.resource_annotation').val());
                //$('.table').append($(this).attr('resource_id'));
            });
            CM_result(JSON.stringify(resources));
        }); 
    });
</script>