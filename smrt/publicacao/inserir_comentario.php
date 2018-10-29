<?php
    include_once '../usuario/autenticacao.php';

    $id = $_POST['id_postagem'];
    $comentario = $_POST['comentario'];
    $autor = $_SESSION['nome'];
    $data = (idate("Y") . "-" . idate("m") . "-" . idate("d"));


include '../bd/conectar.php';

$sql_pessoa = "INSERT INTO comentario (id_postagem, comentario, autor, dataa) VALUES ('$id', '$comentario','$autor','$data')";

mysqli_query($conexao, $sql_pessoa);

header("Location: http://localhost/smrt/publicacao/teste.php#$id");
//echo $autor;



