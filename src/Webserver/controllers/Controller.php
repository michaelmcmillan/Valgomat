<?php
namespace Valgomat\Webserver\Controllers;

class Controller
{
    
    public function __construct()
    {
        global $app;
        $this->app = $app;
    }

}