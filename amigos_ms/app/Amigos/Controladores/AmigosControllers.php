<?php

namespace App\Amigos\Controllers;

use App\Amigos\Models\Amigo;
use Exception;

class AmigosController {
        public function guardar($data) {
    try {

        if (!is_array($data)) {
            $data = json_decode($data, true);
        }

        $amigo = new Amigo();

        $amigo->nombre = $data['nombre'] ?? null;
        $amigo->apodo = $data['apodo'] ?? null;
        $amigo->email = $data['email'] ?? null;
        $amigo->telefono = $data['telefono'] ?? null;

        $amigo->save();

        return json_encode($amigo);

    } catch (Exception $e) {
        return json_encode([
            "error" => $e->getMessage()
        ]);
    }
        }

}
