<?php

namespace app\Amigos\Controladores;

use app\Amigos\Models\Amigo;
use Exception;

class AmigosControllers {
        public function guardaramigo($data) {
        $amigo = new Amigo();
        $amigo->nombre = $data['nombre'] ?? null;
        $amigo->apodo = $data['apodo'] ?? null;
        $amigo->email = $data['email'] ?? null;
        $amigo->telefono = $data['telefono'] ?? null;

        $amigo->save();

        return json_encode($amigo);
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
