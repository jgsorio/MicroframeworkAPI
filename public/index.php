<?php

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__FILE__ , 2));
$dotenv->load();

$app = Slim\Factory\AppFactory::create();

require_once __DIR__ . '/../app/Router/app.php';

$app->run();

