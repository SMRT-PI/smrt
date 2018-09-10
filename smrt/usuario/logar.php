<?php

require_once './autenticacao.php';
ini_set("display_errors", true);
require_once '../bd/conectar.php';

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "select * from usuario where email = '$email' and senha = '$senha'";
$retorno = mysqli_query($conexao, $sql);
$resultado = mysqli_fetch_array($retorno);
$bloqueado = $resultado['bloqueado'];

if ($resultado['email'] === NULL || $resultado['senha'] === NULL) {
    if ($resultado['email'] === NULL) {
        $feedback = "<li>Email não cadastrado!</li>";
    }
    if ($resultado['senha'] === NULL) {
        $feedback = "<li>Senha Inválida!</li>";
    }
    if ($resultado['senha'] === NULL && $resultado['email'] === NULL) {
        $feedback = "<li>Email e Senha Inválidos!</li>";
    }
    return $feedback;
} else {
    logar($resultado['nome'], $resultado['sobrenome'], $resultado['email'], $resultado['adm']);
    header('Location: /smrt/index.php');
}
?>