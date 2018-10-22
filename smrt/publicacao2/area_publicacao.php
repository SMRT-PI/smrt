<?php
include_once '../usuario/autenticacao.php';
include_once '../cabecalho.php';
include_once '../bd/conectar.php';


$sql = "select * from publicacao";
$resultado = mysqli_query($conexao, $sql);
?> 

<div class="jumbotron jumbotron-fluid text-center" style="background-image: url(../img/fundo2.png); background-size: cover; background-attachment: fixed;">
    <h1>Publicações</h1>
    <h6>Conheça mais sobre...</h6> 
</div>

<div class="d-flex justify-content-center text-center mb-1 pai">
    <div class="list-group d-flex w-100">
        <?php
        while ($linha = mysqli_fetch_array($resultado)) {
            ?>
            <a class="hover-zoom list-group-item my-1 list-group-item-action flex-column align-items-start img-fluid" href="conteudo.php?id=<?= $linha['id'] ?>" style="background-image: url(../img/<?= $linha['capa'] ?>);" >
                <div class="d-flex w-100 justify-content-center">
                    <h2 class="font-weight-light"><kbd><?= $linha['titulo'] ?></kbd></h2>
                </div>
                <p class="mb-1 "><?= $linha['descricao'] ?></p>
            </a>
        <?php } ?>
        <div class="w3-container">
         <button class="w3-button w3-xlarge w3-circle w3-black" onclick="window.location.href='form_inserir.php'"> + </button>
</div>
    </div> 
</div>
     

<?php
require_once '../rodape.php';
