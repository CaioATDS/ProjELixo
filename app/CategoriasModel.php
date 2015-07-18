<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriasModel extends Model
{
    protected $table = 'categorias';

    static function getList()
    {
        return self::orderby('categorias_descricao')->get();
    }

    static function getById($productId)
    {
        return self::where('categoria_id', $productId)->get()->first();
    }

}
