<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <th id="main" colspan="6" scope="col"><h1>Domotica Efficiente</h1><!--Thanx Karen --></th>
    </tr>
    <tr>
      <td align="center"><a href="nodelist.php">Node List</a></td>
      <td align="center">
		<?php
		  include './config.php';
		  if ($setup == 1) { 
			  echo '<a href="addnode.php">Add Node</a>';
		  }
		  else {
			  echo 'Add Node - Disabled';
		  }			
		?>
		</td>
      <td align="center"><a href="measurement.php">Measurements</a></td>
      <td align="center"><a href="charts.php">Charts</a></td>
      <td align="center">Status</td>
      <td align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>
<hr/>
