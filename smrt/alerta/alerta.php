<?php
include_once '../bd/conectar.php';
?>

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