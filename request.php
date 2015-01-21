<?php
	require_once 'forecast.io.php';

	$api_key = '94554c8a6559d0c2c5cd86c818780f32';
	$units = 'si';
	$lang = 'en';
	$forecast = new ForecastIO($api_key);

	class Request {

		public $latitude;
		public $longitude;
		public $fore;

		function __construct($lat = NULL, $long = NULL) {
			$this->latitude = $lat;
			$this->longitude = $long;
		}

		function getConditions() {
			global $forecast, $units, $lang;
			$condition = $forecast->getCurrentConditions($latitude, $longitude, $units, $lang);
			return $condition->getTemperature();
		}
	}
?>