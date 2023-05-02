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
            $table->id();
            $table->decimal('cantidad', 8, 2, true);
            $table->decimal('precio_unitario', 8, 2, true);


            $table->foreignId('ingreso_id');
            $table->foreign('ingreso_id')->references('id')->on('ingreso')->onDelete('cascade');

            $table->foreignId('insumo_id');
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
        Schema::dropIfExists('detalle_ingreso');
    }
}
