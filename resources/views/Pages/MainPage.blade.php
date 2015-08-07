<?php
use Illuminate\Support\Facades\Auth;
?>
@include('Components.Partials.Layout.HeaderPage')
@include('auth.LoginModal')
@include('Errors.Geral')

    <h3 class="text-center">
        <span>Qual material precisa ser reciclado?</span>
    </h3>

    <div class="row row-centered padding-tb-10">
        @foreach($Categorias as $Categoria)

            <div class="col-md-3 col-xs-6 col-centered">

                <div class="expanded-wrapper">

                    <div class="middle-content text-center radius-5">
                        <a class="middle-content" href="{{asset('Subcategoria/'.$Categoria->categoria_id)}}">
                            <span class="padding-all-10">{{$Categoria->categorias_descricao}}</span>
                        </a>
                    </div>

                </div>

            </div>

        @endforeach
    </div>

@include('Components.Partials.Layout.BottomPage')

