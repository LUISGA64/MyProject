<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResguardos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resguardos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('resguardo');
            $table->string('tipo_doc');
            $table->string('identificacion');
            $table->string('pueblo');
            $table->string('resolucion');
            $table->string('direccion_resg');
            $table->string('jurisdiccion');
            $table->string('logo_resg');
            $table->string('email_resg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resguardos');
    }
}
