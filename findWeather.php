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
	$location = $_POST['location'];
	
	$Address = urlencode($location);
	//Use geocode to get latitude/longitude from input location
	$request_url = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyD7n4UdliKbLCTfpZ6D-mwERJqs8Ro-2Gw&address=".$Address."&sensor=true";
	$json = json_decode(file_get_contents($request_url), true);
	$status = $json['status'];
	if ($status=="OK") {
	    $Lat = $json['results'][0]['geometry']['location']['lat'];
	    $Lon = $json['results'][0]['geometry']['location']['lng'];
	    $location = $json['results'][0]['formatted_address'];
	    //Get current conditions and values
	    $current_condition = $forecast->getCurrentConditions($Lat, $Lon, $units, $lang);
	    $timezone = $current_condition->getTimezone();
	    date_default_timezone_set($timezone);
	    $current_temp = (int)($current_condition->getTemperature());
	    $min_temp = (int)($current_condition->getMinTemperature());
	    $max_temp = (int)($current_condition->getMaxTemperature());
	    $summary = $current_condition->getDailySummary();
	    $week_summary = $current_condition->getWeeklySummary();
	    $apparent = (int)($current_condition->getApparentTemperature());
	    $humidity = $current_condition->getHumidity();
	    $windSpeed = $current_condition->getWindSpeed();
	    $precipitation_chance = $current_condition->getPrecipitationProbability();
	    $precipitation_type = $current_condition->getPrecipitationType();
	    $precipitation_intensity = $current_condition->getPrecipitationIntensity();
	    $icon = $current_condition->getIcon();

	    $data['current']['summary'] = $summary;
	    $data['current']['temperature'] = $current_temp/* . "˚C"*/;
	    $data['current']['min_temp'] = $min_temp/* . "˚C"*/;
	    $data['current']['max_temp'] = $max_temp/* . "˚C"*/;
	    $data['current']['apparent'] = $apparent/* . "˚C"*/;
	    $data['current']['humidity'] = (int)($humidity * 100);
	    $data['current']['windSpeed'] = $windSpeed;
	    $data['current']['precipitation_chance'] = (int)($precipitation_chance * 100);
	    $data['current']['precipitation_type'] = $precipitation_type;
	    $data['current']['precipitation_intensity'] = $precipitation_intensity;
	    $data['current']['icon'] = $icon;

	    $data['summary'] = $week_summary;
	    $data['location'] = $location;

		//Get conditions for yesterday and values
		$yesterday_condition = $forecast->getPreviousConditions($Lat, $Lon, $units, $lang, $yesterday);
		if ($yesterday_condition == false) {
			$data['yesterday']['temperature'] = "Error";
		}
		else {
			$current_temp = (int)($yesterday_condition->getTemperature());
		    $min_temp = (int)($yesterday_condition->getMinTemperature());
		    $max_temp = (int)($yesterday_condition->getMaxTemperature());
		    $summary = $yesterday_condition->getDailySummary();
		    $week_summary = $yesterday_condition->getWeeklySummary();
		    $apparent = (int)($yesterday_condition->getApparentTemperature());
		    $humidity = $yesterday_condition->getHumidity();
		    $windSpeed = $yesterday_condition->getWindSpeed();
		    $precipitation_chance = $yesterday_condition->getPrecipitationProbability();
		    $precipitation_type = $yesterday_condition->getPrecipitationType();
		    $precipitation_intensity = $yesterday_condition->getPrecipitationIntensity();
		    $icon = $yesterday_condition->getIcon();

		    $data['yesterday']['summary'] = $summary;
		    $data['yesterday']['temperature'] = $current_temp/* . "˚C"*/;
		    $data['yesterday']['min_temp'] = $min_temp/* . "˚C"*/;
		    $data['yesterday']['max_temp'] = $max_temp/* . "˚C"*/;
		    $data['yesterday']['apparent'] = $apparent/* . "˚C"*/;
		    $data['yesterday']['humidity'] = (int)($humidity * 100);
		    $data['yesterday']['windSpeed'] = $windSpeed;
		    $data['yesterday']['precipitation_chance'] = (int)($precipitation_chance * 100);
		    $data['yesterday']['precipitation_type'] = $precipitation_type;
		    $data['yesterday']['precipitation_intensity'] = $precipitation_intensity;
		    $data['yesterday']['icon'] = $icon;
		}
	}
	else {
		$data['current']['temperature'] = $data['yesterday']['temperature'] = "Format Error";
	}

	echo json_encode($data);

?>

