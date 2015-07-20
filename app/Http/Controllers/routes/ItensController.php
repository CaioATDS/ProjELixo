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
use Response;

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
               if ($quantidade[$key] == 0 && ItensModel::userQuantidade($userid, $modelo[$key]) > 0):

                   ItensModel::userItemDelete($userid, $modelo[$key]); // delete itens quando a quantidade selecionada for 0

               elseif ($modelo[$key] == 0 || $quantidade[$key] == 0):
                    /* do nothing just watch and dance <_< */
               else:
                   $arrData = [
                       'modelos_id'         => $modelo[$key],
                       'item_quantidade'    => $quantidade[$key],
                       'item_userid'        => $userid,
                   ];

                   if(ItensModel::userQuantidade($userid, $modelo[$key]) == 0):

                       ItensModel::create($arrData); // se não selecionou ainda crie

                   elseif(ItensModel::userQuantidade($userid, $modelo[$key]) > 0):

                       ItensModel::userItemUpdate($arrData['item_userid'],$arrData['modelos_id'],$arrData['item_quantidade']); // se já selecionou apenas modifique.

                   endif;

               endif;
           }

           return Response::json('Cadastrado com sucesso.');
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
