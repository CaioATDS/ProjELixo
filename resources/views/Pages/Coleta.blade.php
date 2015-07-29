@include('Components.Partials.Layout.HeaderPage')

<div class="panel panel-default">
    <div class="panel-heading"><strong>Coleta:</strong>
        <span><small>Confirmaçao de Coleta:</small></span>
    </div>
    <div class="panel-body">

        <form class="form-inline" method="POST" action="Coletar">
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

                        <input type="hidden" name="modelo[]" value="{{$Lixeira['modelos_id']}}">
                        <input type="hidden" name="item_userid[]" value="{{$Lixeira['item_userid']}}">

                        <div class="col-xs-6 pull-left">
                            <label for="quantidade[]">
                                {{ \App\Http\Controllers\routes\ItensController::modeloNome($Lixeira['modelos_id']) }}
                            </label>
                        </div>
                        <div class="col-xs-6 pull-left" >
                            <input type="number" name="quantidade[]" class="form-control" min="0" value="{{ $Lixeira['item_quantidade'] }}">
                        </div>
                    </div>
                @endforeach
                <br>
                <br>
                <div class="form-group padding-rl-10 col-x2-12 btn-center">
                    <button id="submitButton" type="submit" class="btn btn-success">Confirmar</button>
                </div>

            </div>

        </form>

    </div>

</div>

@include('Components.Partials.Layout.BottomPage')