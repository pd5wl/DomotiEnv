<?php
// Head
include ('../includes/head.html');
include ('../includes/header.php');
?>

<!-- blok -->
<div class="colkab-12 rTable">
<div class="colkab-12 rTableRow">
<div class="colkab-6 rTableCell">
<!-- Temperature -->
	<!-- https://www.amcharts.com/ -->
  <div id="Temperature" class="chartdiv"></div>
  <script>
  var chart = AmCharts.makeChart( "Temperature", {
    "type": "serial",
	"angle": 45,
	"depth3D": 10,
	"creditsPosition": "bottom-right",
    "dataLoader": {
      "url": "../includes/jsonloader.php"
    },
	  	"titles": [
		{
			"id": "Title-1",
			"size": 15,
			"text": "Temperature"
		},],
	"valueAxes": [
		{
			"id": "ValueAxis-1",
			"title": "Celsius"
		}
	],
	"gridAboveGraphs": true,
  	"startDuration": 1,
  	"graphs": [ {
	"balloonText": "[[DevOmschr]]: <b>[[Temperature]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "Temperature",
	"fixedColumnWidth": 10
  } ],
  	"chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  	"categoryField": "DevOmschr",
  	"categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  },
	"theme": "chalk",
	"export": {
    "enabled": false
  }
  } );
  </script>
</div>
<div class="colkab-6 rTableCell">
<!-- Luchtvocht -->
<div id="Humidity" class="chartdiv"></div>
  <script>
  var chart = AmCharts.makeChart( "Humidity", {
    "type": "serial",
	"angle": 45,
	"depth3D": 10,
	"creditsPosition": "bottom-right",
    "dataLoader": {
      "url": "../includes/jsonloader.php"
    },
	"titles": [
		{
			"id": "Title-1",
			"size": 15,
			"text": "Humidity"
		},],
	"gridAboveGraphs": true,
  	"startDuration": 1,
  	"graphs": [ {
	"balloonText": "[[DevOmschr]]: <b>[[Humidity]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "Humidity",
	"fixedColumnWidth": 10
  } ],
	"valueAxes": [
		{
			"id": "ValueAxis-1",
			"title": "%"
		}
	],
  	"chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  	"categoryField": "DevOmschr",
  	"categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  },
	"theme": "chalk",
  	"export": {
    "enabled": false
  }
  } );
  </script>
</div>
</div>	
</div>	
<div class="colkab-12 rTable">
<div class="colkab-12 rTableRow">
<div class="colkab-6 rTableCell">
<!-- Luchtvocht -->
<div id="Pressure" class="chartdiv"></div>
  <script>
  var chart = AmCharts.makeChart( "Pressure", {
    "type": "serial",
	"angle": 45,
	"depth3D": 10,
	"creditsPosition": "bottom-right",
    "dataLoader": {
      "url": "../includes/jsonloader.php"
    },
	"titles": [
		{
			"id": "Title-1",
			"size": 15,
			"text": "Pressure"
		},],
	"valueAxes": [
		{
			"id": "ValueAxis-1",
			"title": "mBar"
		}
	],
	"gridAboveGraphs": true,
  	"startDuration": 1,
  	"graphs": [ {
	"balloonText": "[[DevOmschr]]: <b>[[Pressure]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "Pressure",
	"fixedColumnWidth": 10
  } ],
  	"chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  	"categoryField": "DevOmschr",
  	"categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  },
	"theme": "chalk",  
  	"export": {
    "enabled": false
  }
  } );
  </script>
</div>
	<div class="colkab-6 rTableCell">&nbsp;</div>	
</div>	
</div>
	
<?php
	 include ('../includes/footer.php');
	 ?>