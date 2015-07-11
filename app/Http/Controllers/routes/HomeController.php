<?php

namespace App\Http\Controllers\routes;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
