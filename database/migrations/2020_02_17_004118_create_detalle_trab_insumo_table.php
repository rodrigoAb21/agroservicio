<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleTrabInsumoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_trab_insumo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->float('costo');
            $table->unsignedInteger('trabajo_id');
            $table->unsignedInteger('insumo_id');
            $table->foreign('trabajo_id')->references('id')->on('trabajo')->onDelete('cascade');
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
        Schema::dropIfExists('detalle_trab_insumo');
    }
}
