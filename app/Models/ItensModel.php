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

// contar itens na lixeira ou itens ja confirmados na lixeira
    static function count($ItemUserId, $status = null)
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

// selecionar itens que já foram reciclados pelo usuário
    static function userrecicleds($userid)
    {
        return self::
                    where('item_userid',$userid)
                        ->where('item_status', 1)
                        ->paginate(10);
    }

// Quantidade de itenns na lixeira
    static function userQuantidade($userid, $modelid, $status = null)
    {
        return self::
                    where('modelos_id', $modelid)
                    ->where('item_userid',$userid)
                    ->where('item_status', (isset($status)) ? $status : 0)
                    ->value('item_quantidade');
    }

// atualiza a quantidade de itens na lixeira
    static function userItemUpdate($userid, $modelid, $quantidade)
    {
        return self::
                    where('modelos_id', $modelid)
                    ->where('item_userid',$userid)
                    ->where('item_status', 0)
                    ->update(['item_quantidade' => $quantidade]);
    }

// atualiza a quantidade de itens na lixeira
    static function itemAsColected($modelid, $ItemUserid)
    {
        return self::
                    where('modelos_id', $modelid)
                        ->where('item_userid', $ItemUserid)
                        ->where('item_colected', 0)
                        ->update(['item_colected' => 1]);
    }

    // confirma itens da lixeira
    static function userItemRecicle($userid, $modelid, $quantidade)
    {
        return self::
                    where('modelos_id', $modelid)
                        ->where('item_userid',$userid)
                        ->where('item_status', 0)
                        ->update(['item_quantidade' => $quantidade, 'item_status' => 1, ]);
    }

    // deleta itens da lixeira
    static function userItemDelete($userid, $modelid)
    {
        return self::
                    where('modelos_id', $modelid)
                        ->where('item_userid',$userid)
                        ->where('item_status', 0)
                        ->delete();
    }

// listar itens para serem coletados
    static function itemNotCollected()
    {
        return self::
                    where('item_status', 1)
                        ->where('item_colected', 0 )
                        ->orderBy('modelos_id', 'asc')
                        ->get()->toArray();
    }

// listar itens para serem coletados
    static function itemCollected()
    {
        return self::
                    where('item_colected', 1 )
                    ->orderBy('modelos_id', 'asc')
                    ->paginate(10);
    }
}
