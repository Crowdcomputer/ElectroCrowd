<h2>Upload</h2>
<?php
global $bucket;
if ($bucket) {
    //include_plugin('plupload');
    ?>
    <script>
        myArray = [];
    </script>

    <div id="container">
       
        <form method="POST" action="?title=processing&function=uploadPicture&workerId=<?php echo $_GET['workerId']; ?>&assignmentId=<?php echo $_GET['?assignmentId']; ?>&hitId=<?php echo $_GET['hitId']; ?>&bucket=<?php echo $bucket; ?>&platform=<?php echo $_GET['platform']; ?>&parent=<?php echo $_GET['parent']; ?>" enctype="multipart/form-data"> 
            <input type="file" name="filename" id="filename" /> 
            <input type="submit" value="Save">
        </form>
        <!--div id="filelist">No runtime found.</div>
        <br />
        <button id="pickfiles" class="btn">Select files</button>
        <button id="uploadfiles" class="btn btn-primary">Upload files</button>
        <button id="finish_task" onclick="CM_result(JSON.stringify(resources));" class="btn btn-success">Finish</button-->
    </div>
    <?php
} else {
    ?>
    <h1>The bucket id is not given via http parameter</h1>
    <?php
}
?>