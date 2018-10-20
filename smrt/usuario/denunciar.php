<?php
require_once './autenticacao.php';
require_once '../bd/conectar.php';

$id = $_REQUEST['usuario'];
$data = (idate("Y") . "-" . idate("m") . "-" . idate("d"));

$sql = "select * from usuario where email = $_SESSION[email]";
$retorno = mysqli_query($conexao, $sql);
$denunciador_array = mysqli_fetch_array($retorno);
$denunciador = $denunciador_array['id'];

$sql_denunciado = mysqli_query($conexao, "select * from denuncia where denunciado = '$id'");
$denunciado = mysqli_fetch_array($sql_denunciado);

if ($denunciado['denunciado'] == $id) {
    $desnunciar = mysqli_query($conexao, "delete from denuncia where denunciado = '$id'");
} else {
    $denunciar = mysqli_query($conexao, "insert into denuncia (denunciador, denunciado, dataa) values ('$denunciador','$id','$data')");
}


