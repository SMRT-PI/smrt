<?php

require_once './autenticacao.php';
sleep(1);
require_once '../bd/conectar.php';

if (isset($_POST["email_login"]) && isset($_POST["senha_login"])) {

    $email = strip_tags($_POST['email_login']);
    $senha = strip_tags($_POST['senha_login']);

    $sql = "select * from usuario where email = '$email' and senha = md5('$senha')";
    $retorno = mysqli_query($conexao, $sql);
    $resultado = mysqli_fetch_array($retorno);

    $sql1 = "select * from bloqueio where bloqueado = '$resultado[id]';";
    $retorno1 = mysqli_query($conexao, $sql1);

    if (mysqli_num_rows($retorno) > 0) {

        if (mysqli_num_rows($retorno1) > 0) {
            echo "Usuário bloqueado!";
        } else {
            logar($resultado['nome'], $resultado['sobrenome'], $resultado['email'], $resultado['adm']);
            echo "Logado com sucesso!";
        }
    } else {
        echo "Email ou senha inválido!";
    }
}
?>