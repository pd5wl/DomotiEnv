<?php
// Connect

include './config.php';
include ('./head.html');
include ('./header.html');

try
{
	$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

}
catch (PDOException $e)
{
    echo 'Error: ' . $e->getMessage();
    exit();
}
// Show connected
//	echo '<br />';
//	echo 'Connected to ';
//	echo $servername;
//	echo ' and database ';
//	echo $dbname;
//	echo ' with user ';
//	echo $username;
//	echo '<br />';

// Run Query
$sql 	= 'SELECT * FROM `Node`';
$stmt 	= $pdo->prepare($sql); // Prevent MySQl injection. $stmt means statement
$stmt->execute();
?>
<!-- Tabel opmaak -->

<table cellspacing="2">
  <tbody>
    <tr>
      <th scope="col" width="50" align="left" style="background-color: beige">DevID</th>
      <th scope="col" width="80" align="left" style="background-color: beige">Naam</th>
      <th scope="col" width="100" align="right" style="background-color: beige">Lengtegraad</th>
      <th scope="col" width="100" align="left" style="background-color: beige">Breedtegraad</th>
      <th scope="col" width="100" align="left" style="background-color: beige">Eigenaar</th>
      <th scope="col" width="300" align="left" style="background-color: beige">Omschrijving</th>
    </tr>
    <tr>
<?php
while ($row = $stmt->fetch())
{
	echo '<td  align="center">';
	echo $row['DevID'];
	echo '</td><td align="center">';
	echo $row['DevOmschr'];
	echo '</td><td align="right">';
 	echo $row['Longitude'];
	echo '</td><td align="left">';
	echo $row['Latitude'];
	echo '</td><td align="left">';
	echo $row['Owner'];
	echo '</td><td align="left">';
	echo $row['Description'];
	echo '</td>';
	
}
?>
</tr>
  </tbody>
</table>
<?php
$date = date_create();
$tijd =  date_format($date, 'Y-m-d H:i:s');

	echo '<br />';
	echo 'Lijst gemaakt op: ';
	echo $tijd;
	echo '<br />';

// Close connection
$pdo = null;
// Show disconnect
//	echo '<br />';
//	echo 'Closed connection to MySQL';
//	echo '<br />';

include ('./footer.html');
?>
