<?php
include '../bd/conectar.php';


$id = $_GET['id'];
$Usua = $_GET['idus'];
$nome_denunciador = $_GET['denunciador'];
$sobrenome_denunciador = $_GET['sobrenome_denunciador'];

//    echo $id;
//    echo '<br>';    
//   echo  $Usua;

$sql_pessoa = "INSERT INTO denuncia_pub (id,id_post, id_user, nome_denunciador,sobrenome_denunciador) "
        . "VALUES (default,'$id', '$Usua','$nome_denunciador','$sobrenome_denunciador')";

if (mysqli_query($conexao, $sql_pessoa)){
    
    header("Location: http://localhost/smrt/publicacao/publicacao.php?id=#$id");
    
}



    

