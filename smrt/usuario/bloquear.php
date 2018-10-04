<?php

ini_set("display_errors", true);

include '../bd/conectar.php';


$id = $_REQUEST['id'];
$adm = $_SESSION['adm'];
$data = getdate();

$sql = "insert into bloqueio (bloqueador, bloqueado, dataa) values($adm,$id,$data)";
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