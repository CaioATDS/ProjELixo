<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ItensModel extends Model
{
    protected $table = 'itens';

    protected $fillable = [
                            'modelos_id',
                            'item_quantidade',
                            'item_userid',
    ];

    static function count($ItemUserId)
    {
        return self::
                    where('item_userid', $ItemUserId)
                    ->where('item_status', 0)
                    ->count();
    }

    static function usertrash($userid)
    {
        return self::
                    where('item_userid',$userid)
                    ->where('item_status', 0)
                    ->get();
    }

    static function userQuantidade($userid, $modelid)
    {
        return self::
                    where('modelos_id', $modelid)
                    ->where('item_userid',$userid)
                    ->where('item_status', 0)
                    ->value('item_quantidade');
    }

    static function userItemUpdate($userid, $modelid, $quantidade)
    {
        return self::
                    where('modelos_id', $modelid)
                    ->where('item_userid',$userid)
                    ->where('item_status', 0)
                    ->update(['item_quantidade' => $quantidade]);
    }

    static function userItemDelete($userid, $modelid)
    {
        return self::
        where('modelos_id', $modelid)
            ->where('item_userid',$userid)
            ->where('item_status', 0)
            ->delete();
    }

}
