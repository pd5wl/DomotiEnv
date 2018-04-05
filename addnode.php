<?php
// Connect

include './config.php';
include ('./head.html');
include ('./header.html');

try
{
	$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

}
catch (PDOException $e)
{
    echo 'Error: ' . $e->getMessage();
    exit();
}
// Show connected
	echo '<br />';
	echo 'Connected to ';
	echo $servername;
	echo ' and database ';
	echo $dbname;
	echo ' with user ';
	echo $username;
	echo '<br />';

// Run Query
$sql 	= 'SELECT * FROM `Node`';
$stmt 	= $pdo->prepare($sql); // Prevent MySQl injection. $stmt means statement
$stmt->execute();

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