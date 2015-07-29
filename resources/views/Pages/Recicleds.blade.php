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
                    <th>Quant.:</th>
                    <th>Cadastrado:</th>
                    <th>Confirmado:</th>
                </tr>

            </thead>
            <tbody>

                @foreach($Lixeiras as $Lixeira)
                <tr>
                    <td class="text-right col-xs-4">{{ \App\Http\Controllers\routes\ItensController::modeloNome($Lixeira->modelos_id) }}</td>
                    <td class="col-xs-1 text-center">{{ \App\Models\ItensModel::userQuantidade($UserID, $Lixeira->modelos_id, 1) }}</td>
                    <td class="col-xs-4">
                        {{ date("d-m-Y", strtotime($Lixeira->created_at)) }}<br>
                        <small> {{ date("h:i", strtotime($Lixeira->created_at)) }} </small>
                    </td>
                    <td class="col-xs-4">
                        {{ date("d-m-Y", strtotime($Lixeira->updated_at)) }}<br>
                        <small> {{ date("h:i", strtotime($Lixeira->updated_at)) }} </small>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>

        {!!$Lixeiras->render()!!} <!-- paginator -->

    </div>

</div>

@include('Components.Partials.Layout.BottomPage')