<h2>Balkon</h2>
<table width="60%" border="0" align="center">
  <tbody>
<?php
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

WHERE m2.DevID = '.$nodenr.'
GROUP BY m1.DevID

';
	
$stmt 	= $pdo->prepare($sql); // Prevent MySQl injection. $stmt means statement
$stmt->execute();
}
catch(PDOException $e)
{
echo $e->getMessage();
}

while ($row = $stmt->fetch())
{
	echo '<tr><td align="left">';
	echo 'Temperatuur';
    echo '</td><td align="right">';
	echo $row['Temperature'];
	echo '&deg;C';
	echo '</td></tr>';
	echo '<tr><td align="left">';
	echo 'Luchtvochtigheid';
	echo '</td><td align="right">';
	echo $row['Humidity'];
	echo '%';
	echo '</td></tr>';
	echo '<tr><td align="left">';
	echo 'Luchtdruk';
	echo '</td><td align="right">';
	echo $row['Pressure'];
	echo 'mbar';
	echo '</td></tr>';
	echo '<tr><td align="left">';
	echo 'Spanning';
	echo '</td><td align="right">';
	echo $row['Batt'];
	echo 'V';
	echo '</td></tr>';
	echo '<tr><td align="left">';
	echo 'Tijd stip meting';
	echo '</td><td align="right">';
	echo $row['TimestampUTC'];
	echo '</td></tr>';

}
?>

  </tbody>
</table>