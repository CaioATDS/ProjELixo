<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItensModel extends Model
{
    protected $table = 'itens';

    protected $fillable = [
                            'modelos_id',
                            'item_quantidade',
                            'item_userid',
                          ];

    static function count($ItemUserId, $status = null) // contar itens na lixeira ou itens ja confirmados na lixeira
    {
        return self::
                    where('item_userid', $ItemUserId)
                    ->where('item_status', (isset($status)) ? $status : 0)
                    ->count();
    }

    static function usertrash($userid)
    {
        return self::
                    where('item_userid',$userid)
                    ->where('item_status', 0)
                    ->get();
    }

    static function userrecicleds($userid) // itens que já foram reciclados pelo usuário
    {
        return self::
                    where('item_userid',$userid)
                        ->where('item_status', 1)
                        ->get();
    }

    static function userQuantidade($userid, $modelid, $status = null) // Quantidade de itenns na lixeira
    {
        return self::
                    where('modelos_id', $modelid)
                    ->where('item_userid',$userid)
                    ->where('item_status', (isset($status)) ? $status : 0)
                    ->value('item_quantidade');
    }

    static function userItemUpdate($userid, $modelid, $quantidade) // atualiza a quantidade de itens na lixeira
    {
        return self::
                    where('modelos_id', $modelid)
                    ->where('item_userid',$userid)
                    ->where('item_status', 0)
                    ->update(['item_quantidade' => $quantidade]);
    }

    static function userItemRecicle($userid, $modelid, $quantidade) // confirma itens da lixeira
    {
        return self::
                    where('modelos_id', $modelid)
                        ->where('item_userid',$userid)
                        ->where('item_status', 0)
                        ->update(['item_quantidade' => $quantidade, 'item_status' => 1, ]);
    }

    static function userItemDelete($userid, $modelid) // deleta itens da lixeira
    {
        return self::
                    where('modelos_id', $modelid)
                        ->where('item_userid',$userid)
                        ->where('item_status', 0)
                        ->delete();
    }

}
