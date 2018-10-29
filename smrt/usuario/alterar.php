<?php
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

include '../bd/conectar.php';

$sql_pessoa = "update usuario set nome='$nome', email='$email' where id = $id";

mysqli_query($conexao, $sql_pessoa);

header('Location: form_inserir.php');
