<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('nro_nota')->nullable();
            $table->string('tipo');
            $table->decimal('total', 8, 2, true);

            $table->foreignId('destinatario_id');
            $table->foreign('destinatario_id')->references('id')->on('destinatario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salida');
    }
}
