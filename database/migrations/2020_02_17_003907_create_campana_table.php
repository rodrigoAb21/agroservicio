<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campana', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre');
            $table->date('fecha_ini');
            $table->date('fecha_fin');


            $table->unsignedInteger('terreno_id');
            $table->foreign('terreno_id')->references('id')->on('terreno')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campana');
    }
}
