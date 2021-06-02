<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nro_nota')->nullable();
            $table->string('tipo');  // Contado/credito
            $table->date('fecha');
            $table->float('total')->nullable();


            $table->unsignedInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingreso');
    }
}
