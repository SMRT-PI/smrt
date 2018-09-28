<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_REQUEST['id'];
$adm = $_REQUEST['adm'];

$sql = "insert into bloqueio (bloqueador, bloqueado, data) values($adm,$id, 2018-09-28)";
$resultado = mysqli_query($conexao, $sql);

//$linha = mysqli_fetch_array($resultado);
//
//if ($linha['bloqueado'] == TRUE) {
//
//    $sql_desbloquear = "update usuario set bloqueado = FALSE where id = $id";
//    mysqli_query($conexao, $sql_desbloquear);
//} else {
//
//    $sql_bloquear = "update usuario set bloqueado = TRUE where id = $id";
//    mysqli_query($conexao, $sql_bloquear);
//}