<?php
include_once '../usuario/autenticacao.php';
include '../bd/conectar.php';
include_once '../cabecalho.php';

$sql_pessoa = "select * from usuario where email = '$_SESSION[email]'";
$resultado = mysqli_query($conexao, $sql_pessoa);
$linha = mysqli_fetch_array($resultado);
?>

<form method="post" action="inserir.php" enctype="multipart/form-data">

        <input type="hidden" name="autor" value="<?= $linha['id'] ?>"> 
        <input type="text" name="legenda" class="form-control py-2 my-3" placeholder="Titulo da publicação" />
        <input type="text" name="imagem" class="form-control py-2 " placeholder="Selecione a imagem" />
        <input type="text" name="titulo" class="form-control py-2 my-3" placeholder="Legenda da publicacao" />
        <input type="submit" name="enviar" class="acao btn btn-lg btn-success small mt-3" value="Enviar" />

</form>

<?php
require_once '../rodape.php';
?>
