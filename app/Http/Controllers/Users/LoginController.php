<?php

namespace App\Http\Controllers\Users;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Input;
use Redirect;
use Validator;

class LoginController extends Controller
{

    static function index()
    {
        return function()
        {
            return view('auth.login');
        };
    }

    static function post()
    {
        return function()
        {

            //validaçao dos inputs
            $validation = Validator::make(Input::all(), [
                'email'     => 'required|email',
                'password'  => 'required',
            ]);

            //se validaçao falhar redirecione com erros
            if ($validation->fails())
            {
                return Redirect::back()->withErrors($validation);
            }

            try
            {
                //tenta logar o usuario
                if( ! Auth::attempt(['email' => Input::Get('email'), 'password' => Input::Get('password'), 'enable' => 1, ]) )
                {
                    throw new ModelNotFoundException(); // se o login falhar joga um erro.
                }

                return redirect('/')->with('status', 'Login realizado com sucesso.');

            }
            catch(ModelNotFoundException $error)
            {
                return Redirect::back()->WithErrors('O email e senha estão incorretos ou essa conta foi desativada.');
            }
            catch(Exception $exception)
            {
                return Redirect::back()->withErrors(['Algo deu errado, por favor tente novamente mais tarde.']);
            }
        };
    }

}
