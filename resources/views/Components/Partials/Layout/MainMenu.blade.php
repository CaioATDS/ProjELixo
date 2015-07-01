<?php
use Illuminate\Support\Facades\Auth;
?>

<header class="block">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{asset('/')}}">e-Lixo</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{asset('/Parceiros')}}">  Parceiros        </a></li>
                    <li><a href="{{asset('/Projeto')}}">    Projeto          </a></li>
                    <li><a href="{{asset('/Mapa')}}">       Mapa e-Lixo   </a></li>
                    <li><a href="{{asset('/Pontos')}}">     Pontos de Coleta </a></li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Pesquisar">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">  <span class="glyphicon glyphicon-user"></span> Usuário <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @if( !   Auth::check())
                                <li><a href="{{asset('auth/login')}}">      Entrar</a></li>
                                <li class="divider"></li>
                                <li><a href="{{asset('auth/register')}}">   Registrar</a></li>
                            @else
                                <li><a href="#">Perfil</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ Auth::logout()  }}">Sair</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
