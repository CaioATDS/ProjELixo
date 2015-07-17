@include('Components.Partials.Layout.HeaderPage')

    <h1>Categoria: {{ $Pid or '' }}</h1>
    <span><small>Caso seu modelo não se encontre na lista use o Modelo mais próximo:</small></span>
    <br><br>
    <ul>
        @foreach($Modelos as $Modelo)

                <li>id: {{$Modelo->modelo_id}} descriçao: {{$Modelo->modelo_descricao}} peso: {{$Modelo->modelo_peso}} kg</li>

        @endforeach
    </ul>

@include('Components.Partials.Layout.BottomPage')