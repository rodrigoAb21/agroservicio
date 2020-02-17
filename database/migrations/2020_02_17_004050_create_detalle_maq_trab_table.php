<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleMaqTrabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_maq_trab', function (Blueprint $table) {
            $table->increments('id');
            $table->float('costo');

            $table->unsignedInteger('trabajo_id');
            $table->unsignedInteger('maquinaria_id');
            $table->foreign('trabajo_id')->references('id')->on('trabajo')->onDelete('cascade');
            $table->foreign('maquinaria_id')->references('id')->on('maquinaria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_maq_trab');
    }
}
