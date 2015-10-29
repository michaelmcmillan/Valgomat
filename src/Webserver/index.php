<?php
namespace Valgomat\Webserver;
require __DIR__ . '/../../vendor/autoload.php';

$app = new \Slim\Slim();
$app->get('/', '\Valgomat\Webserver\Controllers\IndexController:index');
$app->get('/api/survey', '\Valgomat\Webserver\Controllers\SurveyController:create');
$app->run();
