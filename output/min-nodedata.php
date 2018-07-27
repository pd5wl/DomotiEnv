<?php
try { $sql = 'SELECT TRUNCATE(Temperature,2),MAX(TimestampUTC) FROM Measurement WHERE Temperature = (SELECT MIN(Temperature) FROM Measurement WHERE DevID = '.$nodenr.' ) limit 1';	
$stmt 	= $pdo->prepare($sql); // Prevent MySQl injection. $stmt means statement
$stmt->execute();
}
catch(PDOException $e)
{
echo $e->getMessage();
}
while ($row = $stmt->fetch())
{
	echo $row['TRUNCATE(Temperature,2)'];
	echo '&deg;C ';
	echo 'op ';
	$date = date_create($row['MAX(TimestampUTC)']);
    echo date_format($date, 'l j F Y ');
	
}
?>
