<?php

	require_once 'forecast.io.php';

	$api_key = '94554c8a6559d0c2c5cd86c818780f32';
	$units = 'si';
	$lang = 'en';
	date_default_timezone_set('America/Toronto');
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
	    $condition = $forecast->getCurrentConditions($Lat, $Lon, $units, $lang);
	    $current_temp = (int)($condition->getTemperature());
		$data['current'] = $current_temp . "˚";
		//Get conditions for yesterday
		$condition = $forecast->getHistoricalConditions($Lat, $Lon, $units, $lang, $yesterday);
		if ($condition == false) {
			$data['yesterday'] = "Error";
		}
		else {
			$yesterday_min = $condition->getMinTemperature();
			$yesterday_max = $condition->getMaxTemperature();
			$yesterday_avg = (int)(($yesterday_max + $yesterday_min) / 2);
			$data['yesterday'] = $yesterday_avg . "˚";
		}

	}
	else {
		$data['current'] = $data['yesterday'] = "Error Occured";
	}

	echo json_encode($data);

?>

