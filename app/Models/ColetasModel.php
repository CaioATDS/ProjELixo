<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColetasModel extends Model
{
    protected $table = 'coletas';

    protected $fillable = [
        'user_codigo',
        'empresa_codigo',
    ];
}
