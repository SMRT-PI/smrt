<?php
include_once '../usuario/autenticacao.php';
include_once '../cabecalho.php';
include_once '../bd/conectar.php';

$id = $_GET['id'];
$sql = "select * from publicacao where id = $id";
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);
?> 

<div class="jumbotron jumbotron-fluid text-center">
    <h1><?= $linha['titulo'] ?></h1>
    <h6><?= $linha['descricao'] ?></h6> 
</div>

<div class="d-flex justify-content-center text-center my-4 mx-5 conteudo">
    <p><?= $linha['conteudo'] ?></p>
    
</div>

<?php
include_once '../rodape.php';
