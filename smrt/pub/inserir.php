<?php
require_once './form_pub.php';

$legenda = $_POST['legenda'];
$imagem = $_POST['imagem'];
$autor = $Name_autor;
$titulo = $_POST['titulo'];


include '../bd/conectar.php';

$sql_pessoa = "INSERT INTO pub (legenda, imagem, autor, titulo) VALUES ('$legenda', '$imagem','$autor','$titulo')";

mysqli_query($conexao, $sql_pessoa);
//echo $autor;



