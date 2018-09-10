<?php

include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include '../cabecalho.php';

if (estaLogado()) {
    $sql = "select * from usuario where email = '$_SESSION[email]'";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado)
?>

<h1><?= $linha['nome'] ?></h1>
<h1><?= $linha['sobrenome'] ?></h1>
<h1><?= $linha['email'] ?></h1>
<h1><?= $linha['adm'] ?></h1>

<?php

} else {
    header('Location: entrar.php');
}


require_once '../rodape.php';
