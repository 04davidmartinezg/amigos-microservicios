<?php
namespace App\Presentation\Repositories;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\ContactosController;

class ContactosRepository{

    function all(Request $request, Response $response){
        $controller = new ContactosController();
        $contactos = $controller->getContactos();
        $response->getBody()->write($contactos);
        return $response->withHeader("Content-Type", "application/json");
    }

    function create(Request $request, Response $response){
        $bodyRequest = $request->getBody()->getContents();
        $data = json_decode($bodyRequest, true);
        $controller = new ContactosController();
        $contacto = $controller->guardarContacto($data);
        $response->getBody()->write($contacto);
        return $response->withHeader("Content-Type", "application/json");
    }
}