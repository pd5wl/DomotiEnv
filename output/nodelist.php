<?php

// Connect
include ('../includes/head.html');
include ('../includes/header.php');
include '../includes/dbconn.php';

// Run Query
try {
$sql 	= 'SELECT * FROM `Node`';
$stmt 	= $pdo->prepare($sql); // Prevent MySQl injection. $stmt means statement
$stmt->execute();
	} catch(PDOException $e) {
         echo '<br />';
	  echo $e->getMessage();
         echo '<br />';
    }
?>
<!-- Tabel opmaak -->
<div class="data">
<table class="data-table">
  <tbody>
    <tr>
      <th scope="col" class="data-node-head">DevID</th>
      <th scope="col" class="data-node-head">Naam</th>
      <th scope="col" class="data-value-head">Eigenaar</th>
      <th scope="col" class="data-value-head">Omschrijving</th>
      <th scope="col" class="data-value-head">Breedtegraad</th>
      <th scope="col" class="data-value-head">Lengtegraad</th>
	  </tr> 
<?php
while ($row = $stmt->fetch())
{
	echo '<tr><td class="data-node">';
	echo $row['DevID'];
	echo '</td><td class="data-node">';
	echo $row['DevOmschr'];
	echo '</td><td class="data-value">';
	echo $row['Owner'];
	echo '</td><td class="data-value">';
	echo $row['Description'];
	echo '</td><td class="data-value">';
 	echo $row['Longitude'];
	echo '</td><td class="data-value">';
	echo $row['Latitude'];
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
include ('../includes/footer.php');
?>
