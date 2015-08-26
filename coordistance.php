<?php

/**
 *	@author Massimiliano D'Angelo (maxdangelo)
 *  @version 1.0.0
 */

class CoorDistance {

	/**
	 * @param float $lat1 Latitude of 1st point in decimal degrees
	 * @param float $lon1 Longitude of 1st point in decimal degrees
	 * @param float $lat2 Latitude of 2nd point in decimal degrees
	 * @param float $lon2 Longitude of 2nd point in decimal degrees
	 * @param string $unit Base measurement unit ("kilometer", "meter", "mile") - Default "kilometer"
	 * @param float $radius Earth radius - Default 6372.795477598 kilometers
	 */
	
	public $lat1;
	public $lon1;
	public $lat2;
	public $lon2;
	public $unit;
	public $radius;

	public function __construct($parameters) {
		$this->lat1 = $parameters["lat1"];
		$this->lon1 = $parameters["lon1"];
		$this->lat2 = $parameters["lat2"];
		$this->lon2 = $parameters["lon2"];

		if (!isset($parameters["unit"])) {
			$this->unit = "kilometer";
		}

		if (!isset($parameters["radius"])) {
			$this->radius = 6372.795477598;
		}		

	}

	public function haversine() {
		/**
		 * @return distance between point 1 and point 2 using Haversine formula, radius and unit set or default
		 */

		$lat1R = deg2rad($this->lat1);
		$lon1R = deg2rad($this->lon1);
		$lat2R = deg2rad($this->lat2);
		$lon2R = deg2rad($this->lon2);

		$latDelta = $lat2R - $lat1R;
		$lonDelta = $lon2R - $lon1R;

		$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($lat1R) * cos($lat2R) * pow(sin($lonDelta / 2), 2)));
		$distancekm = $angle * $this->radius;
		
		switch ($this->unit) {
			case "kilometer":
			$distance = $distancekm;
			break;
			case "meter":
			$distance = $distancekm * 1000; 
			break;
			case "mile":
			$distance = $distancekm * 0.621371192;
			break;
			default:
			$distance = $distancekm;
		}

		return $distance;
	}

	public function vincenty() {
		/**
		 * @return distance between point 1 and point 2 using Vincenty formula, radius and unit set or default
		 */

		$lat1R = deg2rad($this->lat1);
		$lon1R = deg2rad($this->lon1);
		$lat2R = deg2rad($this->lat2);
		$lon2R = deg2rad($this->lon2);

		$latDelta = $lat2R - $lat1R;
		$lonDelta = $lon2R - $lon1R;

		$a = pow(cos($lat2R) * sin($lonDelta), 2) +
		pow(cos($lat1R) * sin($lat2R) - sin($lat1R) * cos($lat2R) * cos($lonDelta), 2);
		$b = sin($lat1R) * sin($lat2R) + cos($lat1R) * cos($lat2R) * cos($lonDelta);

		$angle = atan2(sqrt($a), $b);
		
		$distanceKm = $angle * $this->radius;
		
		switch ($this->unit) {
			case "kilometer":
			$distance = $distanceKm;
			break;
			case "meter":
			$distance = $distanceKm * 1000; 
			break;
			case "mile":
			$distance = $distanceKm * 0.621371192;
			break;
			default:
			$distance = $distanceKm;
		}

		return $distance;

	}	
}
