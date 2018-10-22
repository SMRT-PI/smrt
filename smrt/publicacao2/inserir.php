<?php
include_once '../usuario/autenticacao.php';
include '../bd/conectar.php';
include_once '../cabecalho.php';


$titulo = $_POST['titulo'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];
$descricao = $_POST['descricao'];
$conteudo = $_POST['conteudo'];
$capa = $_POST['capa'];


$sql = "insert into publicacao (titulo, lat, lon, descricao, conteudo, capa) values (default, '$titulo', '$lat', '$lon', '$descricao', '$conteudo', '$capa')";
mysqli_query($conexao, $sql);

if (@mysqli_query($conexao, $sql)){
    header('Location: area_publicacao.php');
}

include '../rodape.php';







 