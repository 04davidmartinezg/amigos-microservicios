<?php
namespace App\Amigos\Controllers;

use App\Amigos\Models\Amigo;
use Exception;

class AmigosController {
        $amigo = new Amigo();
        $amigo->nombre = $data['nombre'];
        $amigo->apodo = $data['apodo'];
        $amigo->email = $data['email'];
        $amigo->telefono = $data['telefono'];
        $amigo->save();
        return $amigo->toJson();
}