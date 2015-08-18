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
        //
    }


    public static function store(Request $request)
    {
        //
    }

    public static function show($id)
    {
        //
    }

    public static function edit($id)
    {
        //
    }

    public static function destroy($id)
    {
        //
    }
}
