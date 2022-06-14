<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('tipo');
            $table->text('composicion')->nullable();
            $table->string('envase')->nullable();
            $table->float('existencias');
            $table->string('info')->nullable();

            $table->unsignedInteger('unidad_medida_id');
            $table->foreign('unidad_medida_id')->references('id')->on('unidad_medida')->onDelete('cascade');
            $table->unsignedInteger('subtipo_id');
            $table->foreign('subtipo_id')->references('id')->on('subtipo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insumo');
    }
}
