<?php

sleep(2);

if (isset($_POST['nome'])) {
    $connect = new PDO("mysql:host=localhost;dbname=smrt", "root", "");

    $data = array(
        ':nome' => $_POST['nome'],
        ':sobrenome' => $_POST['sobrenome'],
        ':email' => $_POST['email'],
        ':senha' => $_POST['senha'],
    );

    $query = "
 INSERT INTO usuario 
 (nome, sobrenome, email, senha) 
 VALUES (:nome, :sobrenome, :email, md5(:senha))
 ";
    $statement = $connect->prepare($query);
    if ($statement->execute($data)) {
        echo 'Cadastrado com Sucesso!';
    }
}
?>