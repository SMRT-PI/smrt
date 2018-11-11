<?php
include '../bd/conectar.php';

$post = $_POST['id_post'];
$usuario = $_POST['id_user'];

$comprovar = "SELECT * FROM likes WHERE id_post = $post AND id_user = $usuario";
$count = mysqli_num_rows($comprovar);

if ($count == 0){
    $insert = mysqli_query($conexao, "INSERT INTO likes (id_user,id_post) values ('$usuario','$post')");
    $update = mysqli_query($conexao, "UPDATE pub SET likes = likes+1 WHERE id_pub = $post");
} else {
    $delete = mysqli_query($conexao, "DELETE FROM likes WHERE id_post = $post AND id_user = $usuario");
    $update = mysqli_query($conexao, "UPDATE pub SET likes = likes-1 WHERE id_pub = $post");  
}

$contar = mysqli_query($conexao, "SELECT likes FROM pub WHERE id_pub = $post");
$cont = mysqli_query($conexao, $contar);
$likes = $cont['likes'];

if ($cont >= 1){
    $curtir = "Curtir";
    $likes = $likes++;
} else {
    $curtir = "Descurtir";
    $likes = $likes--;
}

$datos = array('likes' =>$likes, 'text' =>$cutir);

echo json_encode($datos);

?>