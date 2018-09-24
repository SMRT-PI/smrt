<?php

require_once './autenticacao.php';
ini_set("display_errors", true);
require_once '../bd/conectar.php';

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "select * from usuario where email = '$email' and senha = '$senha'";
$retorno = mysqli_query($conexao, $sql);
$resultado = mysqli_fetch_array($retorno);
$sql1 = "select administrador.id as adm, usuario.id as usuario from administrador inner join usuario on '$resultado[id]' = administrador.adm";
$retorno1 = mysqli_query($conexao, $sql);

if ($retorno === NULL) {
    logar($resultado['nome'], $resultado['sobrenome'], $resultado['email']);
    header('Location: /smrt/index.php');
} else {
    logar($resultado['nome'], $resultado['sobrenome'], $resultado['email']);
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