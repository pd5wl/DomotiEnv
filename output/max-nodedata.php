<?php
try { $sql = 'SELECT TRUNCATE(Temperature,1),MAX(TimestampUTC) FROM Measurement WHERE Temperature = (SELECT MAX(Temperature) FROM Measurement WHERE DevID = '.$nodenr.' ) limit 1';
$stmt 	= $pdo->prepare($sql); // Prevent MySQl injection. $stmt means statement
$stmt->execute();
}
catch(PDOException $e)
{
echo $e->getMessage();
}
while ($row = $stmt->fetch())
{
	echo 'Temperatuur : ';
	echo $row['TRUNCATE(Temperature,1)'];
	echo '&deg;C';
	echo '<br/>';
	echo 'Tijd stip meting : ';
	echo $row['MAX(TimestampUTC)'];
}
?>
