<?php
use Illuminate\Support\Facades\Auth;
?>
@include('Components.Partials.Layout.HeaderPage')
@include('auth.LoginModal')
@include('Errors.Geral')

    <h3 class="text-center">
        <span>O que você precisa reciclar?</span>
    </h3>

    <div class="row row-centered padding-tb-10 grid-main"  style="">
        @foreach($Categorias as $Categoria)

            <div class="col-md-3 col-sm-4 col-xs-6 col-centered">

                <div class="expanded-wrapper">

                    <div class="middle-content text-center radius-5">
                        <a class="link-content" href="{{asset('Subcategoria/'.$Categoria['categoria_id'])}}" style="display: block">

                            <span>
                                <img src="{{asset('/images/categorias/'.$Categoria['imagem'])}}" alt="" style="height: 110px">
                            </span>
                            <span class="cat-titulo"> {{$Categoria['categorias_descricao']}}</span>

                        </a>
                    </div>

                </div>

            </div>

        @endforeach
    </div>

@include('Components.Partials.Layout.BottomPage')

