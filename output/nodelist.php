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
      <th scope="col" class="data-node-head">Locatie</th>
      <th scope="col" class="data-value-head">Omschrijving</th>
      </tr> 
<?php
while ($row = $stmt->fetch())
{
	echo '<tr><td class="data-nodelist-col1">';
	echo $row['DevID'];
	echo '</td><td class="data-nodelist-col2">';
	echo $row['DevOmschr'];
	echo '</td><td class="data-nodelist-col3">';
	echo $row['Description'];
	echo '</td></tr>';
}
?>
  </tbody>
</table>
</div>	
<?php
// Footer
include ('../includes/footer.php');
?>
