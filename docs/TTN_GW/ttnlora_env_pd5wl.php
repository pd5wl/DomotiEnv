<?php
    $entityBody = file_get_contents('php://input');

    $baseurl = "http://83.80.155.239:38280";

// {"payload":"LSgCcQAA","fields":{"batt":4.5,"bytes":"LSgCcQAA","humidity":40,"pkcount":0,"temperature":22.5,"txresult":0,"txretrycount":0},"port":1,"counter":0,"dev_eui":"0004A30B001AD790","metadata":[{"frequency":867.5,"datarate":"SF7BW125","codingrate":"4/5","gateway_timestamp":3992695868,"channel":5,"server_time":"2016-11-11T10:34:10.458885697Z","rssi":-81,"lsnr":6.8,"rfchain":0,"crc":1,"modulation":"LORA","gateway_eui":"1DEE026C7BFC3E5C","altitude":44,"longitude":6.83681,"latitude":52.2402}]}

// http://www.mapcoordinates.net/en

$dev_id = "NULL";
$time = "NULL";
$batt = "NULL";
$humidity = "NULL";
$temperature = "NULL";
$rssi = "NULL";
$ldr = "NULL";
$framecounter = "NULL" ;
$packetcounter = "NULL";
$txresult = "NULL";
$txretrycount = "NULL";
$pressure = "NULL";

function getData($parent,$arr)
{
	global $dev_id,$batt,$humidity,$pressure,$time,$temperature,$rssi,$ldr,$framecounter,$packetcounter,$txresult,$txretrycount;
	//echo "parent = $parent > ";
	foreach($arr as $key => $value)
	{
		if (is_numeric($value))
		{
			//echo "0.key = $key\n";
			switch($key) {
				case "batt" : $batt = $value; break;
				case "humidity" : $humidity = $value; break;
				case "pressure" : $pressure = $value; break;
				case "temperature": $temperature = $value; break;
				case "pkcount": $packetcounter = $value; break;
				case "txresult": $txresult = $value; break;
				case "txretrycount": $txretrycount = $value; break;
				case "rssi" : 
					if ($rssi == "NULL") 
						$rssi = $value; 
					else if ($value > $rssi)
						$rssi = $value; 
					break;
				case "counter": $framecounter = $value; break;
			}
		}
		else if (is_array($value))
		{
			getData($key, $value);
		}
		else if (is_object($value))
		{
			getData($key, $value);
		}
		else 
		{
			if ($parent == "metadata" && !is_numeric($parent))
			{
				//echo "1.key = $key\n";
				switch($key) {
					case "time" : $time = $value; break;
				}
			}
			else
			{
				//echo "2.key = $key\n";
				switch($key) {
					case "dev_id" : $dev_id = $value; break;
					case "app_id" : $app_id = $value; break;
				}
			}
		} 
	}	
}

$my_arr = json_decode($entityBody);

if ($my_arr != null) {
	getData("", $my_arr);

	if ($pressure > 1100) {
		$pressure = 'NULL';
	}

	if ($time != "NULL" && $dev_id != "NULL" && $dev_id == "ph2lb-env-005")
	{
		$time = str_replace("Z", "", $time);
		$dev_id = 6;
		///nodes.php?dev_id=2&temp=-22.75&voltage=11&pressure=1098&humidity=58
		$url = "$baseurl/nodes.php?dev_id=$dev_id&temperature=$temperature&voltage=$batt&pressure=$pressure&humidity=$humidity";
		echo "Caling : $url\r\n";
		$payload = file_get_contents($url);
		echo "$payload\r\n";
	}
	else
	{
		echo "Nothing to do.";
	}
}
else
{
	echo "No body.";
}
?>
