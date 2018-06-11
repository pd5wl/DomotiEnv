<?php
// Connect
include ('../includes/head.html');
include ('../includes/header.php');
include ('../includes/dbconn.php');
?>
<!--<script>
    $(document).ready(function(){
        setInterval(function() {
            $("#DataDiv").load("floorplandata.php");
        }, 10000);
    });

</script>-->
<div id = "DataDiv">
<?php include ('floorplandata.php'); ?>
</div>	
<?php
// Footer
include ('../includes/footer.php');
?>