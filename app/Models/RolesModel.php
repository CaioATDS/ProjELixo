<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolesModel extends Model
{
    protected $table = 'roles';

    // seleciona a id da classe rule com base no nome passado como parametro
    static function getId($roles)
    {
        return self::where('name', $roles)->get()->first();
    }

}
