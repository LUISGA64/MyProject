<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposFamiliares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_familiares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_ficha');
            $table->string('direccion');
            $table->string('zona');
            $table->integer('id_tipo_vivienda')->unsigned();
            $table->integer('id_material_paredes')->unsigned();
            $table->integer('id_material_pisos')->unsigned();
            $table->integer('id_material_techo')->unsigned();
            $table->integer('id_tipo_actividad')->unsigned();
            $table->integer('id_acteconomica')->unsigned();
            $table->integer('id_consumo_agua')->unsigned();
            $table->integer('id_tipo_alumbrado')->unsigned();
            $table->integer('id_elimina_excretas')->unsigned();
            $table->integer('id_aguas_servidas')->unsigned();
            $table->integer('id_vector_viviendas')->unsigned();
            $table->integer('id_riesgo_vivienda')->unsigned();
            $table->timestamps();

            $table->foreign('id_tipo_vivienda')->references('id')->on('tipos_vivienda')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_material_paredes')->references('id')->on('material_paredes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_material_pisos')->references('id')->on('material_pisos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_material_techo')->references('id')->on('materiales_techo')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tipo_actividad')->references('id')->on('tipo_actividades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_consumo_agua')->references('id')->on('consumo_agua')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tipo_alumbrado')->references('id')->on('tipos_alumbrado')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_elimina_excretas')->references('id')->on('eliminar_excretas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_aguas_servidas')->references('id')->on('aguas_servidas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_vector_viviendas')->references('id')->on('vectores_vivienda')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_riesgo_vivienda')->references('id')->on('riesgos_vivienda')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_acteconomica')->references('id')->on('actividades_economicas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos_familiares');
    }
}