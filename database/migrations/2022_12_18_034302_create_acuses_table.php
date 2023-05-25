<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acuses', function (Blueprint $table) {
            $table->id();
            $table->string('idFactura'); 
            $table->string('Status'); 
            $table->string('Message');
            $table->string('IsCancelable');
            $table->string('Uuid');
            $table->string('RequestDate');
            $table->string('ExpirationDate');
            $table->string('AcuseXmlBase64');
            $table->string('urlAcuse');
            $table->string('CancelationDate');
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
        Schema::dropIfExists('acuses');
    }
}
