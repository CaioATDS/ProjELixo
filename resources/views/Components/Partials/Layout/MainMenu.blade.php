<?php
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;
use Illuminate\Support\Facades\Auth;
?>
<style>
    .logo-toledo{
        display: inline;
        max-width: 100%;
        max-height: 50px;
    }
    .logo-aguia{
        display: none;
        max-width: 50px;
    }
    .logo-title{
        padding-left: 15px;
        margin: 0;
        color: #ffffff !important;
        border-color: transparent;
        white-space: nowrap;
        vertical-align: middle;
        line-height: 48px;
    }
    .e-navbar{
        background: none;
        border: none;
    }
    .logo-link:hover,
    .logo-link:active{
        text-decoration: none;
    }
    @media (max-width:767px) {
        .navbar-right {
            margin-right: -15px !important;
        }
        .logo-toledo{
            display: none;
        }
        .logo-aguia{
            display: inline;
        }
    }
</style>
<div class="jumbotron jumbotron-main">
    <div class="col-xs-6 text-left">
        <a href="{{asset('/')}}" class="logo-link">
        <div style="display: inline-flex">
            <img src="{{asset('images/logos/e-lixo-logo.png')}}" alt="logo-e-Lixo-toledo" style="max-width: 50px; max-height: 50px;vertical-align: middle;">
            <h1 class="logo-title">e-Lixo</h1>
        </div>
        </a>
    </div>
    <div class="col-xs-6 text-right">
        <a href="http://toledoprudente.edu.br" target="_blank">
            <img class="logo-toledo" src="{{asset('images/logos/logotipo_toledo.png')}}" alt="logo-toledo">
            <img class="logo-aguia" src="{{asset('images/logos/Aguia-toledo.svg')}}" alt="logo-toledo">
        </a>

    </div>
</div>
<header class="block">
    <nav class="navbar navbar-default margin-none e-navbar">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed {{Auth::check()?'space-right':''}} " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                @if(Auth::check())
                    <form class="navbar-form" action="{{asset('itens/lixeira')}}">
                        <button type="submit" class="btn btn-default btn-left">
                              <i class="fa fa-trash"></i>
                              <i class="fa fa-recycle"></i>
                        </button>
                        <sup style="position: absolute; color: #f20d0d; margin-top: 14px; right: 10px;">
                            <strong>{{ \App\Models\ItensModel::count(Auth::user()->id) }}</strong>
                        </sup>
                    </form>
                @endif

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{asset('/')}}">           Inicio           </a></li>
                    <li><a href="{{asset('/Parceiros')}}">  Parceiros        </a></li>
                    <li><a href="{{asset('/Projeto')}}">    Projeto          </a></li>
                    <li><a href="{{asset('/Mapa')}}">       Mapa             </a></li>
                    <li><a href="{{asset('/Pontos')}}">     Pontos de Coleta </a></li>
                </ul>

                @if( Illuminate\Support\Facades\Auth::check())
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                @if(Auth::user()->picture) <img src="{{ Auth::user()->picture }}" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px; width: 19px;" alt="Avatar">@else <span style="font-size: 19px;" class="glyphicon glyphicon-user"></span> @endif
                                {{ Auth::user()->name }}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{asset('/Perfil')}}">          Perfil     </a></li>
                                    @if( \App\Http\Controllers\Auth\RolesController::validar('Aluno'))
                                        <li class="divider"></li>
                                        <li><a href="{{asset('Admin/Coleta')}}">     Coleta     </a></li>
                                        <li><a href="{{asset('Admin/Coletados')}}">  Coletados  </a></li>
                                        <li><a href="{{asset('Admin/Usuarios')}}">   Usuários  </a></li>
                                        <li class="divider"></li>
                                    @endif
                                <li><a href="{{asset('/User/Sair')}}">     Sair       </a></li>
                            </ul>
                        </li>
                    </ul>
                @endif
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

@if( ! Auth::check())

    <div class="row padding-all-10">

        <div class="col-md-3">

        </div>

        <div class="form-group padding-rl-10 col-md-3 btn-center text-center">
            <button id="entrar" style="width: 80%; max-width: 500px; min-width: 245px;" type="submit" class="btn btn-success">
                <i class="fa fa-envelope"></i> &nbsp;Entre Com Seu E-mail
            </button>
        </div>

        <div class="form-group padding-rl-10 col-md-3 btn-center text-center">
            <a style="width: 80%; max-width: 500px; min-width: 245px;" class="btn btn-primary" href="{{$login_url}}" role="button">
                <i class="fa fa-facebook-square"></i> &nbsp;Entre Com Facebook
            </a>
        </div>

        <div class="col-md-3">

        </div>

    </div>

@endif
