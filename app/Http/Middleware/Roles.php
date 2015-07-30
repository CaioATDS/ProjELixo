<?php

namespace App\Http\Middleware;


use App\Http\Controllers\Auth\RolesController;
use Closure;

class Roles
{

    public function handle($request, Closure $next, $roles)
    {

        // se a classe do usuario for menor retorta null e redireciona para index
        if(is_null(RolesController::validar($roles)))
        {
            return redirect('/')->with('error', 'Você não têm permissão para acessar aquela página!');
        }

        return $next($request);

    }

}
