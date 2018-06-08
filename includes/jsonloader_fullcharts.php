<?php
// Connect
include ('dbconn.php');

// Run Query
try {
 $sql = 'SELECT * FROM `Measurement` ORDER BY `TimestampUTC` DESC';
	
$stmt 	= $pdo->prepare($sql); // Prevent MySQl injection. $stmt means statement
$stmt->execute();
}
catch(PDOException $e)
{
echo $e->getMessage();
}

// Set proper HTTP response headers
header( 'Content-Type: application/json' );

// Output data
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
// Close DB connection
try {
	$pdo = null;
}

catch(PDOException $e)
{
	echo $e->getMessage();
}
?>
