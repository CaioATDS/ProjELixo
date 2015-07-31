@if (count($errors) > 0)
    <div class="alert alert-danger" style="font-size: 14px;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><span class="glyphicon glyphicon-alert"></span></strong> Houve algum problema no seu formulário.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li><h4>{{ $error }}</h4></li>
            @endforeach
        </ul>
    </div>
@endif