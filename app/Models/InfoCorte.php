<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoCorte extends Model
{
    use HasFactory;


    protected $fillable = [
    'NoCliente',
    'numeroEstadoCuenta',
    'rfc',
    'fechaLimitePago',
    'pagoMinimoRequerido',
    'pagoNoGenerarIntereses',
    'saldoAnterior',
    'comprasDisposiciones',
    'comisionesCobradas',
    'interesesCargados',
    'iva',
    'pagosRembolsosDevoluciones',
    'saldoCorte',
    'saldoTotal',
    'tasaInteresOrdinariaAnual',
    'tasaInteresOrdinariaPeriodo',
    'tasaInteresMoratoriaAnual',
    'tasaInteresMoratoriaPeriodo',
    'numeroTarjeta',
    'limiteCredito',
    'creditoDisponible',
    'mesesSaldarCuenta',
    'fechaInicioPeriodo',
    'fechaFinPeriodo',
    'medioAccesoExterno',                  
    'interesesReales',
    'ivaInteresesReales',
    'ivaTotal',
    'montoBaseCalculoInteres',
    'montoPagosPeriodicos',
    'montoCargosObjetados',
    'cuentaCacao',
    'clabe',
    'inflacion',
    'tazaGravable',
    'tazaExcento',
    'interesTotal',
    'interesGravable',
    'interesExcento',
    'ivaCausado',
    'totalTimbrar',
    ];

    
}
