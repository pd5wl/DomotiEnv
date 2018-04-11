<?php
// Connect
include ('./head.html');
include ('./header.html');
include './dbconn.php';

// Run Query
try {
//$sql 	= 'SELECT * FROM Measurement WHERE DevID IN (SELECT DevID FROM Measurement WHERE TimestampUTC = (SELECT MAX(TimestampUTC) FROM Measurement)) ORDER BY DevID DESC LIMIT 1';

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
?>
<!-- Tabel opmaak -->
<div class="data">
<table class="data-table">
  <tbody>
    <tr>
      <th scope="col" class="data-node-head">Node</th>
	  <th scope="col" class="data-value-head">Temperatuur</th>
      <th scope="col" class="data-value-head">Luchtvocht</th>
      <th scope="col" class="data-value-head">Druk</th>
      <th scope="col" class="data-value-head">Spanning</th>
          </tr> 
<?php
while ($row = $stmt->fetch())
{
	echo '<tr><td class="data-node">';
	echo $row['DevOmschr'];
	echo '</td><td class="data-value">';
	echo $row['Temperature'];
	echo '&deg;C';
	echo '</td><td class="data-value">';
	echo $row['Humidity'];
	echo '%';
	echo '</td><td class="data-value">';
	echo $row['Pressure'];
	echo 'mbar';
	echo '</td><td class="data-value">';
	echo $row['Batt'];
	echo 'V';
	echo '</td></tr>';

}
?>
  </tbody>
</table>
</div>	
<?php
$date = date_create();
$tijd =  date_format($date, 'Y-m-d H:i:s');

	echo '<br />';
	echo 'Lijst gemaakt op: ';
	echo $tijd;
	echo '<br />';

// Footer
include ('footer.php');
?>
