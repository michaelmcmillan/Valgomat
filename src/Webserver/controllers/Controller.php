<?php
namespace Valgomat\Webserver\Controllers;
require __DIR__ . '/../../../vendor/autoload.php';

class Controller
{
    public function __construct()
    {
        $this->app = \Slim\Slim::getInstance();
        $path = __DIR__ . '/../../Geography/GeoLite2-City.mmdb';
        $this->reader = new \GeoIp2\Database\Reader($path);
    }
}
