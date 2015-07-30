<?php

namespace App\Http\Controllers\routes;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StaticasController extends Controller
{

    public static function parceiros()
    {

        return function()
        {
            return view('Pages.Parceiros');
        };

    }

    public static function projeto()
    {

        return function()
        {
            return view('Pages.Projeto');
        };

    }

    public static function mapa()
    {

        return function()
        {
            return view('Pages.Mapa');
        };

    }

    public static function pontos()
    {

        return function()
        {
            return view('Pages.Pontos');
        };

    }

}
