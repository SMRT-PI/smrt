<?php

//sleep(1);
//include_once '../bd/conectar.php';
//if (isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'sim'):
//    $novos_campos = array();
//    $campos_post = $_POST['campos'];
//
//    $respostas = array();
//    foreach ($campos_post as $indice => $valor) {
//        $novos_campos[$valor['name']] = $valor['value'];
//    }
//
//    if (!strstr($novos_campos['email'], '@')) {
//        $respostas['erro'] = 'sim';
//        $respostas['getErro'] = 'E-mail Inválido, Preencha com E-mail Válido';
//    } elseif ($novos_campos['senha'] != $novos_campos['csenha']) {
//        $respostas['erro'] = 'sim';
//        $respostas['getErro'] = 'As Senhas não Correspondem!';
//    } elseif (strlen($novos_campos['nome']) < 2) {
//        $respostas['erro'] = 'sim';
//        $respostas['getErro'] = 'Preencha com um Nome Válido';
//    } else {
//        $respostas['erro'] = 'nao';
//        $respostas['msg'] = 'Cadastrado com Sucesso!';
//    }
//
//
//    echo json_encode($respostas);
//
//
//endif;
?>

<?php

//action.php

sleep(2);

if (isset($_POST['nome'])) {
    $connect = new PDO("mysql:host=localhost;dbname=smrt", "root", "ifsc");

    $data = array(
        ':nome' => $_POST['nome'],
        ':sobrenome' => $_POST['sobrenome'],
        ':email' => $_POST['email'],
        ':senha' => $_POST['senha'],
    );

    $query = "
 INSERT INTO usuario 
 (nome, sobrenome, email, senha) 
 VALUES (:nome, :sobrenome, :email, :senha)
 ";
    $statement = $connect->prepare($query);
    if ($statement->execute($data)) {
        echo 'Registration Completed Successfully...';
    }
}
?>