<?php
require_once './cabecalho.php';
include '../usuario/autenticacao.php';
include '../bd/conectar.php';
?>


<?php
//include_once 'css/fundoConteudo_start.php';

 if(estaLogado()){

} else {?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
 
    <div class="item slides active">
      <div class="slide-1"></div>
      <div class="hero">
        <hgroup>
            <h1>SMRT</h1>        
            <h3>Bem-vindo ao site de mobitoramento do Rio Tubarão - SC</h3>
        </hgroup>
          <div class="btn btn-hero btn-lg" role="button"><a href="usuario/entrar.php" >Cadastre-se</a></i>  </div>
      </div>
    </div>
</div>

<?php

}

?>

<?php
require_once 'rodape.php';
?>

