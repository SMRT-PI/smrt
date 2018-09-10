<?php
include_once '../usuario/autenticacao.php';
include_once '../cabecalho.php';
include_once '../bd/conectar.php';

$sql = "select * from materia";
$resultado = mysqli_query($conexao, $sql);
?> 

<div class="jumbotron jumbotron-fluid text-center m-0 px-1 text-light" style="background-image: url(../img/fundo2.png); background-size: cover; background-attachment: fixed;">
    <h1>Materiais Para Seu Conhecimento!</h1>
    <h6>Dicas para conhecer mais sobre o mal que atinge nossos rios</h6> 
</div>

<div class="d-flex justify-content-center text-center my-3">
    <div class="list-group d-flex w-100">
        <?php
        while ($linha = mysqli_fetch_array($resultado)) {
            ?>
            <a class="hover-zoom list-group-item my-1 list-group-item-action flex-column align-items-start img-fluid" href="conteudo.php?id=<?= $linha['id'] ?>" style="background-image: url(../img/<?= $linha['capa'] ?>);" >
                <div class="d-flex w-100 justify-content-center">
                    <h2 class="font-weight-light"><kbd><?= $linha['titulo'] ?></kbd></h2>
                </div>
                <p class="mb-1 font-weight-light"><kbd><?= $linha['descricao'] ?></kbd></p>
            </a>
        <?php } ?>
    </div>
</div>
<?php
include_once '../rodape.php';
