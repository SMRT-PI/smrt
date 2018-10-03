<?php
require_once './cabecalho.php';
include '../usuario/autenticacao.php';
include '../bd/conectar.php';

if (!estaLogado()) {
    ?>
    <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
        <div class="item slides active">
            <div class="slide-1"></div>
            <div class="hero">
                <hgroup>
                    <h1>SMRT</h1>        
                    <h3>Bem-vindo ao site de mobitoramento do Rio Tubarão - SC</h3>
                </hgroup>
                <button class="btn btn-hero btn-lg" type="button" onclick="window.location.href ='http://localhost/smrt/usuario/entrar.php';">CADASTRE-SE</button>
            </div>
        </div>
    </div>

    <?php
}
require_once 'rodape.php';
?>

