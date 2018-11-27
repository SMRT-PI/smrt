<?php
require_once 'cabecalho.php';
require_once 'usuario/autenticacao.php';
require_once 'bd/conectar.php';
?>
<script type="text/javascript" src="../js/likes.js"></script>
<div id="demo" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div style="min-height: 73vh;height: 100%;max-height: 40vh;" id="map"></div>
        </div>
        <div class="carousel-item">
            <div style="background-image: url(/smrt/img/tubarao1.jpg); min-height: 73vh;height: 100%;max-height: 40vh;background-position: center; background-size: cover;"></div>
        </div>
        <div class="carousel-item">
            <div style="background-image: url(/smrt/img/tubarao2.jpg); min-height: 73vh;height: 100%;max-height: 40vh;background-position: center; background-size: cover;"></div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>

<script>
    var customLabel = {};

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-28.481050, -49.008865),
            zoom: 14
        });
        var infoWindow = new google.maps.InfoWindow;

        // Change this depending on the name of your PHP or XML file
        downloadUrl('usuario/pontosBD.php', function (data) {
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
<?php
require_once './rodape.php';
?>