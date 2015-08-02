<html>
<head>
    <meta charset=utf-8">
    <title>e-Lixo Toledo Prudente</title>
    <style media="all" type="text/css">
    </style>
</head>
<body>
<table cellspacing="0" cellpadding="0" border="0" width="600px">

    <tr>
        <td class="navbar navbar-inverse" align="center">
            <!-- This setup makes the nav background stretch the whole width of the screen. -->
            <table width="598px" cellspacing="0" cellpadding="3" class="container">
                <tr class="navbar navbar-inverse">
                    <td colspan="4">
                        <h5>Olá {{ $name }} {{ $lastname or '' }} </h5>
                        <a class="brand" href="{{ asset('/') }}"> e-Lixo Toledo Prudente</a>
                    </td>
                    <td><ul style="list-style: none;"><li><a href="{{ asset('/User/Entrar') }}">Entrar</a></li></ul></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF" align="center">
            <table width="598px" cellspacing="0" cellpadding="3" class="container">
                <tr>
                    <td>{{ $mensagem }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF" align="center">
            <table width="598px" cellspacing="0" cellpadding="3" class="container">
                <tr>
                    <td>
                        <hr>
                        <p class="text-muted">e-Lixo Copyright © 2015 <a href="http://toledoprudente.edu.br">Toledo Prudente Centro Universitário </a></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>