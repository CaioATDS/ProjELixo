@include('Components.Partials.Layout.HeaderPage')

<div class="panel panel-default">
    
        <div class="panel-heading">
            Eventos
        </div>

    <div class="panel-body">

        <div class="row">
            
            @if( \App\Http\Controllers\Auth\RolesController::validar('Admin'))
            
            <div class="pull-right">
                <ul>
                    <li class="list-unstyled">
                        <a href="{{asset('/Admin/Eventos/Edit/{id}')}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </li>
                    <li class="list-unstyled">
                        <a href="{{asset('/Admin/Eventos/Del/{id}')}}">
                             <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </li>
                    <li class="list-unstyled">
                        <a href="{{asset('/Admin/Eventos/Novo')}}">
                            <i class="fa fa-file"></i>
                        </a>
                    </li>
                </ul>
            </div>

            @endif
            
              <div class="panel-heading"><< titulo do evento >></div>
              <div class="panel-body">
                  
                  <div id="descricao">
                      
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                        magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                        quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                        ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                        dolor in hendrerit in vulputate velit esse molestie consequat,
                        vel illum dolore eu feugiat nulla facilisis at vero eros et
                        accumsan et iusto odio dignissim qui blandit praesent luptatum
                        zzril delenit augue duis dolore te feugait nulla facilisi.
                        Nam liber tempor cum soluta nobis eleifend option congue
                        nihil imperdiet doming id quod mazim placerat facer possim
                        assum. Typi non habent claritatem insitam; est usus legentis
                        in iis qui facit eorum claritatem. Investigationes
                        demonstraverunt lectores legere me lius quod ii legunt saepius.
                        Claritas est etiam processus dynamicus, qui sequitur mutationem
                        consuetudium lectorum. Mirum est notare quam littera gothica,
                        quam nunc putamus parum claram, anteposuerit litterarum formas
                        humanitatis per seacula quarta decima et quinta decima. Eodem
                        modo typi, qui nunc nobis videntur parum clari, fiant sollemnes
                        in futurum.
                      
                  </div>
                  
                <div id="local">
                    
                    <ul>
                        <li>Praça Raul Furquim, 09</li>
                        <li>Vila Furquim</li>
                        <li>Pres. Prudente - SP</li>
                        <li>Telefone:(18) 3901-4000</li>
                    </ul>
                </div>
                <div id="data-hora">
                    
                    31/05/2015 21:00
                    
                </div>
                
                <!-- Meus eventos loop {{ $name }} {{ $id }} -->
                 
              </div>
           
            
           
        </div>


    </div>

</div>

@include('Components.Partials.Layout.BottomPage')