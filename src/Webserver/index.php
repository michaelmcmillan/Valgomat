<?php
namespace Valgomat\Webserver;
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/controllers/init.php';

$app = new \Slim\Slim();
$app->get('/', '\Valgomat\Webserver\Controllers\IndexController:index');

$app->run();
