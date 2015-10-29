<?php
namespace Valgomat\Webserver;
require __DIR__ . '/../../vendor/autoload.php';
date_default_timezone_set('Europe/Oslo');

$app = new \Slim\Slim(['templates.path' => './views']);

$app->get('/', '\Valgomat\Webserver\Controllers\IndexController:index');
$app->get('/survey', '\Valgomat\Webserver\Controllers\SurveyController:create');
$app->post(
    '/survey/:token/question/:id/answer',
    '\Valgomat\Webserver\Controllers\SurveyController:answer'
);
$app->get(
    '/geolocate',
    '\Valgomat\Webserver\Controllers\GeoLocateController:find'
);

$app->run();
