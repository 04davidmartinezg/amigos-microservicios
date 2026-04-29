<?php

namespace app\Amigos\Presentation\Repositories;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Amigos\Controladores\AmigosControllers;
use Exception;

class AmigosRepository{
    function create(Request $request, Response $response)
    {
        $bodyRequest = $request->getBody()->getContents();
        $data = json_decode($bodyRequest, true);
        $controller = new AmigosControllers();
        $contacto = $controller->guardarAmigo($data);
        $response->getBody()->write($contacto);
        return $response->withHeader("Content-Type", "application/json");
    }
    function all(Request $request, Response $response)
    {
        $controller = new AmigosControllers();
        $amigos = $controller->getAmigos();
        $response->getBody()->write($amigos);
        return $response->withHeader("Content-Type", "application/json");
    }
    function detail(Request $req, Response $resp, $args)
    {
        try {
            $id = $args['id'];

            $controller = new AmigosControllers();
            $amigo = $controller->getAmigo($id);

            $resposeBody = $amigo->toJson();
            $resp->getBody()->write($resposeBody);
            return $resp->withHeader("Content-Type", "application/json");
        } catch (Exception $ex) {
            $resp->getBody()->write("Error: " . $ex->getMessage());
            $code = 400;
            if ($ex->getCode() == 1) {
                $code = 404;
            }
            return $resp->withStatus($code);
        }
    }

    function update(Request $req, Response $resp, $args)
    {
        try {
            $id = $args['id'];
            $body = $req->getBody()->getContents();
            $data = json_decode($body, true);

            $controller = new AmigosControllers();
            $contacto = $controller->modificarAmigo($id, $data);

            $dataResponse = $contacto->toJson();
            $resp->getBody()->write($dataResponse);
            return $resp
                ->withStatus(200)
                ->withHeader("Content-Type", "application/json");
        } catch (Exception $ex) {
            $resp->getBody()->write("Error: " . $ex->getMessage());
            $code = 400;
            if ($ex->getCode() == 1) {
                $code = 404;
            }
            return $resp->withStatus($code);
        }
    }

    function delete(Request $req, Response $resp, $args)
    {
        try {
            $id = $args['id'];

            $controller = new AmigosControllers();
            $controller->borrarAmigos($id);

            $dataResponse = json_encode(['mgs' => 'Amigo borrado']);
            $resp->getBody()->write($dataResponse);
            return $resp
                ->withStatus(200)
                ->withHeader("Content-Type", "application/json");
        } catch (Exception $ex) {
            $resp->getBody()->write("Error: " . $ex->getMessage());
            $code = 400;
            if ($ex->getCode() == 1) {
                $code = 404;
            }
            return $resp->withStatus($code);
        }
    }
}