<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->increments('cargo_id');
            $table->string('cargo')->unique();
            $table->integer('resguardo_id')->unsigned();
            $table->boolean('principal');
            $table->char('prioridad',2)->unique();
            $table->timestamps();
            
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
        Schema::dropIfExists('cargos');
    }
}
