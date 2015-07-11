<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresas extends Migration
{
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('empresa_codigo');
            $table->string('empresa_nome');
            $table->timestamp('empresa_inicio');
            $table->timestamp('empresa_fim');
            $table->string('empresa_cnpj');
        });
    }

    public function down()
    {
        Schema::drop('empresas');
    }
}
