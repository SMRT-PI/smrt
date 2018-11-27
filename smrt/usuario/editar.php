<?php

require_once './autenticacao.php';
sleep(1);
require_once '../bd/conectar.php';

if (isset($_POST["email"]) && isset($_POST["senha"])) {

    $id = strip_tags($_POST['id']);
    $nome = strip_tags($_POST['nome']);
    $sobrenome = strip_tags($_POST['sobrenome']);
    $email = strip_tags($_POST['email']);
    $senha = strip_tags($_POST['senha']);

    $sql = "select * from usuario where email='$email' and email='$_SESSION[email]';";
    $retorno = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($retorno) > 0) {
        $editar = mysqli_query($conexao, "UPDATE usuario set nome='$nome', "
                . "sobrenome='$sobrenome', email='$email', senha='$senha' where id = $id");
        echo "Suas alterações foram salvas!";
    } else {
        echo "O Email já está em uso!";
    }
}
?>