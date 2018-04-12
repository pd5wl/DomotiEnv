<?php
// Head
include ('./head.html');
include ('./header.php');
?>
<!-- Temperature -->
  <div id="Temperature" style="width: 70%; height: 200px;"></div>
  <script>
  var chart = AmCharts.makeChart( "Temperature", {
    "type": "serial",
    "dataLoader": {
      "url": "jsonloader.php"
    },
	"gridAboveGraphs": true,
  	"startDuration": 1,
  	"graphs": [ {
	"balloonText": "[[DevOmschr]]: <b>[[Temperature]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "Temperature",
	"fixedColumnWidth": 15
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
  	"export": {
    "enabled": false
  }
  } );
  </script>

<!-- Luchtvocht -->
<div id="Humidity" style="width: 70%; height: 200px;"></div>
  <script>
  var chart = AmCharts.makeChart( "Humidity", {
    "type": "serial",
    "dataLoader": {
      "url": "jsonloader.php"
    },
	"gridAboveGraphs": true,
  	"startDuration": 1,
  	"graphs": [ {
	"balloonText": "[[DevOmschr]]: <b>[[Humidity]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "Humidity",
	"fixedColumnWidth": 15
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
  	"export": {
    "enabled": false
  }
  } );
  </script>

<!-- Luchtvocht -->
<div id="Pressure" style="width: 70%; height: 200px;"></div>
  <script>
  var chart = AmCharts.makeChart( "Pressure", {
    "type": "serial",
    "dataLoader": {
      "url": "jsonloader.php"
    },
	"gridAboveGraphs": true,
  	"startDuration": 1,
  	"graphs": [ {
	"balloonText": "[[DevOmschr]]: <b>[[Pressure]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "Pressure",
	"fixedColumnWidth": 15
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
  	"export": {
    "enabled": false
  }
  } );
  </script>

<?php
	 include ('footer.php');
	 ?>