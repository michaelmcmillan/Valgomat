<?php
namespace Valgomat\Webserver\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        $this->app->render('index.html');
    }
}
