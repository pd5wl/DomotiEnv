<?php
// Connect


include ('../includes/head.html');
include ('../includes/header.php');

include '../includes/dbconn.php';
?>
<div class="data">
<?php
// Show connected
	echo '<br />';
	echo 'Connected to ';
	echo $servername;
	echo ' and database ';
	echo $dbname;
	echo ' with user ';
	echo $username;
	echo '<br />';

$date = date_create();
$tijd =  date_format($date, 'Y-m-d H:i:s');

	echo '<br />';
	echo 'Verbinding gemaakt op: ';
	echo $tijd;
	echo '<br />';

// Close connection
try {
	$pdo = null;
}

catch(PDOException $e)
{
	echo $e->getMessage();
}

// Show disconnect
	echo '<br />';
	echo 'Closed connection to MySQL';
	echo '<br />';
?>
</div>
<?php
include ('../includes/footer.php');
?>