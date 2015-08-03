<p style="font-size:16px;color:#5b5a5a;">Você acaba de se cadastrar no portal {{ \App\Providers\ConstantesProvider::SiteName }}</p>
<p style="font-size:16px;color:#5b5a5a;">Com sua conta você pode cadastrar seu lixo eletrônico antes de entregar para coleta.</p>
<p style="font-size:16px;color:#5b5a5a;">Para efetuar o login em nosso site, use os dados abaixo:</p>

<ul style="list-style: none">
    <li style="font-size:16px;color:#5b5a5a;"><b>Email: {{$email}}</b></li>
    <li style="font-size:16px;color:#5b5a5a;"><b>Senha: {{$password}}</b></li>
</ul>
<p style="font-size:16px;color:#5b5a5a;">Caso algum dado estiver incorreto por favor acesse o seu <a href="{{asset('/Perfil')}}">perfil</a>.</p>
<p style="font-size:16px;color:#5b5a5a;">Obrigado por fazer sua parte</p>