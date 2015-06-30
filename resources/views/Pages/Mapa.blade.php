@include('Components.Partials.Layout.HeaderPage')

<div class="container">
    <div class="row table-row">
        <div id="map" class="col-sm-12 custom map" style="min-width: 100%; min-height: 450px; width: 100%; height: 100%;"></div>
    </div>
</div>
<!--- javascript -->

<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript">
    var locations = [
        ['Pruden Shopping'                   , -22.1160343,-51.4091385, 1],
        ['Secretaria de Estado da Educação'  , -22.1200556,-51.4024304, 2],
        ['Fundação Mirim'                    , -22.1236436,-51.4047478, 3],
        ['Campo de Futebol do Parque do Povo', -22.1297335,-51.3999587, 4],
        ['Capela São Bento'                  , -22.1367434,-51.3778379, 5],
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: new google.maps.LatLng(-22.1191006,-51.4021969),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i   ;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
    $(document).ready(function(){
        $('#map').height($(document).height()*0.8);
    });

</script>

@include('Components.Partials.Layout.BottomPage')