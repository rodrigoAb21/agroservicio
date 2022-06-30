<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_salida', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->float('precio_unitario');
     
            $table->unsignedInteger('salida_id');
            $table->foreign('salida_id')->references('id')->on('salida')->onDelete('cascade');

            $table->unsignedInteger('insumo_id');
            $table->foreign('insumo_id')->references('id')->on('insumo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_salida');
    }
}
