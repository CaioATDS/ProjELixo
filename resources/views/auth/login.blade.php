@include('Components.Partials.Layout.HeaderPage')
<!-- resources/views/auth/login.blade.php -->

<div class="panel panel-default">
    <div class="panel-heading"><strong>Registrar:</strong>
        <span><small>Crie sua nova conta:</small></span>
    </div>
    <div class="panel-body">

        <form method="POST" action="{{asset('/auth/login')}}">
            {!! csrf_field() !!}

            <div class="row login-form radius-5 padding-all-10">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Seu Email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="email">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <input type="checkbox" name="remember"> Continuar Logado
                </div>
                <div class="form-group padding-rl-10 col-md-12 btn-center">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>

            </div>

        </form>

    </div>

</div>


@include('Components.Partials.Layout.BottomPage')