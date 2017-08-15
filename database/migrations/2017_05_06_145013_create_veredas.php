<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeredas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veredas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vereda');
            $table->integer('id_resguardo')->unsigned();
            $table->timestamps();
            $table->foreign('id_resguardo')->references('id')->on('resguardos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veredas');
    }
}
