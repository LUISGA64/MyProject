<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegrantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrantes', function (Blueprint $table) {
            $table->increments('integrantes_id');
            $table->string('integrante');
            $table->string('identificacion');
            $table->integer('tipodoc_id')->unsigned();
            $table->integer('cargo_id')->unsigned();
            $table->integer('vigencia_inicio');
            $table->timestamps();

            $table->foreign('tipodoc_id')->references('tipodocs_id')->on('tipo_docs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cargo_id')->references('cargo_id')->on('cargos')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integrantes');
    }
}
