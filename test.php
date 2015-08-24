<?php

include 'coordistance.php';
$parameters = array();
//Measuring the distance between Rome and London
$parameters["lat1"] = 41.9;
$parameters["lon1"] = 12.5;
$parameters["lat2"] = 51.507222;
$parameters["lon2"] = -0.1275;

$distance = new CoorDistance($parameters);

echo "<pre>First point (Rome) coordinates: (".$distance->lat1.", ".$distance->lon1.")".PHP_EOL."</pre>";
echo "<pre>Second point (London) coordinates: (".$distance->lat2.", ".$distance->lon2.")".PHP_EOL."</pre>";
echo "<pre>Distance is (Using Haversine formula): ".$distance->haversine().PHP_EOL."</pre>";
echo "<pre>Distance is (Using Vincenty formula): ".$distance->vincenty().PHP_EOL."<pre>";

?>