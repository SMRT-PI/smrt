<?php

require_once './autenticacao.php';
require_once '../bd/conectar.php';

$id = $_REQUEST['denunciado'];
$data = (idate("Y") . "-" . idate("m") . "-" . idate("d"));

$sql_adm = "select * from usuario where email = $_SESSION[email]";
$retorno_adm = mysqli_query($conexao, $sql_adm); //PEGA O USUÁRIO QUE ESTÁ REALIZANDO A OPERAÇÃO (ADMINISTRADOR);
$adm_array = mysqli_fetch_array($retorno_adm);
$adm = $adm_array['id'];

$retorno_usuario = mysqli_query($conexao, "select * from usuario where id = '$id'"); //PEGA O USUÁRIO A SER BLOQUEADO/DESBLOQUEADO;
$usuario = mysqli_fetch_array($retorno_usuario);

$sql_bloqueado = mysqli_query($conexao, "select * from bloqueio where bloqueado = '$id'");
$bloqueado = mysqli_fetch_array($sql_bloqueado);

if ($bloqueado['bloqueado'] == $id) {
    $desbloquear = mysqli_query($conexao, "delete from bloqueio where bloqueado = '$id'");
} else {
    $bloquear = mysqli_query($conexao, "insert into bloqueio (bloqueador, bloqueado, dataa) values ('$adm','$id','$data')");
}


