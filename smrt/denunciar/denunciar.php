<?php
include '../bd/conectar.php';


$id = $_GET['id'];
$Usua = $_GET['idus'];


//    echo $id;
//    echo '<br>';    
//   echo  $Usua;

$sql_pessoa = "INSERT INTO denuncia_pub (id,id_post, id_user) VALUES (default,'$id', '$Usua')";

if (mysqli_query($conexao, $sql_pessoa)){
    
    header("Location: http://localhost/smrt/publicacao/publicacao.php?id=#$id");
    
}



    

