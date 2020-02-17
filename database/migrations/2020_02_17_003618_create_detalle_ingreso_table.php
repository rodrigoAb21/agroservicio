<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->float('precio_unitario');
            $table->unsignedInteger('insumo_id');
            $table->unsignedInteger('ingreso_id');
            $table->foreign('insumo_id')->references('id')->on('insumo')->onDelete('cascade');
            $table->foreign('ingreso_id')->references('id')->on('ingreso')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ingreso');
    }
}
