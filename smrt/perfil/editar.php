<?php
include_once '../usuario/autenticacao.php';
include_once '../bd/conectar.php';
include_once '../cabecalho.php';

$sobre = $_POST['sobre'];
$experiencias = $_POST['experiencias'];
$hobbies = $_POST['hobbies'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$id = $_POST['id'];

$sql = "UPDATE usuario SET sobre='$sobre', experiencias='$experiencias', hobbies='$hobbies', endereco='$endereco', cidade='$cidade', estado='$estado', nome='$nome', sobrenome='$sobrenome', email='$email', senha='$senha' WHERE id = $id";
           
mysqli_query($conexao, $sql);

?>

<?php

require_once '../rodape.php';
