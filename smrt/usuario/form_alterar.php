<?php
include '../cabecalho.php';
$id = $_GET['id'];
include '../bd/conectar.php';
$sql_pessoa = "select * from usuario where id = $id";
$resultado = mysqli_query($conexao, $sql_pessoa);
$linha = mysqli_fetch_array($resultado);
?>

<form method="post" action="alterar.php">
    <input type="hidden" name="id" value="<?= $id ?>">
    Nome: <input type="text" name="nome" value="<?= $linha['nome'] ?>">
    E-mail: <input type="text" name="email" value="<?= $linha['email'] ?>">
    <input type="submit" value="Alterar">
</form>

<?php
require_once '../rodape.php';
