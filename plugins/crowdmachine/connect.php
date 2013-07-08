<?php
if ($_GET['platform'] == 'mturk') {
    ?>
    <script src="plugins/crowdmachine/mturk.js"></script>
    <script>  $(document).ready(function(){
        
    });
    </script>
    <?php
} elseif ($_GET['platform'] == 'crowdcomputer') {
    ?>
    <script src="plugins/crowdmachine/crowdcomputer.js"></script>
    <script>  $(document).ready(function(){
        CM_result(JSON.stringify(connections));
    });
    </script>
    <?php
}
?>
