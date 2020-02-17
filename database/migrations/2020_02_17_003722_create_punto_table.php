<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punto', function (Blueprint $table) {
            $table->increments('id');
            $table->double('lat');
            $table->double('lng');

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
        Schema::dropIfExists('punto');
    }
}