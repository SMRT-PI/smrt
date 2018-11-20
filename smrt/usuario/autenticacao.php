<?php

session_start();

function logar($nome, $sobrenome, $email, $adm, $id) {
    $_SESSION['nome'] = $nome;
    $_SESSION['sobrenome'] = $sobrenome;
    $_SESSION['email'] = $email;
    $_SESSION['adm'] = $adm;
    $_SESSION['id'] = $id;
    iniciarTempoSessao();
}

function deslogar() {
    session_destroy();
}

function sessaoExpirada() {
    if ($_SESSION['tempo'] < time()) {
        return true;
    } else {
        // reiniciar sessao
        iniciarTempoSessao();
        return false;
    }
}

function autenticar() {
    //se NAO estaLogado ou sessaoExpirada
    if (!estaLogado() || sessaoExpirada()) {
        deslogar();
        header('Location: form_login.php');
    } else {
        return true;
    }
}

function estaLogado() {
    return isset($_SESSION['email']);
}

function adm() {
 if(isset($_SESSION['adm']) === TRUE){
     return TRUE;
 } else {
     return FALSE;    
 }
}

function iniciarTempoSessao() {
    $_SESSION['tempo'] = time() + 500;
}
