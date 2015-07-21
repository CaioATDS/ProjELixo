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
                <td class="col-xs-2 text-right">Email: </td>
                <td class="col-xs-10">{{$UserEmail}}</td>
            </tr>
            <tr>
                <td class="col-xs-2 text-right">Reciclados: </td>
                <td class="col-xs-10">50t</td>
            </tr>
            </tbody>
        </table>

    </div>

</div>

@include('Components.Partials.Layout.BottomPage')