<?php

namespace App\Http\Controllers\routes;

use App\CategoriasModel;
use App\modelosModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
            ]);
        };
    }
}
