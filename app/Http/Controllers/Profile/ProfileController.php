<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Auth\RolesController;
use App\Models\RolesModel;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;

class ProfileController extends Controller
{

    // seleciona e exibe os detalhes do usuário
    static function index()
    {

       return function($UserID = null)
       {

           try
           {
               if( is_null($UserID) || $UserID == Auth::user()->id )
               {
                   $user = Auth::user();
               }
               else
               {
                   if($UserID != Auth::user()->id && is_null(RolesController::validar('Aluno')))
                   {
                       return redirect('/')->with('error', 'Você não têm permissão para acessar aquela página!');
                   } else {
                       try
                       {
                           $user = User::where('id', $UserID)->firstOrFail();
                       } catch (Exception $e)
                       {
                           return redirect('/')->with('error', 'Usário não foi encontrado');
                       }

                   }

               }
           }
           catch (Exception $e)
           {
               return redirect('/')->with('error', 'Ocorreu um erro');
           }

           return view('Pages.Profile', [
                'UserId'        => $user->id,
                'UserName'      => $user->name,
                'UserLastname'  => $user->lastname,
                'UserEmail'     => $user->email,
                'UserRole'      => RolesModel::getName($user->user_roles),
           ]);
       };
    }

    // modifica o userprofile
    static function update()
    {

        return function()
        {
            try
            {

                // faz a validaçao dos campos de usuario
                $validar = User::validar(Input::all());

                // se o id passado pelo form for diferente do usuario logado, e a classe do user logado for diferente de admin return false
                if(Input::get('id') != Auth::user()->id && is_null(RolesController::validar('Admin')))
                    return Redirect::back()->withErrors('Voce nao tem permissao para isso.')->withInput();

                // se avalidaçao falhar retorne com erros
                if ($validar->fails())
                    return Redirect::back()->withErrors($validar)->withInput();

                // verifica se o email ja esta cadastrado
                if (User::hasemail(Input::get('email')))
                    return Redirect::back()->withErrors('email já cadastrado.')->withInput();

                // seleciona o usuario na base dados
                $user = User::where('id', Input::get('id'))->firstOrFail();

                if($user)
                {
                    $user->fill($validar);
                    $user->save();
                }

            } catch (Exception $e)
            {
                return Redirect::back()->withErrors('Algo saiu errado.')->withInput();
            }

            return redirect('/Perfil')->with('status', 'Perfil Atualizado com sucesso');
        };

    }

//    trocar senha
    static function updatepassword()
    {

        return function()
        {

            try
            {
                // faz a validaçao dos campos senha e confirmar senha
                $validar = User::validar(Input::all());
                if ($validar->fails())
                    return Redirect::back()->withErrors($validar)->withInput();

                // seleciona o usuario na base dados
                $user = User::where('id', Input::get('id'))->firstOrFail();
                if($user)
                {
                    $user->fill($validar);
                    $user->save();
                }

            } catch (Exception $e)
            {
                return Redirect::back()->withErrors('Algo saiu errado.')->withInput();
            }

            return redirect('/Perfil')->with('status', 'Perfil Atualizado com sucesso');

        };

    }

}
