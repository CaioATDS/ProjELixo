<?php

namespace App\Http\Controllers;

use Socialite;

class FacebookController extends Controller
{

    public static function login()
    {
        return Socialite::with('facebook')->redirect();
    }

    public static function pageFacebook()
    {
        try
        {
            $user = Socialite::with('facebook')->user();
            echo response()->json($user);

        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }

    }

}