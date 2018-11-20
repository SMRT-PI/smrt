<?php
include_once '../usuario/autenticacao.php';
include_once '../bd/conectar.php';

if (!$_GET['id'] || !($_GET['id'] > 0)) {
    $_SESSION['erro'] = "Id do usuário inválido";
    header('Location: amigos.php');
}

$sql = sprintf("INSERT INTO friends (idFriend, idUser) VALUES (%d, %d)", $_GET['id'], $_SESSION['id']);
mysqli_query($conexao, $sql);

if(mysqli_affected_rows($conexao) > 0){
    $_SESSION['ok'] = "Você está seguindo este usuário agora";
}else{
    $_SESSION['erro'] = "Erro ao seguir usuário";
}
header('Location: perfil.php?id=' . $_GET['id']);
