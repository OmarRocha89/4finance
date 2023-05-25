<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoEstadosCuenta extends Model
{
    use HasFactory;

    protected $fillable = [
    'NoCliente',
    'numeroEstadoCuenta',
    'subproducto',
    'fechaCorte',
    'numeroRegistrosOperaciones',
    'totalTimbrar',
    'Uuid',
    'Date',
    'CfdiSign',
    'SatCertNumber',
    'SatSign',
    'OriginalString',
    'urlQr',
    ];
    
}
