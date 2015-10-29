<?php
namespace Valgomat\Webserver\Controllers;
require __DIR__ . '/../../../vendor/autoload.php';
use \Valgomat\Geography\WhatCountyIsPointIn;

class Controller
{
    public function __construct()
    {
        $this->app = \Slim\Slim::getInstance();

        $countydb = __DIR__ . '/../../Geography/data/Kommune.polygon.data';
        $polygons = unserialize(file_get_contents($countydb));
        $this->county_finder = new WhatCountyIsPointIn($polygons);

        $ipdb = __DIR__ . '/../../Geography/data/GeoLite2-City.mmdb';
        $this->reader = new \GeoIp2\Database\Reader($ipdb);
    }
}
