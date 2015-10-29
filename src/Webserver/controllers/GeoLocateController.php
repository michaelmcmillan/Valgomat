<?php
namespace Valgomat\Webserver\Controllers;
require_once __DIR__ . '/../../../vendor/autoload.php';
use \Valgomat\Geography\GeoIPSearch;

class GeoLocateController extends Controller
{
    public function find()
    {
        $geo = new GeoIPSearch('89.151.214.72', $this->reader);
        $coordinate = $geo->lookup()->getCoordinates();

        $municipality = $this->municipality_finder->getMunicipality(
            $coordinate->latitude,
            $coordinate->longitude
        );

        $this->app->response->headers->set('Content-Type', 'application/json');
        $this->app->response->setBody(json_encode($municipality));
    }
}
