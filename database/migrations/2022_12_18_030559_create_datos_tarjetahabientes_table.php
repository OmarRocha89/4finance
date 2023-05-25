<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosTarjetahabientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('datos_tarjetahabientes', function (Blueprint $table) {
            $table->id();
            $table->string('NoCliente'); 
            $table->string('numeroEstadoCuenta'); 
            $table->string('nombre');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('calle');
            $table->string('numeroExterior');
            $table->string('numeroInterior');
            $table->string('colonia');
            $table->string('delMunicipio');
            $table->string('estado');
            $table->string('cp');
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
        Schema::dropIfExists('datos_tarjetahabientes');
    }
}
