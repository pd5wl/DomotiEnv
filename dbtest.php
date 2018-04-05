<?php

// Includes
include './config.php';
include ('./head.html');
include ('./header.html');

// Connect

try
{
	$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

}
catch (PDOException $e)
{
    echo 'Error: ' . $e->getMessage();
    exit();
}
	echo '<br />';
	echo 'Connected to ';
	echo $servername;
	echo ' and database ';
	echo $dbname;
	echo ' with user ';
	echo $username;
	echo '<br />';

// Run Query
$sql 	= 'SELECT * FROM Measurement';
$stmt 	= $pdo->prepare($sql); // Prevent MySQl injection. $stmt means statement
$stmt->execute();
while ($row = $stmt->fetch())
{
	echo '<br />';
	echo $row['DevID'];
	echo ' - ';
	echo $row['Batt'];
	echo 'V - ';
	echo $row['Humidity'];
	echo '% - ';
	echo $row['Pressure'];
	echo 'mBar.';
	echo '<br />';
	
}



$date = date_create();
$tijd =  date_format($date, 'Y-m-d H:i:s');
echo $tijd;

// Close connection
$pdo = null;
	echo '<br />';
	echo 'Closed connection to MySQL';
	echo '<br />';

include ('./footer.html');
?>
