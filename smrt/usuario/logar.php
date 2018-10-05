<?php

require_once './autenticacao.php';
ini_set("display_errors", true);
require_once '../bd/conectar.php';

if (isset($_POST["email"]) && isset($_POST["senha"])){

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "select * from usuario where email = '$email' and senha = '$senha'";
$retorno = mysqli_query($conexao, $sql);
$resultado = mysqli_fetch_array($retorno);

//if (!strstr($resultado['email'], '@')) {
//        $respostas['erro'] = 'sim';
//        $respostas['getErro'] = 'E-mail inválido, preencha com e-mail válido';
//    } elseif ($resultado['senha'] != $senha) {
//        $respostas['erro'] = 'sim';
//        $respostas['getErro'] = 'As senhas informada não correspondem!';
//    } else {
//        $respostas['erro'] = 'nao';
//        $respostas['msg'] = 'Cadastrado com sucesso!';
//    }


logar($resultado['nome'], $resultado['sobrenome'], $resultado['email'], $resultado['adm']);
header('Location: /smrt/index.php');
}

//require_once './autenticacao.php';
//require_once '../bd/conectar.php';
//if (isset($_POST['logar']) && $_POST['logar'] == 'sim'):
//
//    $novos_campos = array();
//    $campos_post = $_POST['campos'];
//
//    $respostas = array();
//    foreach ($campos_post as $indice => $valor) {
//        $novos_campos[$valor['name']] = $valor['value'];
//    }
//
//    if (!strstr($retorno['email'], '@')) {
//        $respostas['erro'] = 'sim';
//        $respostas['getErro'] = 'E-mail inválido, preencha com e-mail válido';
//    } elseif ($retorno['senha'] != $senha) {
//        $respostas['erro'] = 'sim';
//        $respostas['getErro'] = 'As senhas informada não correspondem!';
//    } else {
//        $respostas['erro'] = 'nao';
//        $respostas['msg'] = 'Cadastrado com sucesso!';
//    }
//
//    echo json_encode($respostas);
//
//endif;
?>