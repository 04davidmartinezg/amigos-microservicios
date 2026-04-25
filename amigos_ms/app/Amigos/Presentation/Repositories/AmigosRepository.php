<?php

namespace App\Amigos\Presentation\Repositories;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Amigos\Controllers\AmigosController;
use Exception;

class AmigosRepository{
    function create(Request $request, Response $response)
    {
        $bodyRequest = $request->getBody()->getContents();
        $data = json_decode($bodyRequest, true);
        $controller = new AmigosController();
        $contacto = $controller->guardarAmigo($data);
        $response->getBody()->write($contacto);
        return $response->withHeader("Content-Type", "application/json");
    }
}