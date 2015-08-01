@include('Components.Partials.Layout.HeaderPage')
@include('Errors.Geral')

<div class="panel panel-default">

    <div class="panel-heading">{{$UserName}} {{$UserLastname}}</div>
    <div class="panel-body">

        <table class="table table-bordered table-hover">
            <tbody>
            <tr>
                <td class="col-xs-2 text-right">Nome: </td>
                <td class="col-xs-10">{{$UserName}}</td>
            </tr>
            <tr>
                <td class="col-xs-2 text-right">Sobrenome: </td>
                <td class="col-xs-10">{{$UserLastname}}</td>
            </tr>
            <tr>
                <td class="col-xs-2 text-right">Classe: </td>
                <td class="col-xs-10">{{$UserRole}}</td>
            </tr>
            <tr>
                <td class="col-xs-2 text-right">Email: </td>
                <td class="col-xs-10">{{$UserEmail}}</td>
            </tr>
            <tr>
                <td class="col-xs-2 text-right">Reciclados: </td>
                <td class="col-xs-10"><a href="{{asset('/itens/reciclados')}}">{{ \App\Models\ItensModel::count($UserId,1) }}</a></td>
            </tr>
            <tr>
                <td class="col-xs-2 text-right">Na Lixeira: </td>
                <td class="col-xs-10"><a href="{{asset('/itens/lixeira')}}">{{ \App\Models\ItensModel::count($UserId) }}</a></td>
            </tr>
            @if(\App\Http\Controllers\Auth\RolesController::validar('Admin') || $UserId == Illuminate\Support\Facades\Auth::user()->id )
                <td class="col-xs-2 text-right">Editar: </td>
                <td class="col-xs-10"><a href="{{ asset('/Perfil/Editar/'.$UserId) }}" title="Editar"><span class="glyphicon glyphicon-edit"></span></a></td>
            @endif
            </tbody>
        </table>

    </div>

</div>

@include('Components.Partials.Layout.BottomPage')