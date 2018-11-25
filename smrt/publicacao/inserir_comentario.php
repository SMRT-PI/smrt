<?php

require_once '../usuario/autenticacao.php';
require_once '../bd/conectar.php';

$id = $_POST['id_postagem'];
$comentario = $_POST['comentario'];
$autor = $_SESSION['nome'];
$data = (idate("Y") . "-" . idate("m") . "-" . idate("d"));

if (!estaLogado()) {
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/usuario/entrar.php'>
                <script type=\"text/javascript\">
                alert(\"Entre com sua conta!\");
                </script>";
} else {
    $sql_pessoa = "INSERT INTO comentario (id_postagem, comentario, autor, dataa) VALUES ('$id', '$comentario','$autor','$data')";

    mysqli_query($conexao, $sql_pessoa);

    header("Location:/smrt/publicacao/publicacao.php?id=#$idc");
}


