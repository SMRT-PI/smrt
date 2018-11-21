<?php
include_once '../bd/conectar.php';
include '../cabecalho.php';
?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV9x1ioWPmKq2F5zrfw4FVeHCW_L2Ruso&callback=initMap"
type="text/javascript"></script>

<!--<script>
    var lat = "";
    var lon = "";

    var x = document.getElementById("demo");
    function getLocation()
    {
        if (navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            x.innerHTML = "Geolocalização não é suportada nesse browser."
        }
    }

    function showError(error)
    {
        switch (error.code)
        {
            case error.PERMISSION_DENIED:
                x.innerHTML = "Usuário rejeitou a solicitação de Geolocalização."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Localização indisponível."
                break;
            case error.TIMEOUT:
                x.innerHTML = "O tempo da requisição expirou."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "Algum erro desconhecido aconteceu."
                break;
        }
    }
    function showPosition(position)
    {
        lat = position.coords.latitude;
        lon = position.coords.longitude;
        mapholder = document.getElementById('mapholder');
        mapholder.innerHTML = ('<iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d876.7773817165236!2d' + lon + '!3d' + lat + '!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjjCsDI4JzM0LjUiUyA0OcKwMDEnMzQuNiJX!5e0!3m2!1spt-BR!2sbr!4v1539659561200" width="600" height="450" frameborder="0" style="border:0;width:100%;height:100%;min-height: 40vh;min-width: 40vw;" ></iframe>');
        coordenadas = document.getElementById('coordenadas');
        coordenadas.innerHTML = ('<input class="form-control" type="text" id="lat" name="lat" value="' + lat + '"> <input class="form-control" type="text" id="lon" name="lon" value="' + lon + '">');
        var latlon = new google.maps.LatLng(lat, lon);
        var myOptions = {
            center: latlon, zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL}
        };
        var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
        var marker = new google.maps.Marker({position: latlon, map: map, title: "Minha localização!"});

    }
    function lat() {
        lat = position.coords.latitude;
        return lat;
    }
    function lon() {
        lon = position.coords.longitude;
        return lon;
    }
//CHAVE API GOOGLE MAPS - AIzaSyC7xO0yzbGdqeO7caYCe1PDDwzMw6TphtU
</script>-->









<!--Google Maps Localização-->
<div class="container mb-4">
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <form class="col-lg-6" method="post" action="../publicacao/inserir.php" enctype="multipart/form-data">
                <input type="hidden" name="autor" value="<?= $linha_form['id'] ?>"> 
                <div id="coordenadas">
                </div>
                <div class="input-group">
                    <textarea class="form-control" rows="1" placeholder="Legenda" name="legenda"></textarea>
                    <div class="input-group-append">
                        <span class="input-group-text" style="cursor: pointer;">
                            <input class="form-control" data-toggle="modal" data-target="#modalmapa"type="button" id="imagem" name="mapa" onclick="getLocation()" style="cursor: pointer;display: inline-block;opacity: 0;position: absolute;" multiple="true">
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

<!-- The Modal -->
<div class="modal fade" id="modalmapa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- CABEÇA DO MODAL -->
            <div class="modal-header">
                <h4 class="modal-title">Confirme sua localização!</h4>
            </div>
            <!-- CORPO DO MODAL (MAPA) -->
            <div class="modal-body p-0" id="mapholder"></div>
            <!-- RODAPÉ DO MODAL -->
            <div class="modal-footer">
                <alert id='demo'></alert>
                <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>-->
                <button type="button" class="btn btn-success" data-dismiss="modal">Confirmar</button>
            </div>

        </div>
    </div>
</div>

<!--
<div class="justify-content-center d-flex text-center my-3">
    <form class="col-lg-6" method="post" action="../publicacao/inserir.php" enctype="multipart/form-data">
        <input type="hidden" name="autor" value="<?= $linha_form['id'] ?>"> 
        <input type="text" id="lat" name="lat" value="">
        <input type="text" id="lon" name="lon" value=""> 
        <div class="input-group">
            <textarea class="form-control" rows="1" placeholder="Legenda" name="legenda"></textarea>
            <div class="input-group-append">
                <span class="input-group-text" style="cursor: pointer;">
                    <input data-toggle="modal" data-target="#modalmapa"type="button" id="imagem" name="mapa" onclick="getLocation()" style="cursor: pointer;display: inline-block;opacity: 0;position: absolute;" multiple="true">
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
</div>-->

<?php
require_once '../rodape.php';
