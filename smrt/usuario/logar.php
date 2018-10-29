<?php

//require_once './autenticacao.php';
//ini_set("display_errors", true);
require_once '../bd/conectar.php';
//
//if (isset($_POST["email"]) && isset($_POST["senha"])) {
//
//    $email = $_POST["email"];
//    $senha = $_POST["senha"];
//
//    $sql = "select * from usuario where email = '$email' and senha = '$senha'";
//    $retorno = mysqli_query($conexao, $sql);
//    $resultado = mysqli_fetch_array($retorno);
//
//    logar($resultado['nome'], $resultado['sobrenome'], $resultado['email'], $resultado['adm']);
//    header('Location: /smrt/index.php');
//}
?>

<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "INSERT INTO usuario (nome, sobrenome,email,senha) VALUES
('" . getPost('nome') . "', '" . getPost('sobrenome') . "', '" . getPost('email') . "', '" . md5(getPost('senha')) . "')";
    $retorno = mysqli_query($conexao, $sql);
}
?>