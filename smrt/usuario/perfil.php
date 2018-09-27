<?php
include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include '../cabecalho.php';


if (estaLogado()) {
    $sql = "select * from usuario where email = '$_SESSION[email]'";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado)
?>


                
<!--                DADOS SOBRE O USUARIO-->

                <h1><?= $linha['nome'] ?></h1>
                <h4><?= $linha['email'] ?></h4>
                <span>Informações sobre o usuário cadastrado</span>
                
<!--                DADOS SOBRE O USUARIO-->
           


<?php

} else {
    header('Location: entrar.php');
}


require_once '../rodape.php';
