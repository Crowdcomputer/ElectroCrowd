<script>
    //global variables;
    //------------------------------------------------------------------------------------
    var ajax_path='milky/functions.php?ajax=true'; //Ajax functions file path
    var plugins_path='plugins/';
    
    var indexurl='<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>';
    ///------------------------------------------------------------------------------------
    var current = new Array();
    var resources=new Array();
    var annotations=new Array();
    var connections=new Array();
    current['bucket']= '<?php global $bucket; echo $bucket; ?>';
</script>