<?php

ini_set("display_errors", true);

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

include '../bd/conectar.php';

$sql = "insert into usuario (nome,sobrenome,senha,email) values ('$nome','$sobrenome','$senha','$email')";

if (@mysqli_query($conexao, $sql)) {
    header('Location: index.php');
} else {
    echo 'Usuário ou e-mail já cadastrados <br> <a href=entrar.php>OK</a>';
}
?>



