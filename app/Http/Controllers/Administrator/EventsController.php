<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{

    public static function index()
    {
        
        return function(Auth $user)
        {
            
            return view('Pages.Eventos',[
                'name'  => $user::user()->name,
                'id'    => $user::user()->id,
                ]);
        };
        
    }

    public static function create()
    {
        return function()
        {
            return "criar evento()";
        };

    }

    public static function show()
    {
        return function()
        {
           return "mostrar evento";
        };

    }

    public static function edit()
    {
        return function()
        {
           return "edit evento";
        };
    }

    public static function remove()
    {
        return function()
        {
           return "deletar evento";
        };
    }
}
