<?php

namespace App\Amigos\Controllers;

use App\Amigos\Models\Amigo;
use Exception;

class AmigosController {
        public function guardaramigo($data) {
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
          function getAmigos(){
        $rows = Amigo::all();
        return $rows->toJson();
    }
    function getAmigo($id){
       $amigo = Amigo::find($id);
        if(empty($amigo)){
            throw new Exception("El amigo $id no existe", 1);
        }
        return $amigo;
    }

    function modificarAmigo($id, $data){
        $amigo = $this->getAmigo($id);
        $amigo->nombre = $data['nombre'];
        $amigo->email = $data['email'];
        $amigo->telefono = $data['telefono'];
        $amigo->apodo =$data ['apodo'];
        $amigo->save();
        return $amigo;
    }

    function borrarAmigos($id){
        $amigo= $this->getAmigo($id);
        $amigo->delete();
    }

}
