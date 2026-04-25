<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use App\Presentation\Repositories\TestRepository;
use App\Presentation\Repositories\ContactosRepository;


return function (App $app) {
    $app->get('/', [TestRepository::class, 'default'] );
    $app->post('/hola', [TestRepository::class, 'hola'] );

    $app->post('/contacto', [ContactosRepository::class, 'create']);
    $app->get('/contactos', [ContactosRepository::class, 'all']);
    $app->get('/contacto/{id}', [ContactosRepository::class, 'detail']);
    $app->put('/contacto/{id}', [ContactosRepository::class, 'update']);
    $app->delete('/contacto/{id}', [ContactosRepository::class, 'delete']);
};