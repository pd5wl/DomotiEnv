<?php

// Connect
include ('../includes/head.html');
include ('../includes/header.php');
include ('../includes/dbconn.php');
?>
<div>
<p><h3>Max metingen</h3>Ooit gemeten.</p>
<p>Op het balkon is dat 
	<?php
	$nodenr = '6' ;
	include('max-nodedata.php')
	?>

</p><p>In de woonkamer is dat 
	<?php
	$nodenr = '7' ;
	include('max-nodedata.php')
	?>
</p><p>In de keuken is dat 
	<?php
	$nodenr = '8' ;
	include('max-nodedata.php')
	?>
</p>
<p><h3>Min metingen</h3>Ooit gemeten.</p>
<p>Op het balkon is dat 
	<?php
	$nodenr = '6' ;
	include('min-nodedata.php')
	?>
</p><p>In de woonkamer is dat
	<?php
	$nodenr = '7' ;
	include('min-nodedata.php')
	?>
</p><p>In de keuken is dat 
	<?php
	$nodenr = '8' ;
	include('min-nodedata.php')
	?>
</p>
</div>
<?php
// Footer
include ('../includes/footer.php');
?>
