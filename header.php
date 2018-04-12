<div class="colkab-12 rTable">
<div class="colkab-12 rTableRow">
	<div class="colkab-12 rTableCell"><h1>Domotica Efficiente</h1><!--Thanx Karen --></div>
</div>	
</div>	
<div class="colkab-12 rTable">
<div class="colkab-12 rTableRow">
	<div class="colkab-2 rTableCell"><a href="nodelist.php">Node List</a></div>		
	<div class="colkab-2 rTableCell">	<?php
		  include './config.php';
		  if ($setup == 1) { 
			  echo '<a href="addnode.php">Add Node</a>';
		  }
		  else {
			  echo 'Add Node - Disabled';
		  }			
		?>
	</div>		
	<div class="colkab-2 rTableCell"><a href="measurement.php">Measurements</a></div>		
	<div class="colkab-2 rTableCell"><a href="charts.php">Charts</a></div>		
	<div class="colkab-2 rTableCell">Status</div>		
	<div class="colkab-2 rTableCell">&nbsp;</div>
</div>		
</div>		
<div class="colkab-12 rTable">
<div class="colkab-12 rTableRow">
	<div class="colkab-12 rTableCell"><hr/></div>
</div>	
</div>	

