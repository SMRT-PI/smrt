<?php

$diretorio = "../imagem/";

if(!is_dir($diretorio)){
    echo 'Pasta $diretorio nao existe';
} else {
    $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
    for ($controle = 0; $controle < count($arquivo['name']); $controle++){
        $destino = $diretorio."/".$arquivo['name'][$controle];
        if(move_uploaded_file($arquivo['tmp_name'][$controle],$destino)){
            echo 'Upload realizado com sucesso<br>';
        } else {
            echo 'Erro ao realizar upload'; 
        }
    }
}

