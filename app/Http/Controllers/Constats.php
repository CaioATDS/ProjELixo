<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests;
use Redirect;

class Constats
{

    public static function listaCategorias ()
    {
        try
        {
            define('CATEGORYS', [
                [
                    'categoria_id'           => 5,
                    'categorias_descricao'   => 'Baterias, Pilhas e Nobreaks',
                    'imagem'                 => 'bateria.png',
                ],
                [
                    'categoria_id'          => 6,
                    'categorias_descricao'  => 'Cabos & Fios',
                    'imagem'                => 'cabos.png',
                ],
                [
                    'categoria_id'          => 7,
                    'categorias_descricao'  => 'Celulares & Tablets',
                    'imagem'                => 'celular.png',
                ],
                [
                    'categoria_id'          => 2,
                    'categorias_descricao'  => 'Computadores & Notebooks',
                    'imagem'                => 'computador.png',
                ],
                [
                    'categoria_id'          => 8,
                    'categorias_descricao'  => 'Diversos',
                    'imagem'                => 'diversos.png',
                ],
                [
                    'categoria_id'          => 9,
                    'categorias_descricao'  => 'Eletro Doméstico',
                    'imagem'                => 'eletro-domestico.png',
                ],
                [
                    'categoria_id'          => 10,
                    'categorias_descricao'  => 'Equipamentos De Informática',
                    'imagem'                => 'informatica.png',
                ],
                [
                    'categoria_id'          => 4,
                    'categorias_descricao'  => 'Impressoras & Copiadora',
                    'imagem'                => 'impressora.png',
                ],
                [
                    'categoria_id'          => 3,
                    'categorias_descricao'  => 'Monitores',
                    'imagem'                => 'monitor.png',
                ],
                [
                    'categoria_id'          => 1,
                    'categorias_descricao'  => 'Televisores',
                    'imagem'                => 'televisao.png',
                ],
            ]);

            return CATEGORYS;

        } catch (Exception $ex ) {
            return Redirect::back()->withErrors('error', 'Houve um problema inesperado.' . $ex->getMessage());
        }

    }
}
