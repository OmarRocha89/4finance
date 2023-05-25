<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoCortesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_cortes', function (Blueprint $table) {
            $table->id();
            $table->string('NoCliente'); 
            $table->string('numeroEstadoCuenta'); 
            $table->string('medioAccesoExterno'); 
            $table->string('rfc');
            $table->string('fechaLimitePago');
            $table->string('pagoMinimoRequerido');
            $table->string('pagoNoGenerarIntereses');
            $table->string('saldoAnterior');
            $table->string('comprasDisposiciones');
            $table->string('comisionesCobradas');
            $table->string('interesesCargados');
            $table->string('iva');
            $table->string('pagosRembolsosDevoluciones');
            $table->string('saldoCorte');
            $table->string('saldoTotal');
            $table->string('tasaInteresOrdinariaAnual');
            $table->string('tasaInteresOrdinariaPeriodo');
            $table->string('tasaInteresMoratoriaAnual');
            $table->string('tasaInteresMoratoriaPeriodo');
            $table->string('numeroTarjeta');
            $table->string('limiteCredito');
            $table->string('creditoDisponible');
            $table->string('mesesSaldarCuenta');
            $table->string('fechaInicioPeriodo');
            $table->string('fechaFinPeriodo');                 
            $table->string('interesesReales');
            $table->string('ivaInteresesReales');
            $table->string('ivaTotal');
            $table->string('montoBaseCalculoInteres');
            $table->string('montoPagosPeriodicos');
            $table->string('montoCargosObjetados');
            $table->string('cuentaCacao');
            $table->string('clabe');
            $table->string('inflacion');
            $table->string('tazaGravable');
            $table->string('tazaExcento');
            $table->string('interesTotal');
            $table->string('interesGravable');
            $table->string('interesExcento');
            $table->string('ivaCausado');
            $table->string('totalTimbrar');
            $table->timestamps();
        });
    }


                   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_cortes');
    }
}
