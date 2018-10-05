<?php

require_once './autenticacao.php';
require_once '../bd/conectar.php';

$id = $_REQUEST['denunciado'];
$data = (idate("Y") . "-" . idate("m") . "-" . idate("d"));

$retorno_adm = mysqli_query($conexao, "select * from usuario where email = $_SESSION[email]"); //PEGA O USUÁRIO QUE ESTÁ REALIZANDO A OPERAÇÃO (ADMINISTRADOR);
$adm_array = mysqli_fetch_array($retorno_adm);
$adm = $adm_array[id];

$retorno_usuario = mysqli_query($conexao, "select * from usuario where id = $id"); //PEGA O USUÁRIO A SER BLOQUEADO/DESBLOQUEADO;
$usuario = mysqli_fetch_array($retorno_usuario);

//$retorno_bloqueados = mysqli_query($conexao, "select * from bloqueio");
//while ($bloqueados = mysqli_fetch_array($retorno_bloqueados)) {
//
//    if ($bloqueados['bloqueado'] == $linha[id]) {
//        $desbloquear = mysqli_query($conexao, "delete from bloqueio where bloqueado = $id");
//    } else {
$bloquear = mysqli_query($conexao, "insert into bloqueio (bloqueador, bloqueado, dataa) values ($adm,$id,'$data')");
//    }
//}