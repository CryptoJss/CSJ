<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    use HasFactory;
    protected $fillable = [
        'Id',
        'Nombre',
        'Apellido',
        'Contacto',
        'Fecha',
        'Direccion'
    ];

    protected $casts = [
        'Id'         => 'int',
        'Nombre'     => 'string',
        'Apellido'   => 'string',
        'contacto'   => 'string',
        'Fecha'      => 'date',
        'Direccion'   => 'string',
    ];


}
