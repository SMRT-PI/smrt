<?php
ini_set("display_errors", true);
include '../bd/conectar.php';
include_once './localizacao.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$conteudo = $_POST['conteudo'];
$capa = $_POST['capa'];
//$localizacao = $_POST['localizacao'];

$sql = "insert into publicacao (titulo,descricao, conteudo , capa) values ('$titulo','$descricao', '$conteudo','$capa')";

if (@mysqli_query($conexao, $sql)){
    header('Location: area_publicacao.php');
}
?>



