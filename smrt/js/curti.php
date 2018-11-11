<?php
session_start();
include '../bd/conectar.php';

$post = mysqli_real_escape_string($_POST['id']);
$usuario = $_SESSION['id'];




