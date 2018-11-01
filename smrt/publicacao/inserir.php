<?php
require_once './form_inserir.php';

$legenda = $_POST['legenda'];
$imagem = $_POST['imagem'];
$autor = $Name_autor;
$data = (idate("Y") . "-" . idate("m") . "-" . idate("d"));


include '../bd/conectar.php';

$sql_pessoa = "INSERT INTO pub (legenda, imagem, autor, dataa) VALUES ('$legenda', '$imagem','$autor','$data')";

mysqli_query($conexao, $sql_pessoa);
//echo $autor;



