@include('Components.Partials.Layout.HeaderPage')

<div class="container">
    <h1 class="section-title">Projeto e-Lixo</h1>
    <section id="main-grid" class="to-center">
        <div class="row row-centered">

            @foreach($Categorias as $Categoria)

                <div class="col-md-3 col-xs-6 col-centered">
                    <div class="blacks color-expansive color-square center-block">

                        <div class="expanded-wrapper">

                            <span class="plus pull-right">+</span>

                            <div class="middle-content text-center">
                                <p>
                                    <span><a class="middle-content" href="{{asset('Subcategoria/'.$Categoria->categoria_id)}}">{{$Categoria->categorias_descricao}}</a></span>
                                </p>
                            </div>

                        </div>

                    </div>
                </div>

            @endforeach

        </div>
    </section>
</div>
<!-- area de atuação fim -->

@include('Components.Partials.Layout.BottomPage')