<?php

namespace App\Http\Controllers\routes;

use App\Models\CategoriasModel;
use App\Models\ModelosModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubCategoriasController extends Controller
{
    public static function index()
    {
        return function($id){

            $details = CategoriasModel::getById($id);
            $modelos = ModelosModel::getById($id);

            return view('Pages.Subcat', [
                'Pid'       => $details->categorias_descricao,
                'Modelos'   => $modelos,
                'UserID'    => Auth::user()->id,
            ]);
        };
    }
}
