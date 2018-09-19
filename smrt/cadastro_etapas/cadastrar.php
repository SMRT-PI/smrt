<?php

sleep(2);
include_once '../bd/conectar.php';
if (isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'sim'):
    $novos_campos = array();
    $campos_post = $_POST['campos'];

    $respostas = array();
    foreach ($campos_post as $indice => $valor) {
        $novos_campos[$valor['name']] = $valor['value'];
    }

    if (!strstr($novos_campos['email'], '@')) {
        $respostas['erro'] = 'sim';
        $respostas['getErro'] = 'E-mail inválido, preencha com e-mail válido';
        
    } elseif ($novos_campos['senha'] != $novos_campos['csenha']) {
        $respostas['erro'] = 'sim';
        $respostas['getErro'] = 'As senhas informada não correspondem!';
        
    } elseif (strlen($novos_campos['nome']) < 2) {
        $respostas['erro'] = 'sim';
        $respostas['getErro'] = 'Preencha com um nome válido';
        
    } else {
        $respostas['erro'] = 'nao';
        $respostas['msg'] = 'Cadastrado com sucesso!';
        
        
    }
    
    
    echo json_encode($respostas);
    

endif;
?>
