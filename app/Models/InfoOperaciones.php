<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoOperaciones extends Model
{
    use HasFactory;

    protected $fillable = [
    'NoCliente',
    'numeroEstadoCuenta', 
    'fechaOperacion',
    'fechaAplicacion',
    'descripcion',
    'rfcComercio',
    'poblacion',
    'monedaExtranjera',
    'montoDivisaExtranjera',
    'pesos',
    'claveMovimiento',
    'idMovimiento',
    'comisiones',
    ];

}
