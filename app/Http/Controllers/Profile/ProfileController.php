<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Auth\RolesController;
use App\Models\RolesModel;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class ProfileController extends Controller
{

    public static function index()
    {

       return function($UserID = null)
       {

           try
           {
               if( is_null($UserID) || $UserID == Auth::user()->id )
               {
                   $user = Auth::user();
               }
               else
               {
                   if(is_null(RolesController::validar('Admin')))
                   {
                       return redirect('/')->with('error', 'Você não têm permissão para acessar aquela página!');
                   } else {
                       try
                       {
                           $user = User::where('id', $UserID)->firstOrFail();
                       } catch (Exception $e)
                       {
                           return redirect('/')->with('error', 'Usário não foi encontrado');
                       }

                   }

               }
           }
           catch (Exception $e)
           {
               return redirect('/')->with('error', 'Ocorreu um erro');
           }

           return view('Pages.Profile', [
                                'UserId'        => $user->id,
                                'UserName'      => $user->name,
                                'UserLastname'  => $user->lastname,
                                'UserEmail'     => $user->email,
                                'UserRole'      => RolesModel::getName($user->user_roles),
           ]);
       };
    }

}
