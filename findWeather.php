<?php

	require_once 'forecast.io.php';

	date_default_timezone_set('America/Toronto');

	$api_key = '94554c8a6559d0c2c5cd86c818780f32';
	$units = 'si';
	$lang = 'en';
	$current = time();
	$yesterday = strtotime("-1 day", $current);
	$forecast = new ForecastIO($api_key);
	$data = array();
	
	
	$Address = urlencode($_POST['location']);
	//Use geocode to get latitude/longitude from input location
	$request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
	$xml = simplexml_load_file($request_url) or die("url not loading");
	$status = $xml->status;
	if ($status=="OK") {
	    $Lat = $xml->result->geometry->location->lat;
	    $Lon = $xml->result->geometry->location->lng;
	    //Get current conditions and temperature
	    $current_condition = $forecast->getCurrentConditions($Lat, $Lon, $units, $lang);
	    $current_temp = (int)($current_condition->getTemperature());
		$data['current'] = $current_temp . "˚";
		//Get conditions for yesterday
		$yesterday_condition = $forecast->getHistoricalConditions($Lat, $Lon, $units, $lang, $yesterday);
		if ($yesterday_condition == false) {
			$data['yesterday'] = "Error";
		}
		else {
			$yesterday_min = $yesterday_condition->getMinTemperature();
			$yesterday_max = $yesterday_condition->getMaxTemperature();
			$yesterday_avg = (int)(($yesterday_max + $yesterday_min) / 2);
			//Add: Check to see what time of day it is and return min/max/avg depending on that.
			$data['yesterday'] = $yesterday_avg . "˚";
		}

	}
	else {
		$data['current'] = $data['yesterday'] = "Format Error";
	}

	echo json_encode($data);

?>

