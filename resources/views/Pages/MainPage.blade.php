@include('Components.Partials.Layout.HeaderPage')

    <div class="row row-centered">

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

@include('Components.Partials.Layout.BottomPage')