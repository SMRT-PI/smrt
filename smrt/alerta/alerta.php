<?php
include_once '../bd/conectar.php';
include '../cabecalho.php';
?>
<div class="container mb-4">
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <form class="col-lg-6 my-3" method="post" action="inserir.php" enctype="multipart/form-data">
                <input type="hidden" name="autor" value="<?= $linha_form['id'] ?>"> 
                <div id="coordenadas">
                </div>
                <div class="input-group">
                    <textarea class="form-control" rows="1" placeholder="Legenda" name="legenda"></textarea>
                    <div class="input-group-append">

                        <div id="coordenadas">
                            <input type="hidden" id="lat" name="lat" value="">
                            <input type="hidden" id="lon" name="lon" value="">
                        </div>

                        <span class="input-group-text" id="blocal">
                            <input class="form-control" type="button" id="mapa" name="mapa" onclick="getLocation()" 
                                   style="cursor: pointer;display: inline-block;opacity: 0;position: absolute;">
                            <i for="mapa" style="cursor: pointer;" class="fas fa-map-marked-alt"></i>
                        </span>

                        <span class="input-group-text" style="cursor: pointer;">
                            <input type="file" id="imagem" name="imagem" style="cursor: pointer;display: inline-block;opacity: 0;position: absolute;" multiple="true">
                            <i for="imagem" style="cursor: pointer;" class="fas fa-image"></i>
                        </span>

                        <input type="submit" value="Publicar" class="btn btn-lg btn-success small" formenctype="multipart/form-data">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    #map {
        height: 55vh;
    }
</style>

<div id="map"></div>

<script>
    var customLabel = {};

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-28.481050, -49.008865),
            zoom: 14
        });
        var infoWindow = new google.maps.InfoWindow;

        // Change this depending on the name of your PHP or XML file
        downloadUrl('pontosBD.php', function (data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function (markerElem) {
                var id = markerElem.getAttribute('id');
                var point = new google.maps.LatLng(
                        parseFloat(markerElem.getAttribute('lat')),
                        parseFloat(markerElem.getAttribute('lng')));

                var icon = customLabel[id] || {};
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    label: icon.label
                });
            });
        });
    }



    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV9x1ioWPmKq2F5zrfw4FVeHCW_L2Ruso&callback=initMap">
</script>
<!--AIzaSyDV9x1ioWPmKq2F5zrfw4FVeHCW_L2Ruso-->

<script>
    var x = document.getElementById("coordenadas");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            x.innerHTML = "Geolocalização não é suportada nesse navegador.";
        }
    }

    function showPosition(position) {
        blocal = document.getElementById("blocal");
        lat = document.getElementById("lat");
        lon = document.getElementById("lon");

        lat.value = position.coords.latitude;
        lon.value = position.coords.longitude;

        blocal.className = "input-group-text bg-success text-light";
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "Usuário negou a solicitação de geolocalização."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "As informações de localização não estão disponíveis."
                break;
            case error.TIMEOUT:
                x.innerHTML = "O pedido para obter a localização do usuário atingiu o tempo limite."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "Ocorreu um erro desconhecido."
                break;
        }
    }
</script>

<?php
require_once '../rodape.php';
