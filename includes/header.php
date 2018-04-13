<div class="colkab-12 rTable">
<div class="colkab-12 rTableRow">
	<div class="colkab-12 rTableCell rTableCenterText"><h1>Domotica Efficiente</h1><!--Thanx Karen --></div>
</div>	
</div>	
<div class="colkab-12 rTable">
<div class="colkab-12 rTableRow">
	<div class="colkab-2 rTableCell rTableCenterText"><a href="../output/nodelist.php">Sensoren</a></div>		
	<div class="colkab-2 rTableCell rTableCenterText"><a href="../output/floorplan.php">Floorplan</a></div>		
	<div class="colkab-2 rTableCell rTableCenterText"><a href="../charts/charts.php">Grafieken</a></div>		
	<div class="colkab-2 rTableCell rTableCenterText"><a href="../output/measurement.php">Laatste metingen</a></div>		
	<div class="colkab-2 rTableCell rTableCenterText">&nbsp;</div>
	<div class="colkab-2 rTableCell rTableCenterText">
	<?php
		  include '../etc/config.inc';
		  if ($setup == 1) { 
			  echo '<a href="../setup/setup.php">Setup</a>';
		  }
		  else {
			  echo 'Setup - Disabled';
		  }			
		?>	
	</div>
</div>		
</div>		
<div class="colkab-12 rTable">
<div class="colkab-12 rTableRow">
	<div class="colkab-12 rTableCell"><hr/></div>
</div>	
</div>	

