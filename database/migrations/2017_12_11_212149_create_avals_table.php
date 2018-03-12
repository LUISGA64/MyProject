<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avals', function (Blueprint $table) {
            $table->increments('avals_id');
            $table->integer('persona_id')->unsigned();
            $table->integer('resguardo_id')->unsigned();
            $table->string('detalle');
            $table->date('vigencia');
            $table->string('formato');
            $table->string('cargoAspirante');
            $table->string('entidadSolicita');
            $table->timestamps();


            $table->foreign('persona_id')->references('id_persona')->on('personas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('resguardo_id')->references('id')->on('resguardos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avals');
    }
}
