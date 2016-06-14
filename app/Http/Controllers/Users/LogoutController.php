<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{

    static function logout()
    {

       return function()
       {
           Auth::logout();

           return redirect('/')->with('status', 'Sessão finalizada com sucesso');

       };

    }

}
