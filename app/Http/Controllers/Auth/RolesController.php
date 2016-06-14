<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\RolesModel;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    // valida a classe do usuário, passe a string conforme a classe minima que poderá acessar o recurso.
    public static function validar($roles)
    {
       // determina a classe do usuario
       $UserRole   = Auth::user()->user_roles;
       // retorna o id da classe passada na função ou middlewear da rota.
       $role       = RolesModel::getId($roles)->id;

       // se a classe do usuario for 'maior ou igual' a classe exigida retorna 'true'
       if ($role <= $UserRole) return true;
    }

}
