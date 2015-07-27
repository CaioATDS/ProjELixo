<?php

namespace App\Http\Controllers\Administrator;

use App\Models\ItensModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ColetaController extends Controller
{

    public static function index()
    {
        return function()
        {
            $Lixeiras = [];

            foreach (ItensModel::itemNotCollected() as $item):

                if(array_key_exists($item['modelos_id'], $Lixeiras)):

                    $Lixeiras[$item['modelos_id']]['item_quantidade'] += $item['item_quantidade'];

                else:

                    $Lixeiras[$item['modelos_id']] =
                        [
                            'modelos_id'        => $item['modelos_id'],
                            'item_quantidade'   => $item['item_quantidade'],
                        ];

                endif;

            endforeach;

            $userid      = Auth::user()->id;
            
            return view('Pages.Coleta',
                [
                    'Lixeiras'  => $Lixeiras,
                    'UserID'    => $userid,
                ]);

        };
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
