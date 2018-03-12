<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id_persona');
            $table->integer('tipodoc_id')->unsigned();
            $table->string('identificacion');
            $table->string('expedicion');
            $table->string('nombre_1');
            $table->string('nombre_2');
            $table->string('apellido_1');
            $table->string('apellido_2');
            $table->date('fecha_nacimiento');
            $table->char('edad',3);
            $table->string('telefono');
            $table->string('direccion');
            $table->integer('genero_id')->unsigned();
            $table->integer('estadocivil_id')->unsigned();
            $table->string('cabeza_familia');
            $table->integer('nivelEducativo_id')->unsigned();
            $table->integer('grupofamiliar_id')->unsigned();
            $table->integer('ocupacion_id')->unsigned();
            $table->integer('parentesco_id')->unsigned();
            $table->integer('vereda_id')->unsigned();
            $table->string('fullName');
            $table->timestamps();

            $table->foreign('tipodoc_id')->references('tipodocs_id')->on('tipo_docs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('genero_id')->references('generos_id')->on('generos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('estadocivil_id')->references('estadosciviles_id')->on('estados_civiles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nivelEducativo_id')->references('nivelesEducativos_id')->on('niveles_educativos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('grupofamiliar_id')->references('id')->on('grupos_familiares')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ocupacion_id')->references('ocupaciones_id')->on('ocupaciones')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('parentesco_id')->references('parentescos_id')->on('parentescos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vereda_id')->references('vereda_id')->on('veredas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
