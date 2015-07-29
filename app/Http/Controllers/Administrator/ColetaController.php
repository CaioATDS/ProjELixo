<?php

namespace App\Http\Controllers\Administrator;

use App\Models\ColetasModel;
use App\Models\ItensModel;
use App\Models\RecolhidosModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Input;

class ColetaController extends Controller
{

    public static function index()
    {
        return function()
        {
            $Lixeiras = [];

            foreach (ItensModel::itemNotCollected() as $item):

                if(array_key_exists($item['modelos_id'], $Lixeiras)):

                    $Lixeiras[$item['modelos_id']]['item_quantidade'] += $item['item_quantidade'];

                else:

                    $Lixeiras[$item['modelos_id']] =
                        [
                            'modelos_id'        => $item['modelos_id'],
                            'item_quantidade'   => $item['item_quantidade'],
                            'item_userid'       => $item['item_userid'],
                    ];

                endif;

            endforeach;

            $userid      = Auth::user()->id;

            return view('Pages.Coleta',
                [
                    'Lixeiras'  => $Lixeiras,
                    'UserID'    => $userid,
                ]);

        };
    }

    public static function store()
    {
        return function()
        {


            if ( ! Auth::check()):
                return redirect('/')->with('error', 'Apenas usuários logados!');
            endif;

            $Modelo         = Input::get('modelo');
            $Quantidade     = Input::get('quantidade');
            $ItemUserid     = Input::get('item_userid');
            $UserID         = Auth::user()->id;

            $ColetaCodigo   = ColetasModel::create([ 'user_codigo' => $UserID, 'empresa_codigo' =>666, ])->id; // registra a nova coleta no DB


            foreach($Modelo as $key => $n )
            {

                $ArrData = [
                    'modelos_id'         => $Modelo[$key],
                    'item_quantidade'    => $Quantidade[$key],
                    'item_userid'        => $UserID,
                    'coleta_codigo'      => $ColetaCodigo,
                ];

                $create     = RecolhidosModel::create($ArrData); // registra os detalhes da coleta
                $asColected = ItensModel::itemAsColected($Modelo[$key], $ItemUserid[$key]);

            }

            return redirect('/')->with('status', 'Cadastrado com sucesso!');

        };
    }

}
