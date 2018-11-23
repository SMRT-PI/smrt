<?php
session_start();
ini_set('display_errors',0);
ini_set('display_startup_errors',0);
error_reporting(E_ALL);
date_default_timezone_set("America/Sao_Paulo");

$btnclick = 0;

function logar($nome, $sobrenome, $email, $adm) {
    $_SESSION['nome'] = $nome;
    $_SESSION['sobrenome'] = $sobrenome;
    $_SESSION['email'] = $email;
    $_SESSION['adm'] = $adm;
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
    if ($_SESSION['adm'] == TRUE) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function admin() {
    if (estaLogado()) {
        if (adm()) {
            return TRUE;
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}

function iniciarTempoSessao() {
    $_SESSION['tempo'] = time() + 500;
}
