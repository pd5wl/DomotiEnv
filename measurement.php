<?php
// Connect
include ('./head.html');
include ('./header.html');
include './dbconn.php';

// Run Query
try {
$sql 	= 'SELECT * FROM Measurement WHERE DevID IN (SELECT DevID FROM Measurement WHERE TimestampUTC = (SELECT MAX(TimestampUTC) FROM Measurement)) ORDER BY DevID DESC LIMIT 1';

 //$sql = 'SELECT `Measurement`.*, `Node`.* FROM `Measurement` INNER JOIN `Node` ON `Node`.`DevID` = `Measurement`.`ID` WHERE TimestampUTC = (SELECT MAX(TimestampUTC) FROM Measurement)) ORDER BY DevID DESC LIMIT 1';

$stmt 	= $pdo->prepare($sql); // Prevent MySQl injection. $stmt means statement
$stmt->execute();
}
catch(PDOException $e)
{
echo $e->getMessage();
}
?>
<!-- Tabel opmaak -->
<table cellspacing="2">
  <tbody>
    <tr>
      <th scope="col" width="80" align="left" style="background-color: beige">Node</th>
	  <th scope="col" width="80" align="left" style="background-color: beige">Temperatuur</th>
      <th scope="col" width="100" align="right" style="background-color: beige">Luchtvochtigheid</th>
      <th scope="col" width="100" align="left" style="background-color: beige">Luchtdruk</th>
      <th scope="col" width="100" align="left" style="background-color: beige">Spanning</th>
          </tr> 
<?php
while ($row = $stmt->fetch())
{
	echo '<tr><td align="center">';
	echo $row['DevOmschr'];
	echo '</td><td align="left">';
	echo $row['Temperature'];
	echo '</td><td align="left">';
	echo $row['Humidity'];
	echo '</td><td align="left">';
	echo $row['Pressure'];
	echo '</td><td align="left">';
	echo $row['Batt'];
	echo '</td></tr>';

}
?>
  </tbody>
</table>
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
