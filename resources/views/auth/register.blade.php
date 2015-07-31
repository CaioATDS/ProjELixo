<!-- resources/views/auth/register.blade.php -->
@include('Components.Partials.Layout.HeaderPage')
@include('Errors.Geral')
<div class="panel panel-default">
    <div class="panel-heading"><strong>Registrar:</strong>
        <span><small>Crie sua nova conta:</small></span>
    </div>
    <div class="panel-body">

        <form method="POST" >
            {!! csrf_field() !!}
            <div class="row login-form radius-5 padding-all-10">

                <div class="col-md-6 margin-tb-5">
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="col-md-6 margin-tb-5">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="col-md-6 margin-tb-5">
                    <label for="password">Senha</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="col-md-6 margin-tb-5">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="col-md-6 margin-tb-5">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>

            </div>

        </form>

    </div>

</div>


@include('Components.Partials.Layout.BottomPage')