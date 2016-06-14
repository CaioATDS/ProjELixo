<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Modelos extends Migration
{

    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->increments('modelo_id');
            $table->string('modelo_descricao');
            $table->integer('modelo_peso');
            $table->integer('categoria_id');
        });
    }

    public function down()
    {
        Schema::drop('modelos');
    }
}
