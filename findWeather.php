<?php

	require_once 'forecast.io.php';

	$api_key = '94554c8a6559d0c2c5cd86c818780f32';
	$units = 'si';
	$lang = 'en';
	$forecast = new ForecastIO($api_key);

	$condition = $forecast->getCurrentConditions($_POST['latitude'], $_POST['longitude'], $units, $lang);

	$data = $condition->getTemperature() . "&degC";

	echo json_encode($data);

?>

