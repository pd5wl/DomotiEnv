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
<!-- Balkon -->
<div id="Balkon" class="reveal-modal">
	<?php
	include('balkon.php')
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