<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoOperacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_operaciones', function (Blueprint $table) {
            $table->id();
            $table->string('NoCliente'); 
            $table->string('numeroEstadoCuenta'); 
            $table->string('fechaOperacion');
            $table->string('fechaAplicacion');
            $table->string('descripcion');
            $table->string('rfcComercio');
            $table->string('poblacion');
            $table->string('monedaExtranjera');
            $table->string('montoDivisaExtranjera');
            $table->string('pesos');
            $table->string('claveMovimiento');
            $table->string('idMovimiento');
            $table->string('comisiones');
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
        Schema::dropIfExists('info_operaciones');
    }
}
