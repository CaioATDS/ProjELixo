<?php

namespace App\Http\Controllers\routes;

use App\ItensModel;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class ItensController extends Controller
{

    public static function selecionar()
    {
       return function() {

           $modelo      = Input::get('modelo');
           $quantidade  = Input::get('quantidade');

           foreach($modelo as $key => $n )
           {

               $arrData = [
                   'modelos_id'         => $modelo[$key],
                   'item_quantidade'    => $quantidade[$key],
                   'item_userid'        => Auth::user()->id,
               ];
               $create = ItensModel::create($arrData);
           }


           return 'its done $create';

       };
    }

}
