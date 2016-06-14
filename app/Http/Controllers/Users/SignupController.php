<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Services\EmailController;
use App\Providers\ConstantesProvider;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exception;
use Hash;
use Illuminate\Support\Facades\Auth;
use Input;
use InvalidArgumentException;
use Redirect;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class SignupController extends Controller
{

    static function index()
    {

        return function(LaravelFacebookSdk $fb)
        {
            $login_url = $fb->getLoginUrl(['email']);
            return view('auth.register',['login_url' => $login_url,]);
        };

    }

    static function post()
    {
        return function()
        {
            try {
                //faz a validaçao dos campos de usuario
                $validar = User::validar(Input::all());

                //se avalidaçao falhar retorne com erros
                if ($validar->fails())
                    return Redirect::back()->withErrors($validar)->withInput();

                // verifica se o email ja esta cadastrado
                if (User::hasemail(Input::get('email')))
                    return Redirect::back()->withErrors('email já cadastrado.')->withInput();

                $input              = Input::all();
                $SenhaDecriptada    = $input['password'];
                $input['password']  = Hash::make($input['password']); // encripta o password
                $user               = new User();  // cria o objeto user
                $user->fill($input); // preenche as propriedades do objeto user de acordo com o imput passado pelo form
                $user->save(); // salva o novo usuario no banco de dados

                try
                {
                    $email           = new EmailController(); // enviar email
                    $email->assunto  = 'Bem-vindo ao ' .ConstantesProvider::SiteName. '!‏'; // define o titulo
                    $email->mensagem = view('email.bemvindo', [ 'email' => $user->email, 'password'  => $SenhaDecriptada, ])->render();
                    $email->enviar($user->name, $user->lastname, $user->email, $email->assunto, $email->mensagem);
                }catch (Exception $e)
                {
                    throw new InvalidArgumentException('Email não pode ser enviado');
                }

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
