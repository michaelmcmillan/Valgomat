<?php

$app->get('/',            '\Valgomat\Webserver\Controllers\IndexController:index');
$app->get('/survey/2015', '\Valgomat\Webserver\Controllers\SurveyController:create');
