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
            $table->text('nombre');
            $table->text('ingrediente_activo')->nullable();
            $table->text('contenido_total')->nullable();
            $table->text('tipo');
            $table->text('info')->nullable();
            $table->integer('existencias');
            $table->unsignedInteger('subtipo_id')->nullable();
            $table->foreign('subtipo_id')->references('id')
                ->on('subtipo')->onDelete('cascade');
            $table->unsignedInteger('unidad_medida_id');
            $table->foreign('unidad_medida_id')->references('id')
                ->on('unidad_medida')->onDelete('cascade');
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
