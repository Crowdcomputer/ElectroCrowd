<h2>Bucket list</h2>

<form method="POST" action="processing&function=createBucket">
    <input type="text" placeholder='new bucket name' name="bucket_title" value=''/>
    <input type="text" placeholder='new bucket parent' name="bucket_parent" value=''/>
    <input type="submit" value="createBucket" name="save_bucket" class="btn btn-primary">
</form>
<table class="table table-hover">
    <?php
    $list = getObjects('bucket', '', '', 'array');
    if (count($list) > 0)
        foreach ($list as $bucket) {
            ?>
            <tr>
                <td><a href="upload&bucket=<?php echo $bucket['id'];?>"><?php echo $bucket['title']; ?></a></td>
            </tr>

        <?php }
    ?>
</table>