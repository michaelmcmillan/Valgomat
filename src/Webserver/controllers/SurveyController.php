<?php
namespace Valgomat\Webserver\Controllers;

class SurveyController extends Controller
{
    public function create()
    {
        $this->app->response->setBody("hello");
    }
}
