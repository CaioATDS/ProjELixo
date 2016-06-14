<?php

namespace App\Http\Controllers\Users;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public static function index()
    {

        return function()
        {
            return view('Pages.UsersList',[
                        'Users' => User::orderBy('id', 'asc')->paginate(10),
            ]);
        };

    }

}