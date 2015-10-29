<?php
namespace Valgomat\Webserver\Controllers;
require __DIR__ . '/../../../vendor/autoload.php';

class Controller
{
    public function __construct()
    {
        $this->app = \Slim\Slim::getInstance();
    }
}
