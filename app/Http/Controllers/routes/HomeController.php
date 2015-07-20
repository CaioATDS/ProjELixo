<?php

namespace App\Http\Controllers\routes;

use App\CategoriasModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public static function index()
    {
        return function(){

            return view('Pages.MainPage', [
                'Categorias' => CategoriasModel::getList(),
            ]);
        };
    }
}
