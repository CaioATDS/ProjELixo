<?php

namespace App\Http\Controllers\routes;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public static function index()
    {
        return function(){
            $username = Auth::check() ? Auth::user()->name : null;
            return view('Pages.MainPage', [
                'username' => $username,
            ]);
        };
    }
}
