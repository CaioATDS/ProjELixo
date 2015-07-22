@include('Components.Partials.Layout.HeaderPage')

<div class="panel panel-default">

    <div class="panel-body">

        <div class="row login-form radius-5 padding-all-10">
            <div>
                <div class="col-xs-6"><label><strong>Item</strong></label></div>
                <div class="col-xs-6"><label><strong>Quantidade</strong></label></div>
            </div>
            <br>
            <br>
            @foreach($Lixeiras as $Lixeira)
                <div class="form-group row margin-tb-5" style="width: 100%">
                    <div class="col-xs-6 pull-left">
                        {{ \App\Http\Controllers\routes\ItensController::modeloNome($Lixeira->modelos_id) }}
                    </div>
                    <div class="col-xs-6 pull-left" >
                        {{ \App\ItensModel::userQuantidade($UserID, $Lixeira->modelos_id, 1) }}
                    </div>
                </div>
            @endforeach

    </div>

</div>

@include('Components.Partials.Layout.BottomPage')