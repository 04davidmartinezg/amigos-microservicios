<?php

use Slim\App;
use App\Amigos\Presentation\Repositories\TestRepository;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->get('/test', [TestRepository::class, 'hola']);
    $app->post('/crearamigos', [AmigosRepository::class, 'create']);
};
use App\Amigos\Controllers\AmigosController;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['endpoint'] === 'amigos') {

    $data = json_decode(file_get_contents("php://input"), true);

    $controller = new AmigosController();
    echo $controller->guardar($data);
}
