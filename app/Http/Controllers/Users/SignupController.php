<?php

namespace App\Http\Controllers\Users;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Support\Facades\Auth;
use Input;
use Redirect;
use Validator;

class SignupController extends Controller
{

    static function index()
    {

        return function()
        {
            return view('auth.register');
        };

    }

    static function post()
    {
        return function()
        {
            try {
                //faz a validaçao dos campos de usuario
                $Validator = Validator::make(Input::all(), [
                    'name' => 'required|alpha',
                    'email' => 'required|email',
                    'password' => 'required|min:5',
                    'password_confirmation' => 'required|min:5',
                ]);

                //se avalidaçao falhar retorne com erros
                if ($Validator->fails()) {
                    return Redirect::back()->withErrors($Validator)->withInput();
                }

                // verifica se o email ja esta cadastrado
                if (User::hasemail(Input::get('email'))) {
                    return Redirect::back()->withErrors('email já cadastrado.')->withInput();
                }

                $input = Input::all();
                $input['password'] = Hash::make($input['password']); // encripta o password
                $user = new User();  // cria o objeto user
                $user->fill($input); // preenche as propriedades do objeto user de acordo com o imput passado pelo form

                $user->save();
                }
                catch (Exception $e)
                {
                    return redirect('/')->with('error', 'Ocorreu um erro');
                }

            // tentativa de logar o novo usuario
            if( Auth::attempt((['email' => $user->email, 'password' => Input::get('password')])) )
                return redirect('/')->with('status', 'Cadastro realizado com sucesso');
            else
                return redirect('/User/Entrar')->with('status', 'Cadastro realizado com sucesso. Você já pode entrar usando seus dados.');

        };
    }
}
