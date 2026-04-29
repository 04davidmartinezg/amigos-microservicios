<?php

namespace app\Amigos\Models;

use Illuminate\Database\Eloquent\Model;

class Amigo extends Model {

    protected $table = 'amigos';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apodo',
        'email',
        'telefono'
    ];
}
