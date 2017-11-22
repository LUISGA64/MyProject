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
            $table->integer('id_tipo_doc')->unsigned();
            $table->string('identificacion');
            $table->string('nombre_1');
            $table->string('nombre_2');
            $table->string('apellido_1');
            $table->string('apellido_2');
            $table->date('fecha_nacimiento');
            $table->char('edad',3);
            $table->string('telefono');
            $table->string('direccion');
            $table->integer('id_genero')->unsigned();
            $table->integer('id_estado_civil')->unsigned();
            $table->string('cabeza_familia');
            $table->integer('id_niveleducativo')->unsigned();
            $table->integer('grupofamiliar_id')->unsigned();
            $table->integer('id_ocupacion')->unsigned();
            $table->integer('id_parentesco')->unsigned();
            $table->timestamps();

            $table->foreign('id_tipo_doc')->references('id')->on('tipo_docs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_genero')->references('id')->on('generos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_estado_civil')->references('id')->on('estados_civiles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_niveleducativo')->references('id')->on('niveles_educativos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('grupofamiliar_id')->references('id')->on('grupos_familiares')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ocupacion')->references('id')->on('ocupaciones')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_parentesco')->references('id')->on('parentescos')->onDelete('cascade')->onUpdate('cascade');
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
