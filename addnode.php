<?php

// Includes
include ('./head.html');
include ('./header.html');
include './dbconn.php';

?>

<!-- Formulier -->
<div id="login">
<h2>Node Toevoegen</h2>
<hr/>
<form action="" method="post">
<label>Node naam :</label>+-
<input type="text" name="DevOmschr" id="DevOmschr" required="required" placeholder="Naam"/><br /><br />
<label>Breedtegraad :</label>
<input type="text" name="Longitude" id="Longitude" placeholder="Breedtegraad"/><br/><br />
<label>Lengtegraad :</label>
<input type="text" name="Latitude" id="Latitude" placeholder="Lengtegraad"/><br/><br />
<label>Eigenaar :</label>
<input type="text" name="Owner" id="Owner" required="required" placeholder="Eigenaar"/><br/><br />
<label>Omschrijving :</label>
<input type="text" name="Description" id="Description" required="required" placeholder="Description"/><br/><br />
<input type="submit" value=" Submit " name="submit"/><br />
</form>
</div>

<?php

// Run Query
if(isset($_POST["submit"]))
{
$date = date_create();
$tijd =  date_format($date, 'Y-m-d H:i:s');
$DevOmschr = $_POST["DevOmschr"];
$Longitude = $_POST["Longitude"];
$Latitude = $_POST["Latitude"];
$Owner = $_POST["Owner"]; 
$Description = $_POST["Description"];

try {
	$statement = $pdo->prepare("INSERT INTO Node (DevOmschr, Longitude, Latitude, Owner, Description, TimestampUTC) VALUES (:DevOmschr, :Longitude, :Latitude, :Owner, :Description, :TimestampUTC)");
    $statement->execute(array(
		':DevOmschr' => $DevOmschr,
		':Longitude' => $Longitude,
		':Latitude' => $Latitude,
		':Owner' => $Owner,
		':Description' => $Description,
		':TimestampUTC' => $tijd,
 	));
}
catch(PDOException $e)
{
echo $e->getMessage();
}
} 

// Add footer
include ('footer.php');

?>