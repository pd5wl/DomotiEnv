<?php
// Connect
include ('../includes/head.html');
include ('../includes/header.php');
include ('../includes/dbconn.php');
?>
<div class="data">
<div class="interactive-image"><img src="../images/plesmanlaan382.png" /> 
	<a class="interactive-point" style="left: 47%; top: 7.5%;" data-reveal-id="Balkon">+</a> 
	<a class="interactive-point" style="left: 31.8%; top: 49.5%;" data-reveal-id="Woonkamer">+</a> 
	<a class="interactive-point" style="left: 65%; top: 85%;" data-reveal-id="Keuken">+</a> 
	<a class="interactive-point" style="left: 40.8%; top: 56%;" data-reveal-id="Slaapkamer">+</a> 
	<a class="interactive-point" style="left: 68.5%; top: 54%;" data-reveal-id="Badkamer">+</a> 
	<a class="interactive-point" style="left: 45%; top: 85%;" data-reveal-id="Hal">+</a> 
	<a class="interactive-point" style="left: 52%; top: 54.5%;" data-reveal-id="Gang">+</a> 
	<a class="interactive-point" style="left: 51%; top: 86.5%;" data-reveal-id="Meterkast">+</a> 
	</div>
</div>
<!-- PRODUCT -->
<div id="Balkon" class="reveal-modal"><h2>Balkon</h2>

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
GROUP BY m1.DevID';
	
$stmt 	= $pdo->prepare($sql); // Prevent MySQl injection. $stmt means statement
$stmt->execute();
}
catch(PDOException $e)
{
echo $e->getMessage();
}

while ($row = $stmt->fetch())
{
	echo '<br />Temperatuur:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo $row['Temperature'];
	echo '&deg;C';
	echo '<br />Luchtvochtigheid:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo $row['Humidity'];
	echo '%';
	echo '<br />Luchtdruk:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo $row['Pressure'];
	echo 'mbar';
	echo '<br />Spanning:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo $row['Batt'];
	echo 'V';
	echo '<br />Tijd stip meting:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo $row['TimestampUTC'];
	echo '<br />';

}
?>	
<a class="close-reveal-modal">&times;</a></div>
<!-- PRODUCT -->
<div id="Woonkamer" class="reveal-modal">Woonkamer<a class="close-reveal-modal">&times;</a></div>
<!-- PRODUCT -->
<div id="Keuken" class="reveal-modal">Keuken<a class="close-reveal-modal">&times;</a></div>
<!-- PRODUCT -->
<div id="Slaapkamer" class="reveal-modal">Slaapkamer<a class="close-reveal-modal">&times;</a></div>
<!-- PRODUCT -->
<div id="Hal" class="reveal-modal">Hal<a class="close-reveal-modal">&times;</a></div>
<!-- PRODUCT -->
<div id="Gang" class="reveal-modal">Gang<a class="close-reveal-modal">&times;</a></div>
<!-- PRODUCT -->
<div id="Meterkast" class="reveal-modal">Meterkast<a class="close-reveal-modal">&times;</a></div>
<!-- PRODUCT -->
<div id="Badkamer" class="reveal-modal">Badkamer<a class="close-reveal-modal">&times;</a></div>
<?php
// Footer
include ('../includes/footer.php');
?>