@include('Components.Partials.Layout.HeaderPage')

<div class="panel panel-default">
    
        <div class="panel-heading">
            Parceiros
        </div>

    <div class="panel-body">

        <div class="col-sm-6" style="max-width: 270px">
            <img src="{{asset('images/rgb-seigo-informatica.jpg')}}" alt="RGB Seigo Informática." style="max-width: 230px; margin-bottom: 10px">
        </div>
        <div class="col-sm-6" >
            <span style="max-width: 250px">
                Tudo para informática. <br>Venda de equipamentos, suprimentos, <br>Assistência Técnica em micros, <br>impressoras, monitores, etc.
            </span>
            <br>
            <br>
            <ul class="list-unstyled">
                <li>RGB - Seigo Informática Ltda</li>
                <li>Rua Comendador João Peretti, 499</li>
                <li>Presidente Prudente</li>
                <li>(18) 3221-8749</li>
            </ul>
        </div>

    </div>

</div>

@include('Components.Partials.Layout.BottomPage')