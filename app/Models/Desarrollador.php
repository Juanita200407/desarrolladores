<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Para eliminar el registro, pero solamente en la vista y no en la bd
use Illuminate\Database\Eloquent\SoftDeletes;

class Desarrollador extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nombre', 
        'apellido',
        'telefono',
        'direccion',
        'proyecto_id'
    ];
}
