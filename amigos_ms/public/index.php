<?php
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../app/Config/database.php';
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ .'/../app/Config/database.php';
$endpointsAmigos = require __DIR__ . '/../app/Amigos/Presentation/Routers/endpoints.php';


$app = AppFactory::create();

$endpoints($app);
$endpointsAmigos($app);

$app->run();
