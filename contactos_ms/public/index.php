<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ .'/../app/Config/database.php';

$endpoints = require __DIR__ . '/../app/contactos/Presentation/Routers/endpoints.php';
$endpointsAmigos = require __DIR__ . '/../app/Amigos/Presentation/Routers/endpoints.php';


$app = AppFactory::create();

$endpoints($app);
$endpointsAmigos($app);

$app->run();
