<?php
require_once '../cabecalho.php';
?>

<title>Testing the Search Feature</title>
<script type="text/javascript" src="http://js.sapo.pt/Bundles/SAPOMapsAPI.js"></script>

<script type='text/javascript'>

    window.onload = init;

    function init() {
        var map = new SAPO.Maps.Map('map');
        var ponto = new OpenLayers.LonLat(-48.99746, -28.472424);
        var marker = new SAPO.Maps.Marker(ponto);
        map.addOverlay(marker);
        
        
        
        
        
    }
</script>		

<div id='map' style='width:100%; height:300px;'></div>

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

<!--<button class="btn btn-secondary" onclick="getLocation()">LOCALIZAÇÃO</button>
<form class="col-lg-6" method="post" action="inserir.php">
    <div id="coordenadas">
        <input type="text" id="lat" name="lat" value="">
        <input type="text" id="lon" name="lon" value="">
    </div>
    <input type="submit" value="INSERIR" class="btn btn-lg btn-success small" formenctype="multipart/form-data">
</form>-->


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
