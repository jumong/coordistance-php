# Coordistance php

## Introduction

A simple php class that implements the Great-circle theory, giving the distance of two points on the hearth, using the two most commons formulas, Haversine and Vincenty.

For further information about the theory refere to Wikipedia: https://en.wikipedia.org/wiki/Great-circle_distance

## Basic use

```php
include 'coordistance.php';

$parameters = array();
$parameters["lat1"] = 41.9;
$parameters["lon1"] = 12.5;
$parameters["lat2"] = 51.507222;
$parameters["lon2"] = -0.1275;

$distance = new CoorDistance($parameters);

$h_distance = $distance->haversine();
``