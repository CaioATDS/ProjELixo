<?php
use Illuminate\Support\Facades\Auth;
?>
@include('Components.Partials.Layout.HeaderPage')
@include('auth.LoginModal')
@include('Errors.Geral')

    <div class="jumbotron">



    </div>
@if( ! Auth::check())

    <div class="row">

        <div class="col-md-3">

        </div>

        <div class="form-group padding-rl-10 col-md-3 btn-center text-center">
            <button id="entrar" style="width: 270px" type="submit" class="btn btn-success">
                <i class="fa fa-envelope"></i> &nbsp;Entre Com Seu E-mail
            </button>
        </div>

        <div class="form-group padding-rl-10 col-md-3 btn-center text-center">
            <a style="width: 270px" class="btn btn-primary" href="{{$login_url}}" role="button">
                <i class="fa fa-facebook-square"></i> &nbsp;Entre Com Facebook
            </a>
        </div>

        <div class="col-md-3">

        </div>

    </div>

@endif

    <h3 class="text-center">
        <span>Escolha o tipo de material a ser reciclado:</span>
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

