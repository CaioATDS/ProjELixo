@include('Components.Partials.Layout.HeaderPage')
    <div class="panel panel-default">

        <div class="panel-heading">
            <strong>Usuários</strong>
            <small>Listagem de usuáiros cadastrados.</small>
        </div>
        <div class="panel-body">

            @include('Errors.Geral')

            <table class="table table-bordered">
                <thead>

                <tr>
                    <th>Nome.</th>
                    <th>Sobrenome</th>
                    <th>Cadastrado</th>
                    <th>Reciclados</th>
                    @if(\App\Http\Controllers\Auth\RolesController::validar('Aluno'))
                        <th>email</th>
                    @endif
                    @if(\App\Http\Controllers\Auth\RolesController::validar('Admin'))
                        <th style="width: 60px;">Editar</th>
                    @endif
                </tr>

                </thead>
                <tbody>

                @foreach( $Users as $User)
                    <tr>
                        <td><a href="{{ asset('/Perfil/'.$User->id) }}">{{ $User->name }}</a> </td>
                        <td>{{ $User->lastname }}</td>
                        <td>{{ date("d-m-Y", strtotime($User->created_at)) }}</td>
                        <td> <a href="{{asset('/itens/reciclados/'.$User->id)}}">{{ \App\Models\ItensModel::count($User->id,1) }}</a> </td>
                        @if(\App\Http\Controllers\Auth\RolesController::validar('Aluno'))
                            <td>{{ $User->email }}</td>
                        @endif
                        @if(\App\Http\Controllers\Auth\RolesController::validar('Admin'))
                            <td class="text-center"><a href="{{ asset('/Perfil/Edit/'.$User->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                        @endif
                    </tr>
                @endforeach

                </tbody>
            </table>

            {!!$Users->render()!!} <!-- paginator -->

        </div>

    </div>
@include('Components.Partials.Layout.BottomPage')