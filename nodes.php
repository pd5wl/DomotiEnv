<?php
// Connect
include('etc/config.inc');
include('includes/dbconn.php');

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
	$statement = $pdo->prepare("INSERT INTO Measurement (TimestampUTC, DevID, Temperature, Humidity, Pressure, Batt) VALUES (:TimestampUTC, :DevID, :Temperature, :Humidity, :Pressure, :Batt)");	
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

// Close DB connection
try {
	$pdo = null;
}

catch(PDOException $e)
{
	echo $e->getMessage();
}

?>