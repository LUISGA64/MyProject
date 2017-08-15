<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoActividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_actividad');
            $table->integer('id_actividad_economica')->unsigned();
            $table->timestamps();

            $table->foreign('id_actividad_economica')->references('id')->on('actividades_economicas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_actividades');
    }
}
