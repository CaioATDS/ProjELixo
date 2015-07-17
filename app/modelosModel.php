<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelosModel extends Model
{
    protected $table = 'modelos';

    static function getById($categoriaId)
    {
        return self::where('categoria_id', $categoriaId)->orderBy('modelo_descricao', 'asc')->get();
    }
}