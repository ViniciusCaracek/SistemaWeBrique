    

<!-- FOI PARA PASTA VIEW/COMMON-->


<div id="google_map" style="width:100%;height:460px;"></div>

<!--<script>
    function myMap() {
        var options = {
            center: new google.maps.LatLng(-28.29917, -54.2630),
            zoom:100,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), options);
    }
</script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>;-->
<style>

    .infowindow { background-color: #FFF; width: 300px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; border: 2px solid #3fa7d8; border-radius: 3px; margin-top: 10px }
    .infoBox p { padding: 0 15px }
    .infoBox:before { border-left: 10px solid transparent; border-right: 10px solid transparent; border-bottom: 10px solid #3fa7d8; top: -10px; content: ""; height: 0; position: absolute; width: 0; left: 138px }

</style>

<div id="map_wrapper_div">
    <div id="google_map">



        <script>
            var customLabel = {
                restaurant: {
                    label: 'R'
                },
                bar: {
                    label: 'B'
                }
            };


            function initialize() {
                var map;
                var bounds = new google.maps.LatLngBounds();
                var mapOptions = {
                    mapTypeId: 'roadmap',
                    center: new google.maps.LatLng(-28.300700, -54.259643),
                    zoom: 14
                };

                // Display a map on the page
                map = new google.maps.Map(document.getElementById("google_map"), mapOptions);
//                map.setTilt(45);
                const icone = {

                    url: "../assets/imagens/logo/icon_map_edit_v3_2801.png",
                    scaledSize: new google.maps.Size(60, 50)// scaled size


                };
                // Multiple Markers
                var markers = JSON.parse(`<?php echo ($markers); ?>`);
                console.log(markers);

                var infoWindowContent = JSON.parse(`<?php echo ($infowindow); ?>`);

                // Display multiple markers on a map
                var infoWindow = new google.maps.InfoWindow(), marker, i;

                // Loop through our array of markers &amp; place each one on the map  
                for (i = 0; i < markers.length; i++) {
                    var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                    bounds.extend(position);
                    marker = new google.maps.Marker({
                        position: position,
                        map: map,
                        icon: icone,
                        title: markers[i][0]
                    });
                   
                    // Each marker to have an info window    
                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infoWindow.setContent(infoWindowContent[i][0]);
                            infoWindow.open(map, marker);
                        };
                    })(marker, i));

                    // Automatically center the map fitting all markers on the screen
                    map.fitBounds(bounds);
                }

                // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
                var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
                    this.setZoom(18);
                    google.maps.event.removeListener(boundsListener);
                });

            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBykuY1g5uujQXSCF5dT_z8PXo-04wvVsI&callback=initialize"></script>


    </div>
</div>




<!-- CREDENCIAIS MAPS -> AIzaSyBykuY1g5uujQXSCF5dT_z8PXo-04wvVsI -->



<!-- ////////////////////     PROCURAR       /////////////////////////// -->
<div class="container">

    <div class="btn-avanca-cadastro">
        <a href="localizacao/cadastroLocalizacao" style="text-decoration: none"><button class="btn btn-primary" id="btn-cadastro"><b>Cadastrar Sua Localização </b><br>
                <i class="fa fa-arrow-right fa-1x"></i>


            </button> </a> 
    </div>



</div>


<!-- ////////////////////      FIM ITENS PRODUTO       /////////////////////////// -->
<!-- FOOTER FOI PARA PASTA VIEW/COMMON-->

