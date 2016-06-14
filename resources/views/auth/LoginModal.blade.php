@if( ! Illuminate\Support\Facades\Auth::check())
<style>
    .modal-login {
        position: fixed;
        z-index: 1;
        background-color: #fff;
        max-width: 305px;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
    }
    .modal-overlay {
        top: 0;
        width: 100%;
        height: 100%;
        display: none;
        z-index: 5;
        position: fixed;
        background-color: rgba(0, 0, 0, 0.5);
    }
    .modal-overlay #close {
        cursor: pointer;
        position: fixed;
        right: 0;
        z-index: 10;
    }
    .modal-overlay .login-wrapper {
        max-width: 767px;
        margin: 0 auto;
        padding: 10px;
    }
</style>
    <div class="modal-overlay">
        <div class="modal-login radius-5 text-center">
            <div id="close" class="pull-right padding-rl-5"><i class="fa fa-times"></i></div>

            <div class="login-wrapper">
                <header class="text-center padding-rl-10">
                    <h5 class="text-left sub-header">Conecte-se ou crie sua conta.</h5>
                </header>

                <div class="row padding-rl-5" >

                    <div class="padding-rl-5">
                        <form method="POST" action="{{asset('/User/Entrar')}}">
                            {!! csrf_field() !!}

                            <div class="row  padding-all-10">

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Seu Email" value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Senha</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha" value="{{ old('password') }}">
                                </div>

                                <div class="form-group">
                                    <input type="checkbox" name="remember"> Continuar Logado
                                </div>

                                <div class="form-group padding-none col-md-12 btn-center text-center">
                                    <button style="width: 100%" type="submit" class="btn btn-success"><i class="fa fa-envelope"></i> &nbsp;Entre Com Seu E-mail</button>
                                </div>

                                <div class="form-group padding-none col-md-12 btn-center text-center">
                                    <a style="width: 100%" class="btn btn-primary" href="{{$login_url}}" role="button"><i class="fa fa-facebook-square"></i> &nbsp;Entre Com Facebook</a>
                                </div>

                                <small>Ainda não é registrado? Clique aqui para <a href="{{asset('User/Cadastro')}}">Criar Conta</a>.</small>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#entrar').on('click', function(){
                $('.modal-overlay').show();
            });
            $('#close').on('click', function(){
                $('.modal-overlay').hide();
            })
        });
    </script>
@endif
{{-- stylesheets is in Statics.css--}}