<?php

namespace App\Http\Controllers\routes;

use App\Http\Controllers\Constats;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class HomeController extends Controller
{
    public static function index()
    {
        return function(LaravelFacebookSdk $fb, Constats $categorias){

            return view('Pages.MainPage', [
                'Categorias' => $categorias->listaCategorias(),
                'login_url'  => $fb->getLoginUrl(['email']),
            ]);
        };
    }

    public static function indexAPI()
    {
        return function (Constats $categorias)
        {
            return $categorias->listaCategorias();
        };
    }
}
