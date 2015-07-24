@include('Components.Partials.Layout.HeaderPage')

<div class="panel panel-default">

    @if($SubCat == true)
        <div class="panel-heading"><strong>Categoria:</strong> {{ $Pid }}
            <span><small>Caso seu modelo não se encontre na lista use o Modelo mais próximo:</small></span>
        </div>
    @else
        <div class="panel-heading"><strong>Essa é a sua Lixeira:</strong>
            <span><small>Confira os itens e a quantidade do que será entregue para reciclagem.</small></span>
        </div>
    @endif

    <div class="panel-body">

        <form class="form-inline" method="POST" action="{{asset($Action)}}">
            {!! csrf_field() !!}

            <div class="row login-form radius-5 padding-all-10">
                <div>
                    <div class="col-xs-6"><label><strong>Item</strong></label></div>
                    <div class="col-xs-6"><label><strong>Quantidade</strong></label></div>
                </div>
                <br>
                <br>
                @foreach($Lixeiras as $Lixeira)
                    <div class="form-group row margin-tb-5" style="width: 100%">

                        <!-- essa linha abaixo não é um comentario, é a atribuição da variavel $ModeloID -->
                        {{--*/ $ModeloID = ($SubCat == true) ? $Lixeira->modelo_id : $Lixeira->modelos_id /*--}}

                        <input type="hidden" name="modelo[]" value="{{$ModeloID}}">

                        <div class="col-xs-6 pull-left">
                            <label for="quantidade[]">
                                {{ \App\Http\Controllers\routes\ItensController::modeloNome($ModeloID) }}
                            </label>
                        </div>
                        <div class="col-xs-6 pull-left" >
                            <input type="number" name="quantidade[]" class="form-control" min="0" value="{{ \App\ItensModel::userQuantidade($UserID, $ModeloID) }}">
                        </div>
                    </div>
                @endforeach
                <br>
                <br>
                <div class="form-group padding-rl-10 col-x2-12 btn-center">
                    <button id="submitButton" type="submit" class="btn btn-success">{{ ($SubCat == true) ? 'Colocar na lixeira' : 'Reciclar' }}</button>
                </div>

            </div>

        </form>

    </div>

</div>

@include('Components.Partials.Layout.BottomPage')