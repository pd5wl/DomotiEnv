<?php
// Connect
include ('dbconn.php');

// Run Query
try {
 $sql = 'SELECT 
    m1.DevID AS DevID, 
    m1.TimestampUTC AS TimestampUTC, 
    m1.Temperature AS Temperature,
    m1.Humidity AS Humidity,
    m1.Pressure AS Pressure,
    m1.Batt AS Batt,
    n.DevOmschr AS DevOmschr
    
FROM
    Measurement m1 
INNER JOIN
    (
    SELECT
        mi.DevID AS DevID,
        MAX(mi.TimestampUTC) AS maxtimestamp
    FROM
        Measurement mi
    GROUP BY
        mi.DevID
) m2
ON
    (
        m1.TimestampUTC = m2.maxtimestamp AND m1.DevID = m2.DevID
    ) 
INNER JOIN
    Node n
ON
    n.DevID = m1.DevID
GROUP BY m1.DevID';
	
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
