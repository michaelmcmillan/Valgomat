<?php
namespace Valgomat\Webserver\Controllers;
require __DIR__ . '/../../../vendor/autoload.php';
use \Valgomat\Geography\WhatMunicipalityIsPointIn;

class Controller
{
    public function __construct()
    {
        $this->app = \Slim\Slim::getInstance();

        $municipality_db = __DIR__ . '/../../Geography/data/Kommune.polygon.data';
        $polygons = unserialize(file_get_contents($municipality_db));
        $this->municipality_finder = new WhatMunicipalityIsPointIn($polygons);

        $ip_db = __DIR__ . '/../../Geography/data/GeoLite2-City.mmdb';
        $this->reader = new \GeoIp2\Database\Reader($ip_db);
    }
}
