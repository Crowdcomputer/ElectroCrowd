<h2>List of annotations to validate</h2>
<p class="lead">Check and correct annotations and categories</p>

<?php
global $CC_input;
//pre($CC_input);
if (isset($CC_input)) {
    ?>
    <form method="POST" action="?title=processing&function=saveValidations&platform=<?php echo $_GET['platform']; ?>&parent=<?php echo $_GET['parent']; ?>">    
        <table class = "table table-hover table-bordered">
            <tbody>
                <?php
                $category_list=getObjects('category','','','array');
                //pre($category_list);
                $i = 0;
                foreach ($CC_input['resource_id'] as $id) {
                    
                    $resource = getObjects('resource', 'id', $id, 'array');
                    if (isset($resource[0])) {
                        ?>
                        <tr class="resource" resource_id="<?php echo $resource[0]['id']; ?>">
                            <td>
                                <input type="hidden" name="resource[]" value="<?php echo $resource[0]['id']; ?>">
                                <img class="resource_image" src="<?php echo $resource[0]['url']; ?>" />
                            </td>
                            <td>
                                <h5>category</h5>
                                <select name="category[]">
                                    <?php
                                $category_resource=getObjects('category_resource','id',$CC_input['category_resource_id'][$i],'array');
                                $cat_id=$category_resource[0]['category_id'];
                                foreach($category_list as $category){
                                    ?>
                                     <option <?php if ($category['id']==$cat_id) echo " selected "; ?> value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
                                    <?php
                                }                                               
                                ?>
                                </select>
                                <input type="hidden" name="category_resource_id[]" value="<?php echo $CC_input['category_resource_id'][$i]; ?>">
                                <h5>annotation</h5>
                                
                                <?php
                                $annotation_resource=getObjects('annotation_resource','id',$CC_input['annotation_resource_id'][$i],'array');
                                $annotation=getObjects('annotation','id',$annotation_resource[0]['annotation_id'],'array');
                                ?>
                                <input type="hidden" name="annotation_id[]" value="<?php echo $annotation[0]['id']; ?>">
                                <textarea name="annotation[]" class="resource_annotation" row="3"><?php echo $annotation[0]['title']; ?></textarea>
                            </td>
                            <?php
                        
                            
                        }
                        $i++;
                    }
                    ?>
            </tbody>
        </table>
        <input type="submit" id="finish_task" class="btn btn-primary" value="Annotations & Categories are corrected and verified" />
    </form>

    <?php
} else {
    ?>
    <div class="alert">
        <strong>Warning</strong>&nbsp;<span>The input information has not been provided.</span>
    </div>
    <?php
}
?>
