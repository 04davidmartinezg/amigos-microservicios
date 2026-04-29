<?php

use Slim\app;
use App\Amigos\Presentation\Repositories\AmigosRepository;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->post('/amigo', [AmigosRepository::class, 'create']);
    $app->get('/amigo', [AmigosRepository::class, 'all']);
    $app->get('/amigo/{id}', [AmigosRepository::class, 'detail']);
    $app->put('/amigo/{id}', [AmigosRepository::class, 'update']);
    $app->delete('/amigo/{id}', [AmigosRepository::class, 'delete']);
};

