<?php
include_plugin('plupload');
?>
<script>
    myArray = [];
</script>

<h2>Upload resource</h2>


<div id="container">

    <div id="filelist">No runtime found.</div>

    <br />

    <button id="pickfiles" class="btn">Select files</button>

    <button id="uploadfiles" class="btn btn-primary">Upload files</button>
    <button id="finish_task" onclick="CM_result(JSON.stringify(resources));" class="btn btn-success">Finish</button>
</div>

