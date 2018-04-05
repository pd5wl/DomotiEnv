<?php
// Connect


include ('./head.html');
include ('./header.html');

include './dbconn.php';

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
$pdo = null;
// Show disconnect
	echo '<br />';
	echo 'Closed connection to MySQL';
	echo '<br />';

include ('./footer.html');
?>