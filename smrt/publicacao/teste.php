<?php
include_once '../cabecalho.php';
include_once '../bd/conectar.php';
include_once '../publicacao/jvBotaoLike.php';
include_once '../usuario/autenticacao.php';

$sql = "SELECT pub.id,pub.legenda,pub.comentarios,pub.imagem,pub.autor,pub.dataa,usuario.id,usuario.nome,usuario.sobrenome
FROM pub inner join usuario on pub.autor = usuario.id order by dataa DESC;";
$resultado = mysqli_query($conexao, $sql);
?>
<link rel="stylesheet" href="css/style.css">
<?php
if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $retorno_denunciados = mysqli_query($conexao, "select * from denuncia where denunciado = $linha[id]");
        $denunciado = mysqli_fetch_array($retorno_denunciados);
        ?>

        <div class="row my-3">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-header bg-light">
                        <a class="float-left text-dark">
                            <strong class=""><?= $linha["nome"] ?> <?= $linha["sobrenome"] ?></strong>
                        </a>
<!--                        <p class="float-left text-muted" style="font-size: 70%"><?php echo $linha["dataa"] ?></p>-->

                        <button type="button" id="denunciar" onclick="denunciar(<?= $denunciado['denunciado'] ?>)"
                                class="<?php if (($linha['id'] !== $denunciado['denunciado']) || ($denunciado['denunciado'] == NULL)) { ?>
                                    btn-light
                                <?php } else { ?>
                                    btn-danger <?php } ?> btn btn-sm text-center float-right">

                            <?php if ($denunciado['denunciado'] !== $linha['id']) { ?>
                                DENUNCIAR<?php } else { ?>
                                DENUNCIADO<?php } ?>
                        </button>
                    </div>
                    <div class="card-body">
                        <p class="card-text container-fluid"><?php echo $linha["legenda"] ?></p>
                        <div class="container-fluid">
                            <img class="img-fluid" src="/smrt/img/<?php echo $linha["imagem"]; ?>" style="min-width: 100%">
                        </div>
                    </div>
                    <div class="card-footer bg-light">

                        <div class="row text-center">
                            <div class="float-right col" style="border-right: threedshadow">
                                <span class="like-btn"> 
                                    <span class="fa like-btn-emo fa-thumbs-o-up"></span> 
                                    <span class="like-btn-text">Like</span>   
                                    <ul class="reactions-box">
                                        <li class="reaction reaction-like" data-reaction="Like"></li>
                                        <li class="reaction reaction-love" data-reaction="Love"></li>
                                        <li class="reaction reaction-haha" data-reaction="HaHa"></li>
                                        <li class="reaction reaction-wow" data-reaction="Wow"></li>
                                        <li class="reaction reaction-sad" data-reaction="Sad"></li>
                                        <li class="reaction reaction-angry" data-reaction="Angry"></li>
                                    </ul>
                                </span>
                            </div>
                            <div class="col"> Cometar </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>

            function denunciar(usuario) {
                var xhttp;
                if (window.XMLHttpRequest) {
                    // codigo para browsers modernos
                    xhttp = new XMLHttpRequest();
                } else {
                    // codigo para IE6, IE5
                    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        location.reload();
                    }
                };
                xhttp.open("POST", "denunciar.php?usuario=" + usuario, true);
                xhttp.send();
            }

        </script>

        <!--        <div class="row">
                    <div class="col-sm-6 offset-md-3">

                        <div class="post-content">
                            <h4><?php echo $linha["legenda"]; ?></h4>
                            <span class="text-muted small"><i class="fas fa-user"> </i> <?php echo $linha["autor"]; ?> - <i class="far fa-clock"></i > <?php echo $linha["dataa"]; ?> </span>
                            <div class="media">
                                <img class="mr-3" src="../img/rio1.jpg">
                                <div class="media-body">
        <?php echo $linha["titulo"]; ?>
                                </div>


                                <div class="facebook-reaction"> container div for reaction system  
                                    <span class="like-btn">  Default like button  
                                        <span class="fa like-btn-emo fa-thumbs-o-up"></span>  Default like button emotion 
                                        <span class="like-btn-text">Like</span>   Default like button text,(Like, wow, sad..) default:Like  
                                        <ul class="reactions-box">
                                            Reaction buttons container
                                            <li class="reaction reaction-like" data-reaction="Like"></li>
                                            <li class="reaction reaction-love" data-reaction="Love"></li>
                                            <li class="reaction reaction-haha" data-reaction="HaHa"></li>
                                            <li class="reaction reaction-wow" data-reaction="Wow"></li>
                                            <li class="reaction reaction-sad" data-reaction="Sad"></li>
                                            <li class="reaction reaction-angry" data-reaction="Angry"></li>
                                        </ul>
                                    </span>
                                    <div class="like-stat">  Like statistic container 
                                    </div>


                                </div>

                            </div>
                        </div>-->
        <?php
    }
}
require_once '../rodape.php';
