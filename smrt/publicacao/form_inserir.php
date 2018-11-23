<?php
//include_once '../bd/conectar.php';
//include '../cabecalho.php';
$sql_form = "select id as autor from usuario where email = '$_SESSION[email]'";
$retorno_form = mysqli_query($conexao, $sql_form);
$linha_form = mysqli_fetch_array($retorno_form);
?>

<div class="justify-content-center d-flex text-center my-3">
    <form class="col-lg-6 my-3" method="post" action="inserir.php" enctype="multipart/form-data">
        <input type="hidden" name="autor" value="<?= $linha_form['autor'] ?>"> 
        <div id="coordenadas">
        </div>
        <div class="input-group">
            <input class="form-control" rows="1" placeholder="Legenda" name="legenda">
            <div class="input-group-append">
                <div id="coordenadas">
                    <input type="hidden" id="lat" name="lat" value="">
                    <input type="hidden" id="lon" name="lon" value="">
                </div>
                <span class="input-group-text" id="blocal">
                    <input class="form-control" type="button" id="mapa" name="mapa" onclick="getLocation()" 
                           style="cursor: pointer;
                           width: 0.1px;
                           height: 0.1px;
                           opacity: 0;
                           overflow: hidden;
                           position: absolute;
                           z-index: 1;">
                    <label class="m-0 p-0" style="cursor: pointer;" for="mapa"><i class="fas fa-map-marked-alt"></i></label>
                </span>
                <span class="input-group-text" style="cursor: pointer;">
                    <input type="file" id="imagem" name="imagem" style="
                           width: 0.1px;
                           height: 0.1px;
                           opacity: 0;
                           overflow: hidden;
                           position: absolute;
                           z-index: 1;" multiple="true">
                    <label class="m-0 p-0" style="cursor: pointer;" for="imagem"><i for="imagem" class="fas fa-image"></i></label>
                </span>
                <input type="submit" value="Publicar" class="btn btn-lg btn-success small" formenctype="multipart/form-data">
            </div>
        </div>
    </form>
</div>


<script>
    function input_img() {
        //FAZ DEPOIS LUCA
    }
</script>


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
