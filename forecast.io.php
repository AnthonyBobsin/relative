<?php

class ForecastIO {
	private $api_key;
	const API_ENDPOINT = 'https://api.forecast.io/forecast/';

	/**
	 * Create a new instance
	 * @param String, apikey
	 */
	function __construct($api_key) {
		$this->api_key = $api_key;
	}

	// Make Forecast.io api request
	private function requestData($latitude, $longitude, $units, $language = 'en', $timestamp = false) {
		$validUnits = array('auto', 'us', 'si', 'ca', 'uk');
		//Make sure $unit supplied valid
		if (in_array($units, $validUnits)) {
			$request_url = self::API_ENDPOINT .
				$this->api_key . '/' .
				$latitude . ',' . $longitude .
				( $timestamp ? ',' . $timestamp : '') . 
				'?units=' . $units . '&lang=' . $language;
				$content = file_get_contents($request_url);
		}
		else {
			return false;
		}
		if (!empty($content)) {
			//return contents of api request in json format
			return json_decode($content);
		}
		else {
			return false;
		}
	}

	/**
	 * Will return the current conditions
	 * @param float $latitude
	 * @param float $longitude
	 * @return \ForecastIOConditions|boolean
	 */
	function getCurrentConditions($latitude, $longitude, $units = 'auto', $language) {
		$data = $this->requestData($latitude, $longitude, $units, $language);
	    if ($data !== false) {
	      return new ForecastIOConditions($data);
	    } 
	    else {
	      return false;
    	}
	}
	/**
	 * Will return conditions at given timestamp
	 * @param int $timestamp
	 * @return |ForecastIOConditions|boolen
	 */
	function getPreviousConditions($latitude, $longitude, $units = 'auto', $language, $timestamp) {
		$data = $this->requestData($latitude, $longitude, $units, $language, $timestamp);
	    if ($data !== false) {
	      return new ForecastIOConditions($data);
	    } else {
	      return false;
	    }
	}
}

/* class to access data */
class ForecastIOConditions {
	private $data;
	function __construct($data) {
		$this->data = $data;
	}
	function getTemperature() {
		return $this->data->currently->temperature;
	}
	function getApparentTemperature() {
		return $this->data->currently->apparentTemperature;
	}
	function getMinTemperature() {
		return $this->data->daily->data[0]->temperatureMin;
	}
	function getMaxTemperature() {
		return $this->data->daily->data[0]->temperatureMax;
	}
	function getDailySummary() {
		return $this->data->daily->data[0]->summary;
	}
	function getWeeklySummary() {
		return $this->data->daily->summary;
	}
	function getPrecipitationProbability() {
		return $this->data->currently->precipProbability;
	}
	function getPrecipitationType() {
		return $this->data->currently->precipType;
	}
	function getPrecipitationIntensity() {
		return $this->data->currently->precipIntensity;
	}
	function getHumidity() {
		return $this->data->currently->humidity;
	}
	function getWindSpeed() {
		return $this->data->currently->windSpeed;
	}
	function getTimezone() {
		return $this->data->timezone;
	}
	function getIcon() {
		return $this->data->currently->icon;
	}

}