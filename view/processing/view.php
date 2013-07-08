<h2>...processing...</h2>
<?php
include_plugin('crowdmachine');
?>
<form>
    <input type="submit" value='Now we send data to other places'>
</form>

<script>
    $(document).ready(function(){
        CM_result(JSON.stringify(connections));
    });
</script>
<!--button class="btn" onclick="CM_result(JSON.stringify(connections));">send data</button-->
