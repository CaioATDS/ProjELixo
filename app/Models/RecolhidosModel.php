<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecolhidosModel extends Model
{

    protected $table = 'recolhidos';

    protected $fillable = [
        'modelos_id',
        'item_quantidade',
        'item_userid',
        'coleta_codigo',
    ];

}
