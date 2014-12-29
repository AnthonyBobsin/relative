<?php

	require_once 'forecast.io.php';

	date_default_timezone_set('America/Toronto');

	$api_key = '94554c8a6559d0c2c5cd86c818780f32';
	$units = 'si';
	$lang = 'en';
	$current = time();
	$yesterday = strtotime("-1 day", $current);
	$current_hour = date('G', $current);
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
	    $timezone = $current_condition->getTimezone();
	    date_default_timezone_set($timezone);
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
			//Check to see what time of day it is and return min/max/avg depending on that.
			if ($current_hour <= 2) {
				$data['yesterday'] = ((int)$yesterday_min) . "˚";
			}
			elseif (($current_hour >= 3 && $current_hour <= 5) || $current_hour >= 21) {
				$data['yesterday'] = ((int)(($yesterday_min + $yesterday_avg) / 2)) . "˚";
			}
			elseif (($current_hour >= 9 && $current_hour <= 11) || ($current_hour >= 15 && $current_hour <= 17)) {
				$data['yesterday'] == ((int)(($yesterday_max + $yesterday_avg) / 2)) . "˚";
			}
			elseif ($current_hour >= 12 && $current_hour <= 14) {
				$data['yesterday'] = ((int)$yesterday_max) . "˚";
			}
			else {
				$data['yesterday'] = $yesterday_avg . "˚";
			}
		}

	}
	else {
		$data['current'] = $data['yesterday'] = "Format Error";
	}

	echo json_encode($data);

?>

