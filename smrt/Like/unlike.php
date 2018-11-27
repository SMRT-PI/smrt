<?php
require_once '../bd/conectar.php';
require_once '../usuario/autenticacao.php';

ini_set("display_errors", true);

$id = $_GET['id_like'];

if (!estaLogado()) {
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/usuario/entrar.php'>
                <script type=\"text/javascript\">
                alert(\"Entre com sua conta!\");
                </script>";
} else {
    $sql_pessoa = "delete from likes where id_like= $id";

    mysqli_query($conexao, $sql_pessoa);
    header("Location:/smrt/publicacao/publicacao.php?id=#$idc");
}



    

