@include('Components.Partials.Layout.HeaderPage')

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
            </tbody>
        </table>

    </div>

</div>

@include('Components.Partials.Layout.BottomPage')