<?php  
 
// session_start();
 ini_set("display_errors", true);

require_once './autenticacao.php';
require_once '../bd/conectar.php';

$_SESSION['erro'] = '';

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = sprintf("select * from usuario where email = '%s' and senha = md5('%s')", $email, $senha);
$retorno = mysqli_query($conexao, $sql);
$resultado = mysqli_fetch_array($retorno);

//echo "TESTE: " . print_r($resultado);;
//exit;

if (!$resultado) {
    $_SESSION['erro'] = 'Usuário ou senha inválido';
    header('Location: http://localhost/smrt/usuario/entrar.php');
    die();
}

$sql1 = sprintf("select administrador.id from administrador where adm = %d", $resultado['id']);
$retorno1 = mysqli_query($conexao, $sql);
$resultado1 = mysqli_fetch_array($retorno1);

$isAdmin = $resultado1['id'] >= 1;
logar($resultado['nome'], $resultado['sobrenome'], $resultado['email'], $isAdmin, $resultado['id']);
header("Location: http://localhost/smrt/usuario/listar.php");


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