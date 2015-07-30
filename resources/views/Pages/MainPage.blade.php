@include('Components.Partials.Layout.HeaderPage')

<div class="panel panel-default">

    <div class="panel-heading"><strong>Inicio:</strong>
        <span><small>Escolha o tipo de material a ser reciclado:</small></span>
    </div>

    <div class="panel-body">

        <div class="row row-centered">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @foreach($Categorias as $Categoria)

                <div class="col-md-3 col-xs-6 col-centered">

                    <div class="expanded-wrapper">

                        <div class="middle-content text-center radius-5">
                            <a class="middle-content" href="{{asset('Subcategoria/'.$Categoria->categoria_id)}}">
                                <span>{{$Categoria->categorias_descricao}}</span>
                            </a>
                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div> <!-- Panel body end -->
</div><!-- Panel end -->

@include('Components.Partials.Layout.BottomPage')

