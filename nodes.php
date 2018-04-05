<?php

    $entityBody = file_get_contents('php://input');
    $logfile = './Nodes.log';
    $content = "$entityBody\r\n";
    file_put_contents($logfile, $content, FILE_APPEND | LOCK_EX);


// Connect

include './config.php';
try {
	$link = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    echo 'Error: ' . $e->getMessage();
    exit();
}
// Check DB connection status
//	echo '<br />';
//	echo 'Connected to ';
//	echo $servername;
//	echo ' and database ';
//	echo $dbname;
//	echo ' with user ';
//	echo $username;
//	echo '<br />';

// Retrieve data from url

if(!empty($_GET["temperature"]) && !empty($_GET["humidity"]) && !empty($_GET["voltage"]) && !empty($_GET["dev_id"] && !empty($_GET["pressure"])));

$dev_id = $_GET["dev_id"];
$temperature = $_GET["temperature"];
$humidity = $_GET["humidity"];
$pressure = $_GET["pressure"];
$voltage = $_GET["voltage"];
date_default_timezone_set('Europe/Amsterdam');
$date = date_create();
$tijd =  date_format($date, 'Y-m-d H:i:s');

// Insert data in DB

try {
	$statement = $link->prepare("INSERT INTO Measurement (TimestampUTC, DevID, Temperature, Humidity, Pressure, Batt) VALUES (:TimestampUTC, :DevID, :Temperature, :Humidity, :Pressure, :Batt)");	
	$statement->execute(array(
		':TimestampUTC' => $tijd,
		':DevID' => $dev_id,
		':Temperature' => $temperature,
		':Humidity' => $humidity,
		':Pressure' => $pressure,
		':Batt' => $voltage,
 	));
	} catch(PDOException $e) {
         echo '<br />';
	  echo $e->getMessage();
         echo '<br />';
    }
$result = $statement->execute();
if ($result = 1) {
	echo '<br />';
	echo 'Succes';
	echo '<br />';
} else {
	echo '<br />';
	echo 'Failure';
	echo '<br />';
}
// tijd stip
// echo '<br />';
// echo $tijd;
// echo '<br />';

// Close connection
$pdo = null;
// Show connectoin closed
//	echo '<br />';
//	echo 'Closed connection to MariaDB';
//	echo '<br />';
?>