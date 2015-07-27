<?php

namespace App\Http\Controllers\routes;

use App\Models\CategoriasModel;
use App\Models\modelosModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubCategoriasController extends Controller
{
    public static function index()
    {
        return function($id){

            $details = CategoriasModel::getById($id);
            $modelos = modelosModel::getById($id);

            return view('Pages.Subcat', [
                'Pid'       => $details->categorias_descricao,
                'Modelos'   => $modelos,
                'UserID'    => Auth::user()->id,
            ]);
        };
    }
}
