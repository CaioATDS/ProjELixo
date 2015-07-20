@include('Components.Partials.Layout.HeaderPage')

<div class="panel panel-default">
    <div class="panel-heading">Categoria: {{ $Pid or '' }}
        <span><small>Caso seu modelo não se encontre na lista use o Modelo mais próximo:</small></span>
    </div>

    <div class="panel-body">

        <form class="form-inline" method="POST" action="{{asset('itens/selecionar')}}">
            {!! csrf_field() !!}

            <div class="row login-form radius-5 padding-all-10">
                <div>
                    <div class="col-xs-6"><label><strong>Item</strong></label></div>
                    <div class="col-xs-6"><label><strong>Quantidade</strong></label></div>
                </div>
                <br>
                <br>
                @foreach($Modelos as $Modelo)
                    <div class="form-group row margin-tb-5" style="width: 100%">
                        <input type="hidden" name="modelo[]" value="{{$Modelo->modelo_id}}">
                        <div class="col-xs-6 pull-left"><label for="quantidade[]">{{$Modelo->modelo_descricao}}</label></div>
                        <div class="col-xs-6 pull-left" ><input type="number" name="quantidade[]" class="form-control" min="0" value="0"></div>
                    </div>
                @endforeach
                <br>
                <br>
                <div class="form-group padding-rl-10 col-x2-12 btn-center">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>

            </div>

        </form>

    </div>

</div>

@include('Components.Partials.Layout.BottomPage')