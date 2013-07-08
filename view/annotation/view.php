<h2>List of resources to annotate</h2>
<?php
global $CC_input;
if (isset($CC_input)) {
   // pre($CC_input);
    ?>
<form method="POST" action="?title=processing&function=saveAnnotations&platform=<?php echo $_GET['platform']; ?>&parent=<?php echo $_GET['parent']; ?>">    
<table class = "table table-hover table-bordered">
        <tbody>
            <?php
            foreach ($CC_input['id'] as $id) {

                $resource = getObjects('resource', 'id', $id, 'array');
                ?>
                <tr class="resource" resource_id="<?php echo $resource[0]['id']; ?>">
                    <td>
                        <input type="hidden" name="resource[]" value="<?php echo $resource[0]['id']; ?>">
                        <img class="resource_image" src="<?php echo $resource[0]['url']; ?>" />
                    </td>
                    <td>
                        <h3>Annotation</h3>
                        
                        <textarea name="annotation[]" class="resource_annotation" row="3"></textarea>
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
<input type="submit" id="finish_task" class="btn btn-primary" value="Save Annotations" />
</form>