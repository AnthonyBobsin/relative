<?php

	require_once 'forecast.io.php';

	$api_key = '94554c8a6559d0c2c5cd86c818780f32';
	$units = 'si';
	$lang = 'en';
	$forecast = new ForecastIO($api_key);
	
	
	$Address = urlencode($_POST['location']);
	$request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
	$xml = simplexml_load_file($request_url) or die("url not loading");
	$status = $xml->status;
	if ($status=="OK") {
	    $Lat = $xml->result->geometry->location->lat;
	    $Lon = $xml->result->geometry->location->lng;
	    $condition = $forecast->getCurrentConditions($Lat, $Lon, $units, $lang);
		$data = $condition->getTemperature() . "&degC";
	}
	else {
		$data = "Error Occured";
	}

	echo json_encode($data);

?>

