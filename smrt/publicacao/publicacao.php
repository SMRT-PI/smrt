<?php
include_once '../usuario/autenticacao.php';
include_once '../cabecalho.php';
include_once '../bd/conectar.php';
?>
<script type="text/javascript" src="../js/likes.js"></script>
<?php
$sql = "SELECT pub.id_pub,pub.legenda,pub.lat,pub.lng,pub.imagem,pub.autor,pub.dataa,usuario.id,usuario.nome,usuario.sobrenome,
date_format(dataa, '%d-%m-%Y %H:%i:%s') as dataa FROM pub inner join usuario on pub.autor = usuario.id order by dataa Desc;";

$sql_dono = "select id as dono from usuario where email = '$_SESSION[email]'";
$dono = mysqli_query($conexao, $sql_dono);
$linha_dono = mysqli_fetch_array($dono);

$resultado = mysqli_query($conexao, $sql);

require_once './form_inserir.php';

if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id_pub'];
        $id_us = $linha['id'];
        $id_like = $linha['id_like'];

        $nome_denunciador = $_SESSION['nome'];
        $nome_like = $_SESSION['nome'];
        $id_denunciado = $linha['autor'];
        $id_autor_like = $linha['autor'];
        $sobrenome_denunciador = $_SESSION['sobrenome'];
        $sobrenome_like = $_SESSION['sobrenome'];
        $nome_denunciado = $linha['nome'];
        $sobrenome_denunciado = $linha['sobrenome'];
        $lat = $linha['lat'];
        $lng = $linha['lng'];
        $like = "1";
        $unlike = "2";
        ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmação de denuncia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Deseja realmente denunciar esta publicação?
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-light" data-dismiss="modal">Não</a>
                        <a class="btn btn-danger" href="../denunciar/denunciar.php?idus=<?= $id_us ?>
                           &id=<?= $id ?>&denunciador=<?= $nome_denunciador ?>&sobrenome_denunciador=<?= $sobrenome_denunciador ?>
                           &id_denunciado=<?= $id_denunciado ?>&nome_denunciado=<?= $nome_denunciado ?>
                           &sobrenome_denunciado=<?= $sobrenome_denunciado ?>">Sim</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal SDADDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD-->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Local</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="map" style="min-height: 50vh;max-height: 50vh"></div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row my-3">
                <div class="col-lg-6 offset-lg-3">
                    <div class="card">

                        <!-- CARD-HEADER -->
                        <div class="card-header">
                            <?php
                            if (estaLogado()) {
                                ?>
                                <div class="dropdown">
                                    <button class="btn btn btn-outline-secondary float-right " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Left Align">
                                        <span class="fa fa-bars" style="cursor: pointer" aria-hidden="true"></span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Denunciar Publicação</a>
                                        <?php if ((admin()) || ($linha['autor'] === $linha_dono['dono'])) { ?>
                                            <a class="dropdown-item" href="excluir.php?id=<?= $linha['id_pub'] ?>">Excluir publicação</a>
                                        <?php } ?>
                                    </div>
                                </div>    
                            <?php } ?>

                            <a class="text-dark">
                                <div id="<?php echo $id; ?>">
                                    <img class="rounded-circle img-fluid" src="/smrt/img/perfil2.png" width="40" height="40">
                                    <strong class=""><?= $linha["nome"] ?> <?= $linha["sobrenome"] ?></strong>
                                    <strong class="text-muted small"><?php echo $linha["dataa"] ?></strong>
                                </div>
                            </a>
                        </div>
                        <!-- /CARD-HEADER -->

                        <!-- CARD-BODY -->
                        <div class="card-body m-0 p-0">
                            <p class="card-text container-fluid my-3"><?php echo $linha["legenda"] ?></p>
                            <div class="container-fluid m-0 p-0">
                                <img class="img-fluid" src="/smrt/img/<?php echo $linha["imagem"]; ?>" style="min-width: 100%">
                            </div>
                        </div>
                        <!-- /CARD-BODY -->


                        <!-- CARD-FOOTER -->
                        <div class="card-footer">
                            <div class="row text-center" id="headingOne">
                                <div class = "col"><button class = "btn bg-transparent" id="pegamapa" 
                                                           onclick="envia()" type="button" data-toggle="modal" data-target="#exampleModal1" name = "botao"> Mapa </button></div>
                                <div class = "col"><button class = "btn bg-transparent" data-toggle = "collapse" data-target = "#collapseOne" aria-expanded = "true" aria-controls = "collapseOne"> Comentar </button></div>
                            </div>
                        </div>
                        <!-- /CARD-FOOTER -->


                        <div class = "float-center collapse show" id = "collapseOne" aria-labelledby = "headingOne" data-parent = "#accordion" id = "<?php echo $id; ?>" >
                            <form action = "inserir_comentario.php" method = "post" name = "form_comentario" id = "form_comentario">
                                <input type = "text" name = "comentario" size = "50" placeholder = "Digite seu comentario!" class = "form-control campo "/>
                                <input type = "hidden" name = "id_postagem" value = "<?php echo $id ?>"/>
                                <input type = "hidden" name = "enviar" class = "btn btn-success float-left" value = "Enviar"/>
                            </form>
                        </div>


                        <div class="card">
                            <?php
                            $resultado2 = mysqli_query($conexao, "SELECT * FROM comentario WHERE id_postagem = $id");
                            if (mysqli_num_rows($resultado2) > 0) {
                                while ($linha = mysqli_fetch_assoc($resultado2)) {
                                    $idc = $linha['idc'];
                                    ?>
                                    <!-- COMENTÁRIOS -->
                                    <div class="card-body" id="<?php echo $id; ?>">
                                        <div class="container my-0 py-0 row-lg-6">
                                            <img class="rounded-circle" src="/smrt/img/perfil1.png" width="40" height="40">
                                            <div class="col-lg rounded" style="background-color: whitesmoke;">
                                                <a href="#" class="card-text my-0 py-0"><?php echo $linha["autor"]; ?></a>
                                                <p class="card-text my-0 py-0"><?php echo $linha["comentario"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /COMENTÁRIOS -->
                                <?php } ?>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
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
        <?php
    }
}


require_once '../rodape.php';
