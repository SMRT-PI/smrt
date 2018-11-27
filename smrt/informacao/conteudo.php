<?php
include_once '../usuario/autenticacao.php';
include_once '../cabecalho.php';
include_once '../bd/conectar.php';

$id = $_GET['id'];
$sql = "select * from area_info where id = $id";
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);
?> 

<div class="jumbotron jumbotron-fluid text-center img-fluid" style="background-image: url(../img/<?= $linha['capa'] ?>);
     background-size: cover;background-position:center;">
    <h1><kbd><?= $linha['titulo'] ?></kbd></h1>
    <h6><kbd><?= $linha['descricao'] ?></kbd></h6> 
</div>

<div class="d-flex justify-content-center text-center my-4 mx-5 conteudo p-5" style="border-radius: 60px;">
    <p><?= $linha['conteudo'] ?></p>

</div>

<?php
include_once '../rodape.php';
