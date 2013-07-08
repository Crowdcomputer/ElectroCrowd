<h2>List of resources to categorize</h2>
<?php
global $CC_input;
if (isset($CC_input)) {
    $category_list=getObjects('category','','','array');
    
    ?>
<form method="POST" action="?title=processing&function=saveCategories&platform=<?php echo $_GET['platform']; ?>&parent=<?php echo $_GET['parent']; ?>">    
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
                        <h3>Category</h3>
                        <select name="category[]">
                            <?php foreach($category_list as $category){ 
                                ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
                            <?php
                            }
?>
                        </select>
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
<input type="submit" id="finish_task" class="btn btn-primary" value="Save Categories" />
</form>