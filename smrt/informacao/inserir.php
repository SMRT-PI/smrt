<?php
ini_set("display_errors", true);
include '../bd/conectar.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$conteudo = $_POST['conteudo'];
$autor = $_POST['autor'];
$capa = $_POST['capa'];

$sql = "insert into materia (titulo,descricao,conteudo,autor,capa) values ('$titulo','$descricao','$conteudo', $autor, '$capa')";

if (@mysqli_query($conexao, $sql)){
    header('Location: area_info.php');
}
?>



