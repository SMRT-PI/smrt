<?php
include_once '../usuario/autenticacao.php';
include_once '../cabecalho.php';
include_once '../bd/conectar.php';
?>
<script type="text/javascript" src="../js/likes.js"></script>
<?php
$sql = "SELECT pub.id_pub,pub.legenda,pub.imagem,pub.autor,pub.dataa,usuario.id,usuario.nome,usuario.sobrenome,
date_format(dataa, '%d-%m-%Y %H:%i:%s') as dataa FROM pub inner join usuario on pub.autor = usuario.id order by dataa Desc;";


$resultado = mysqli_query($conexao, $sql);

require_once './form_inserir.php';

if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id_pub'];
        $id_us = $linha['id'];
        $nome_denunciador = $_SESSION['nome'];
        $id_denunciado = $linha['autor'];
        $sobrenome_denunciador = $_SESSION['sobrenome'];
        echo $id_denunciado;
        ?>
        <div class="row my-3">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-header bg-light">

                        <div class="dropdown">
                            <button class="btn btn btn-outline-secondary float-right " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Left Align" style="width: 6%">
                                <span class="fa fa-bars" aria-hidden="true"></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="../denunciar/denunciar.php?idus=<?=$id_us?>&id=<?= $id?>&denunciador=<?= $nome_denunciador?>&sobrenome_denunciador=<?= $sobrenome_denunciador?>">Denunciar Publicação</a>
                            </div>
                        </div>

                        <a class="text-dark">
                            <div class="row-lg-6" id="<?php echo $id; ?>">
                                <img class="rounded-circle" src="/smrt/img/m1.jpg" width="40" height="40">
                                <strong class=""><?= $linha["nome"] ?> <?= $linha["sobrenome"] ?></strong>
                                <strong class="float-right text-muted" style="font-size: 70%"><?php echo $linha["dataa"] ?></strong>
                            </div>
                        </a>
                        

                    </div>
                    <div class="card-body">
                        <p class="card-text container-fluid"><?php echo $linha["legenda"] ?></p>
                        <div class="container-fluid">
                            <img class="img-fluid" src="/smrt/img/<?php echo $linha["imagem"]; ?>" style="min-width: 100%">
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <div class="row text-center" id="headingOne">
                            <?php
                            $sql4 = "SELECT * FROM likes WHERE id_post = $id AND id_user = $id_us";
                            $query = mysqli_query($conexao, $sql4);
                            
                            if (mysqli_num_rows($query) == 0) {
                                while ($linha = mysqli_fetch_assoc($query)) {
                                ?>
                                <div class = "col"><button class = "btn bg-transparent like" type = "button" id = "<?php echo $linha['id_pub']; ?>"><i class = "fa fa-thumbs-o-up"></i> Curtir </button></div><span id = "likes_<?php $linha['id_pub']; ?>">(<?php $linha['likes']; ?>)</span>
                            <?php} }else { ?>
                                <div class = "col"><button class = "btn bg-transparent like" type = "button" id = "<?php echo $linha['id_pub']; ?>"><i class = "fa fa-thumbs-o-up"></i> Descurtir </button></div><span id = "likes_<?php $linha['id_pub']; ?>">(<?php $linha['likes']; ?>)</span>
                                <?php } ?>
                            <?php } ?>

                            <div class = "col"><button class = "btn bg-transparent" type = "button" name = "botao"> Mapa </button></div>
                            <div class = "col"><button class = "btn bg-transparent" data-toggle = "collapse" data-target = "#collapseOne" aria-expanded = "true" aria-controls = "collapseOne"> Comentar </button></div>
                        </div>
                    </div>

                    <div class = "float-center collapse show" id = "collapseOne" aria-labelledby = "headingOne" data-parent = "#accordion" id = "<?php echo $id; ?>" >
                        <form action = "inserir_comentario.php" method = "post" name = "form_comentario" id = "form_comentario">
                            <input type = "text" name = "comentario" size = "50" placeholder = "Digite seu comentario!" class = "form-control campo "/>
                            <input type = "hidden" name = "id_postagem" value = "<?php echo $id ?>"/>
                            <input type = "hidden" name = "enviar" class = "btn btn-success float-left" value = "Enviar"/>
                        </form>
                    </div>

                    <?php
                    $resultado2 = mysqli_query($conexao, "SELECT * FROM comentario WHERE id_postagem = $id");
                    if (mysqli_num_rows($resultado2) > 0) {
                        while ($linha = mysqli_fetch_assoc($resultado2)) {
                            $idc = $linha['idc'];
                            ?>
                            <div class="card w-100"<?php echo $id; ?>>
                                <div class="card-body" id="<?php echo $id; ?>">
                                    <h5 class="card-title"><?php echo $linha["autor"]; ?></h5>
                                    <p class="card-text"><?php echo $linha["comentario"]; ?></p>

                                </div>
                            </div>
                        <?php } ?>
                        <?php
                    }
                    ?>

                    <!--                    <div class="card w-100">
                                            <div class="card-body">
                                                <h5 class="card-title">Autor</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            </div>
                                        </div>-->
                </div>
            </div>
        </div>
        <?php
    }
}


require_once '../rodape.php';
