<?php
namespace Valgomat\Geography;
require __DIR__ . '/../../vendor/autoload.php';

class WhatMunicipalityIsPointIn
{
    private $_municipality_polygons;
    private $_point_location;

    public function __construct($municipality_polygons)
    {
        $this->_municipality_polygons = $municipality_polygons;
        $this->_point_location = new PointLocation();
    } 

    public function getMunicipality($latitude, $longitude)
    {
        $point = $longitude . ' ' . $latitude;

        foreach ($this->_municipality_polygons as $municipality_polygon) {
            $position = $this->_point_location->pointInPolygon(
                $point, $municipality_polygon['points']
            );

            if ($position === 'inside' || $position === 'boundary') {
                $municipality = new Municipality();
                $municipality->name = trim($municipality_polygon['name']);
                return $municipality;
            }
        }
        return null;
    }
}
