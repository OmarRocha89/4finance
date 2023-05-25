<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosTarjetahabiente extends Model
{
    use HasFactory;

    protected $fillable = [
        'NoCliente',
        'numeroEstadoCuenta', 
        'nombre',
        'apellido1',
        'apellido2',
        'calle',
        'numeroExterior',
        'numeroInterior',
        'colonia',
        'delMunicipio',
        'estado',
        'cp',
    ];
}
