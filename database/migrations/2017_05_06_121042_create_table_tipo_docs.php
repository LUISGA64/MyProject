<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTipoDocs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_docs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_doc')->unique();
            $table->string('tipo_documento');
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
        Schema::dropIfExists('tipo_docs');
    }
}
