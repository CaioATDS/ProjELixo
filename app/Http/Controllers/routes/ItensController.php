<?php

namespace App\Http\Controllers\routes;

use App\Http\Controllers\Auth\RolesController;
use App\Models\ItensModel;
use App\Models\ModelosModel;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class ItensController extends Controller
{

    public static function selecionar()
    {
       return function() {

           if ( ! Auth::check()):
               return redirect('/')->with('error', 'Apenas usuários logados!');
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

                       ItensModel::create($arrData); // se o usuário ainda não selecionou ainda crie

                   elseif(ItensModel::userQuantidade($userid, $modelo[$key]) > 0):

                       ItensModel::userItemUpdate($arrData['item_userid'],$arrData['modelos_id'],$arrData['item_quantidade']); // se já selecionou apenas modifique.

                   endif;

               endif;
           }

           return redirect('/')->with('status', 'Cadastrado com sucesso!');
//           TRUNCATE TABLE public.itens RESTART IDENTITY;
       };
    }

    public static function lixeira()
    {
        return function(){

            $userid = Auth::user()->id;

            return view('Pages.Lixeira', [
                'Lixeiras'  => ItensModel::usertrash($userid),
                'UserID'    => $userid,
            ]);
        };
    }

    public static function reciclados()
    {
        return function($UserID = null){

            if( is_null($UserID) || $UserID == Auth::user()->id )
            {
                $userid = Auth::user();
            } else
            {
                if(is_null(RolesController::validar('Aluno')))
                {
                    return redirect('/')->with('error', 'Você não têm permissão para acessar aquela página!');
                } else {
                    try
                    {
                        $userid = User::where('id', $UserID)->firstOrFail();
                    } catch (Exception $e)
                    {
                        return redirect('/')->with('error', 'Usário não foi encontrado');
                    }

                }

            }

            return view('Pages.Recicleds', [
                'Lixeiras'  => ItensModel::userrecicleds($userid->id),
                'UserID'   => $userid->id
            ]);
        };
    }

    public static function modeloNome($modelid)
    {
       return ModelosModel::getDescricao($modelid);
    }

    public static function reciclar()
    {
        return function(){
            if ( ! Auth::check() || ! Input::get('modelo') ):
                return redirect('/')->with('error', 'Você não pode fazer isso!');
            endif;

            $modelo      = Input::get('modelo');
            $quantidade  = Input::get('quantidade');
            $userid      = Auth::user()->id;

            foreach($modelo as $key => $n )
            {
                if ($quantidade[$key] == 0 && ItensModel::userQuantidade($userid, $modelo[$key]) > 0):
                    ItensModel::userItemDelete($userid, $modelo[$key]);
                else:
                    ItensModel::userItemRecicle($userid, $modelo[$key], $quantidade[$key]);
                endif;
            }

            return redirect('/')->with('status', 'Material reciclado com sucesso!');

        };
    }
}
