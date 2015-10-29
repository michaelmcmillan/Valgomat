<?php
namespace Valgomat\Webserver\Controllers;
require_once __DIR__ . '/../../../vendor/autoload.php';
use \Valgomat\Geography\GeoIPSearch;

class GeoLocateController extends Controller
{
    public function find()
    {
        $geo = new GeoIPSearch('89.151.214.72', $this->reader);
        $geo->lookup();
        $coordinate = $geo->getCoordinates();
        echo $this->county_finder->getCounty($coordinate->latitude, $coordinate->longitude);
    }
}
