<?php
namespace Valgomat\Webserver;
require __DIR__ . '/../../vendor/autoload.php';
$app = new \Slim\Slim();
require __DIR__ . '/controllers/init.php';
require __DIR__ . '/urls.php';

$app->run();
