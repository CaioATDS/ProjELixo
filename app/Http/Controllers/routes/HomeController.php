<?php

namespace App\Http\Controllers\routes;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\CategoriasModel;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class HomeController extends Controller
{
    public static function index()
    {
        return function(LaravelFacebookSdk $fb, CategoriasModel $categorias){

            return view('Pages.MainPage', [
                'Categorias' => $categorias->getList(),
                'login_url'  => $fb->getLoginUrl(['email']),
            ]);
        };
    }
}
