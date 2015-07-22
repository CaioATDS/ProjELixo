@include('Components.Partials.Layout.HeaderPage')

<div class="panel panel-default">

    <div class="panel-heading">
        <strong>Itens Reciclados</strong>
        <small>Aqui você pode ver todos os itens que você já entregou para reciclagem.</small>
    </div>
    <div class="panel-body">

        <table class="table table-bordered">
            <thead>

                <tr>
                    <th class="text-right">Item:</th>
                    <th>Quantidade:</th>
                </tr>

            </thead>
            <tbody>

                @foreach($Lixeiras as $Lixeira)
                <tr>
                    <td class="text-right col-xs-4">{{ \App\Http\Controllers\routes\ItensController::modeloNome($Lixeira->modelos_id) }}</td>
                    <td class="col-xs-8">{{ \App\ItensModel::userQuantidade($UserID, $Lixeira->modelos_id, 1) }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

</div>

@include('Components.Partials.Layout.BottomPage')