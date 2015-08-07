<?php

namespace App\Http\Controllers\routes;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class StaticasController extends Controller
{

    public static function parceiros()
    {

        return function(LaravelFacebookSdk $fb)
        {
            return view('Pages.Parceiros',[ 'login_url' => $fb->getLoginUrl(['email'])]);
        };

    }

    public static function projeto()
    {

        return function(LaravelFacebookSdk $fb)
        {
            return view('Pages.Projeto',[ 'login_url' => $fb->getLoginUrl(['email'])]);
        };

    }

    public static function mapa()
    {

        return function(LaravelFacebookSdk $fb)
        {
            return view('Pages.Mapa',[ 'login_url' => $fb->getLoginUrl(['email'])]);
        };

    }

    public static function pontos()
    {

        return function(LaravelFacebookSdk $fb)
        {
            return view('Pages.Pontos',[ 'login_url' => $fb->getLoginUrl(['email'])]);
        };

    }

}
