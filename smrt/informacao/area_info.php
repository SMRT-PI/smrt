<?php
include_once '../usuario/autenticacao.php';
include_once '../cabecalho.php';
include_once '../bd/conectar.php';

$sql = "SELECT area_info.id_info,area_info.titulo,area_info.descricao,area_info.conteudo,area_info.imagem,"
        . "area_info.autor,area_info.dataa,usuario.id,usuario.nome,usuario.sobrenome,"
        . "date_format(dataa, '%d-%m-%Y %H:%i:%s') as dataa FROM"
        . " area_info inner join usuario on area_info.autor = usuario.id order by dataa Desc;";
$resultado = mysqli_query($conexao, $sql);
?>
<?php $teste = ['imagem']; ?>

    <div class="jumbotron jumbotron-fluid text-center m-0 px-1 text-light" style="background-image: url(../img/<?= $linha_1['imagem']; ?>); background-size: cover; background-attachment: fixed;">
        <h1>Materiais Para Seu Conhecimento!</h1>
        <h6>Dicas para conhecer mais sobre o mal que atinge nossos rios</h6> 
    </div>

<div class="d-flex justify-content-center text-center my-3">
    <div class="list-group d-flex w-100">
        <?php
        if (mysqli_num_rows($resultado) > 0) {
            while ($linha = mysqli_fetch_array($resultado)) {
                ?>
                <a class="hover-zoom list-group-item my-1 list-group-item-action flex-column align-items-start img-fluid" href="conteudo.php?id=<?= $linha['id'] ?>" style="background-image: url(../img/foto1.jpg<?= $linha['capa'] ?>);" >
                    <div class="d-flex w-100 justify-content-center">
                        <h2 class="font-weight-light"><kbd><?= $linha['titulo'] ?></kbd></h2>
                    </div>
                    <p class="mb-1 font-weight-light"><kbd><?= $linha['descricao'] ?></kbd></p>
                </a>
            <?php } ?>
        <?php } else { ?>
            <div>
                <h5 class="text-muted">Nenhuma matéria encontrada!</h5>
            </div>
        <?php } ?>
    </div>
</div>
<?php
include_once '../rodape.php';
