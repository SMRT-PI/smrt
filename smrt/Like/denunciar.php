<?php
include '../bd/conectar.php';


$id = $_GET['id_pub'];
$Usua = $_GET['idus'];
$nome_like = $_GET['user_like'];
$sobrenome_like = $_GET['sobrenome_like'];

echo $id;
echo $usua;
echo $nome_like;
echo $sobrenome_like;
//    echo $id;
//    echo '<br>';    
//   echo  $Usua;

//$sql_pessoa = "INSERT INTO denuncia_pub (id,id_post, id_user, id_denunciado, nome_denunciador,sobrenome_denunciador,nome_denunciado,sobrenome_denunciado) "
//        . "VALUES (default,'$id', '$Usua', '$id_denunciado', '$nome_denunciador','$sobrenome_denunciador','$nome_denunciado','$sobrenome_denunciado')";
//
//if (mysqli_query($conexao, $sql_pessoa)){
    
//    header("Location: http://localhost/smrt/publicacao/publicacao.php?id=#$id");
    
//}



    

