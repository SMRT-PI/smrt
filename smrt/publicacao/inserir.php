<?php
require_once './form_inserir.php';

$legenda = $_POST['legenda'];
$imagem = $_POST['imagem'];
$autor = $Name_autor;
$titulo = $_POST['titulo'];
$data = (idate("Y") . "-" . idate("m") . "-" . idate("d"));


include '../bd/conectar.php';

$sql_pessoa = "INSERT INTO pub (legenda, imagem, autor, titulo, dataa) VALUES ('$legenda', '$imagem','$autor','$titulo','$data')";

mysqli_query($conexao, $sql_pessoa);
//echo $autor;



