<?php

namespace App\Http\Controllers\routes;

use App\ItensModel;
use App\modelosModel;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class ItensController extends Controller
{

    public static function selecionar()
    {
       return function() {

           if ( ! Auth::check()):
               dd('Apenas usuários logados');
           endif;

           $modelo      = Input::get('modelo');
           $quantidade  = Input::get('quantidade');
           $userid      = Auth::user()->id;

           foreach($modelo as $key => $n )
           {
               if ($modelo[$key] == 0 || $quantidade[$key] == 0):

               else:
               $arrData = [
                   'modelos_id'         => $modelo[$key],
                   'item_quantidade'    => $quantidade[$key],
                   'item_userid'        => $userid,
               ];
               $create = ItensModel::create($arrData);
               endif;
           }

           return 'its done $create';
//           TRUNCATE TABLE public.itens RESTART IDENTITY;
       };
    }

    public static function lixeira()
    {
        return function(){

            $userid = Auth::user()->id;

            return view('Pages.Lixeira', [
                'Lixeiras' => ItensModel::usertrash($userid),
            ]);
        };
    }

    public static function modeloNome($modelid)
    {
       return modelosModel::getDescricao($modelid);
    }

    public static function modeloQuantidade($modelid)
    {
        return ItensModel::userQuantidade(Auth::user()->id, $modelid);
    }

}
