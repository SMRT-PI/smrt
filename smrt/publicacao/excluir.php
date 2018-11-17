<?php

ini_set("display_errors", true);

include '../bd/conectar.php';

$id = $_GET['id'];


$sql = "delete from pub where id_pub= $id";

mysqli_query($conexao, $sql);

header("Location: http://localhost/smrt/publicacao/publicacao.php");