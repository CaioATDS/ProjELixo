@include('Components.Partials.Layout.HeaderPage')

<div class="panel panel-default">
    <div class="panel-heading">Categoria: {{ $Pid or '' }}
        <span><small>Caso seu modelo não se encontre na lista use o Modelo mais próximo:</small></span>
    </div>
    <div class="panel-body">
        <ul>
            @foreach($Modelos as $Modelo)

                <li>id: {{$Modelo->modelo_id}} descriçao: {{$Modelo->modelo_descricao}} peso: {{$Modelo->modelo_peso}} kg</li>

            @endforeach
        </ul>
    </div>
</div>

@include('Components.Partials.Layout.BottomPage')