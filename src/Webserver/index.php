<?php
namespace Valgomat\Webserver;
require __DIR__ . '/../../vendor/autoload.php';
date_default_timezone_set('Europe/Oslo');

$app = new \Slim\Slim();
$app->get('/', '\Valgomat\Webserver\Controllers\IndexController:index');
$app->get('/api/survey', '\Valgomat\Webserver\Controllers\SurveyController:create');
$app->run();
