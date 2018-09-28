<?php
include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include_once '../cabecalho.php';

if (adm()) {
    $sql_pessoa = "select * from usuario where email != '$_SESSION[email]' order by nome";
    $resultado = mysqli_query($conexao, $sql_pessoa);
}