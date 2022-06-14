<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComposicionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composicion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ingrediente_activo');
            $table->string('concentracion')->nullable();

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
        Schema::dropIfExists('composicion');
    }
}
