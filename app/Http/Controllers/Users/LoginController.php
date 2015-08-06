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
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;
use Session;
use Validator;

class LoginController extends Controller
{

    static function index()
    {
        return function(LaravelFacebookSdk $fb)
        {
            $login_url = $fb->getLoginUrl(['email']);
            return view('auth.login',['login_url' => $login_url,]);
        };
    }

    static function post()
    {
        return function()
        {

            // Set logim attempts and login time
            $loginAttempts    = env('LOGIN_ATTEMPTS');
            $MaxLoginAttempts = env('LOGIN_ATTEMPTS');
            $AttemptTimeLimit = env('LOGIN_ATTEMPTS_DEADTIME');

            // if session has login attempts, retrieve attempts counter and attempt time
            if (Session::has('loginAttempts'))
            {
                $loginAttempts    = Session::get('loginAttempts');
                $loginAttemptTime = Session::get('loginAttemptTime');

                // If time is > 10 min, reset attempts
                if (time() - $loginAttemptTime > $AttemptTimeLimit)
                {

                    Session::put('loginAttempts', 1);
                    Session::put('loginAttemptTime',time());

                }

                // if attempts > 3 and time < 10 minutes
                if ($loginAttempts > $MaxLoginAttempts && (time() - $loginAttemptTime <= $AttemptTimeLimit))
                    return Redirect::back()->WithErrors('Você excedeu o limite de tentativas de login, por favor volte mais tarde.');

            }

            //validaçao dos inputs
            $validation = Validator::make(Input::all(), [
                'email'     => 'required|email',
                'password'  => 'required',
            ]);

            //se validaçao falhar redirecione com erros
            if ($validation->fails())
                return Redirect::back()->withErrors($validation);

            try
            {
                //tenta logar o usuario
                if( ! Auth::attempt(['email' => Input::Get('email'), 'password' => Input::Get('password'), 'enable' => 1, ]) )
                {
                    Session::put('loginAttempts',$loginAttempts+1);
                    Session::put('loginAttemptTime',time());
                    throw new ModelNotFoundException(); // se o login falhar joga um erro.
                }

                return redirect('/')->with('status', 'Login realizado com sucesso.');
            }
            catch(ModelNotFoundException $error)
            {
                return redirect('/User/Entrar')->WithErrors(($loginAttempts < $MaxLoginAttempts) ?  'O email e senha estão incorretos.' : 'Essa é sua última tentativa de login, sua conta poderá ser bloqueada.');
            }
            catch(Exception $exception)
            {
                return Redirect::back()->withErrors(['Algo saiu errado, por favor tente novamente mais tarde.']);
            }
        };
    }

}
