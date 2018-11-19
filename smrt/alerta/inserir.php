<?php

require_once '../bd/conectar.php';

$lat = $_POST['lat'];
$lon = $_POST['lon'];

mysqli_query($conexao, "INSERT INTO alerta (lat, lon) VALUES ('$lat', '$lon')");

header('Location: teste.php');

?>