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
            $table->string('nombre');
            $table->date('fecha_siembra')->nullable();
            $table->date('fecha_cosecha')->nullable();
            $table->string('cultivo');
            $table->softDeletes();

            $table->unsignedInteger('campo_id');
            $table->foreign('campo_id')->references('id')->on('campo');
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
