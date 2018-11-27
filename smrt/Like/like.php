<?php
require_once '../bd/conectar.php';
require_once '../usuario/autenticacao.php';

$id = $_GET['id_pub'];
$id_user = $_GET['id_us'];
$nome_like = $_GET['user_like'];
$sobrenome_like = $_GET['sobrenome_like'];

if (!estaLogado()) {
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/usuario/entrar.php'>
                <script type=\"text/javascript\">
                alert(\"Entre com sua conta!\");
                </script>";
} else {
    $sql_pessoa = "INSERT INTO likes VALUES (default, '$id_user', '$id','$nome_like','$sobrenome_like');";

    mysqli_query($conexao, $sql_pessoa);
    echo $sql_pessoa;
//    header("Location:/smrt/publicacao/publicacao.php?id=#$idc");
}



    

