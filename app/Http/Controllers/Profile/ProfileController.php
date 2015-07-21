<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public static function index()
    {

       return function()
       {
           return view('Pages.Profile', [
                                'UserId'        => Auth::user()->id,
                                'UserName'      => Auth::user()->name,
                                'UserLastname'  => Auth::user()->lastname,
                                'UserEmail'     => Auth::user()->email,
           ]);
       };
    }

}
