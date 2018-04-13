<div class="colkab-12 rTable">
<div class="colkab-12 rTableRow">
	<div class="colkab-12 rTableCell rTableCenterText"><h1>Domotica Efficiente</h1><!--Thanx Karen --></div>
</div>	
</div>	
<div class="colkab-12 rTable">
<div class="colkab-12 rTableRow">
	<div class="colkab-2 rTableCell rTableCenterText"><a href="../output/nodelist.php">Node List</a></div>		
	<div class="colkab-2 rTableCell rTableCenterText">	<?php
		  include '../etc/config.inc';
		  if ($setup == 1) { 
			  echo '<a href="addnode.php">Add Node</a>';
		  }
		  else {
			  echo 'Add Node - Disabled';
		  }			
		?>
	</div>		
	<div class="colkab-2 rTableCell rTableCenterText"><a href="../output/measurement.php">Measurements</a></div>		
	<div class="colkab-2 rTableCell rTableCenterText"><a href="../charts/charts.php">Charts</a></div>		
	<div class="colkab-2 rTableCell rTableCenterText">Status</div>		
	<div class="colkab-2 rTableCell rTableCenterText">&nbsp;</div>
</div>		
</div>		
<div class="colkab-12 rTable">
<div class="colkab-12 rTableRow">
	<div class="colkab-12 rTableCell"><hr/></div>
</div>	
</div>	

