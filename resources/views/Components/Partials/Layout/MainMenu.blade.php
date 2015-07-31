<header class="block">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle space-right collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{asset('/')}}">e-Lixo</a>

                @if(Illuminate\Support\Facades\Auth::check())
                    <form class="navbar-form pull-right" action="{{asset('itens/lixeira')}}">
                        <button type="submit" class="btn btn-default btn-left">
                              <i class="fa fa-trash"></i>
                              <i class="fa fa-recycle"></i>
                        </button>
                        <sup style="position: absolute; color: #f20d0d; margin-top: 14px; right: 10px;">
                            <strong>{{ \App\Models\ItensModel::count(Illuminate\Support\Facades\Auth::user()->id) }}</strong>
                        </sup>
                    </form>
                @else
                    <form class="navbar-form pull-right" action="{{asset('itens/lixeira')}}">
                        <div class="btn-group btn-left">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                entrar
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="{{asset('User/Entrar')}}">      Entrar      </a></li>
                                <li><a href="{{asset('User/Cadastro')}}">    Registrar   </a></li>
                            </ul>
                        </div>
                    </form>
                @endif
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{asset('/Parceiros')}}">  Parceiros        </a></li>
                    <li><a href="{{asset('/Projeto')}}">    Projeto          </a></li>
                    <li><a href="{{asset('/Mapa')}}">       Mapa            </a></li>
                    <li><a href="{{asset('/Pontos')}}">     Pontos de Coleta </a></li>
                </ul>

                @if( Illuminate\Support\Facades\Auth::check())
                    <ul class="nav navbar-nav space-right navbar-right">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                <span class="glyphicon glyphicon-user"></span>
                                {{ Illuminate\Support\Facades\Auth::user()->name }}
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
