<?php
include '../bd/conectar.php';


$id = $_GET['id'];
$Usua = $_GET['idus'];
$id_denunciado = $_GET['id_denunciado'];
$nome_denunciador = $_GET['denunciador'];
$sobrenome_denunciador = $_GET['sobrenome_denunciador'];
$nome_denunciado = $_GET['nome_denunciado'];
$sobrenome_denunciado = $_GET['sobrenome_denunciado'];
echo $nome_denunciado;
echo $sobrenome_denunciado;
//    echo $id;
//    echo '<br>';    
//   echo  $Usua;

$sql_pessoa = "INSERT INTO denuncia_pub (id,id_post, id_user, id_denunciado, nome_denunciador,sobrenome_denunciador,nome_denunciado,sobrenome_denunciado) "
        . "VALUES (default,'$id', '$Usua', '$id_denunciado', '$nome_denunciador','$sobrenome_denunciador','$nome_denunciado','$sobrenome_denunciado')";

if (mysqli_query($conexao, $sql_pessoa)){
    
    header("Location: http://localhost/smrt/publicacao/publicacao.php?id=#$id");
    
}



    

