<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categorias extends Migration
{
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('categoria_id');
            $table->string('categorias_descricao');
        });
    }

    public function down()
    {
        Schema::drop('categorias');
    }
}
