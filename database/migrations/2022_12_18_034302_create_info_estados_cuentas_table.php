<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoEstadosCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_estados_cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('NoCliente'); 
            $table->string('numeroEstadoCuenta'); 
            $table->string('subproducto');
            $table->string('fechaCorte');
            $table->string('numeroRegistrosOperaciones');
            $table->string('totalTimbrar');
            $table->string('Uuid');
            $table->string('Date');
            $table->string('CfdiSign');
            $table->string('SatCertNumber');
            $table->string('SatSign');
            $table->string('OriginalString');
            $table->string('urlQr');

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
        Schema::dropIfExists('info_estados_cuentas');
    }
}
