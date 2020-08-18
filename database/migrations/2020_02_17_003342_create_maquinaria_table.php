<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaquinariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinaria', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre');
            $table->text('descripcion')->nullable();
            $table->text('marca')->nullable();
            $table->text('color')->nullable();
            $table->text('propiedad')->nullable();
            $table->text('modelo')->nullable();
            $table->text('foto')->nullable();
            $table->unsignedInteger('tipom_id');
            $table->foreign('tipom_id')->references('id')
                ->on('tipom')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maquinaria');
    }
}
