<?php
namespace App\Controllers;

use App\Models\Contacto;

class ContactosController {

    function getContactos(){
        $rows = Contacto::all();
        return $rows->toJson();
    }
    
    function guardarContacto($data){
        $contacto = new Contacto();
        $contacto->nombre = $data['nombre'];
        $contacto->email = $data['email'];
        $contacto->telefono = $data['telefono'];
        $contacto->save();
        return $contacto->toJson();
    }
}