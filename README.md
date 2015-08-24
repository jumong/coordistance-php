# Coordistance php

## Introduction

A simple php class that implements the **Great-circle distance theory**, giving the distance of two points on the hearth, using the two most commons formulas, **Haversine** and **Vincenty**.

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
```
## Options

### Measurement unit - Kilometers, Miles, Meters

The two methods return a result in kilometers. It's possible to have it in meters and miles:

```
$distance->unit = "meter";
$h_distance = $distance->haversine();
```
will give the distance in meters

```
$distance->unit = "mile";
$h_distance = $distance->haversine();
```
will give the distance in miles

### Earth radius

As default value the earth radius is set as 6371.005076123

In case it is needed to set it to another value, as example to match existing calculations with another value:

```
$distance->radius = "6378";
$h_distance = $distance->haversine();
```
will return the distance calculated with this radius. Of course it is possible to calculate the distance of any arch of any sphere. Just remember that radius is expressed in kilometers as the default result.

### Vincenty formula

The class implement both Haversine and Vincenty formulas.

```
$v_distance = $distance->vincenty();
```

In some cases the Vincenty formula is more accurate, anyway the execution time is approx 50% longer.
