<?php
require_once './autenticacao.php';
ini_set("display_errors", true);
require_once '../bd/conectar.php';

if (isset($_POST["email"]) && isset($_POST["senha"])) {

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "select * from usuario where email = '$email' and senha = md5('$senha')";
    $retorno = mysqli_query($conexao, $sql);
    $resultado = mysqli_fetch_array($retorno);

    logar($resultado['nome'], $resultado['sobrenome'], $resultado['email'], $resultado['adm']);
    header('Location: /smrt/index.php');
}

//if (isset($_POST["email"]) && isset($_POST["senha"])) {
//    $connect = new PDO("mysql:host=localhost;dbname=smrt", "root", "ifsc");
//
//    $data = array(
//        ':nome' => $_POST['nome'],
//        ':sobrenome' => $_POST['sobrenome'],
//        ':email' => $_POST['email'],
//        ':senha' => $_POST['senha'],
//    );
//
//    $query = "select * from usuario where email = '$email' and senha = '$senha'";
//    $statement = $connect->prepare($query);
//    if ($statement->execute($data)) {
//        
//    }
//}
?>

//<?php
//
//ini_set('display_errors', true);
//error_reporting(E_ALL);
//
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//
//    $sql = "INSERT INTO usuario (nome, sobrenome,email,senha) VALUES
//('" . getPost('nome') . "', '" . getPost('sobrenome') . "', '" . getPost('email') . "', '" . md5(getPost('senha')) . "')";
//    $retorno = mysqli_query($conexao, $sql);
//}
//?>