<?php

require_once '../cabecalho.php';
?>



<style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 73vh;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
    }
</style>

<div id="map"></div>

<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        var uluru = {lat: -28.4928445, lng: -49.0047992};
        // The map, centered at Uluru
        var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 4, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
    }
</script>
<!--Load the API from the specified URL
* The async attribute allows the browser to render the page while the API loads
* The key parameter will contain your own API key (which is not needed for this tutorial)
* The callback parameter executes the initMap() function
-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV9x1ioWPmKq2F5zrfw4FVeHCW_L2Ruso&callback=initMap">
</script>

<?php

require_once '../rodape.php';
