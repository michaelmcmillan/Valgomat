<?php
namespace Valgomat\Geography;
require __DIR__ . '/../../vendor/autoload.php';

class WhatCountyIsPointIn
{
    private $_county_polygons;
    private $_point_location;

    public function __construct($county_polygons)
    {
        $this->_county_polygons = $county_polygons;
        $this->_point_location = new PointLocation();
    } 

    public function getCounty($latitude, $longitude)
    {
        $point = $longitude . ' ' . $latitude;

        foreach ($this->_county_polygons as $county_polygon) {
            $position = $this->_point_location->pointInPolygon($point, $county_polygon['points']);
            if ($position === 'inside' || $position === 'boundary') {
                return $county_polygon['name'];
            }
        }
        return false;
    }
}
