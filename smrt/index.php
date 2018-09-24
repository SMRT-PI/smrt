<?php
require_once './cabecalho.php';
?>


<?php
//include_once 'css/fundoConteudo_start.php';

 if(estaLogado()){?>
    
    
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<div class="container-fluid">
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 project wow animated animated4 fadeInLeft">
        <div class="project-hover">
            <h2> <a href="publicacao/area_publicacao.php">Publicações</a></h2>
            
            <hr />
            <p>Veja as últimas postagens da página.</p>
        </div>
    </div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 project project-2 wow animated animated3 fadeInLeft">
    	<div class="project-hover">
            <h2><a href="informacao/area_info.php">Área  Informativa</a></h2>
            <hr />
            <p>Conheça mais sobre as águas que estão perto de você.</p>
  
        </div>
    </div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 project project-3 wow animated animated2 fadeInLeft">
    	<div class="project-hover">
            <h2> <a href="publicacao/form_inserir.php" >Publique</a> </h2>
            <hr />
            <p>Viu algum lixo onde não deveria? Faça uma publicação para aterdermos.</p>
            
        </div>
    </div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 project project-4 wow animated fadeInLeft">
    	<div class="project-hover">
            <h2> <a href="sobre.php">Sobre nós</a></h2>
            <hr />
            <p>Conheça um pouco mais sobre este projeto.</p>

        </div>
    </div>
    <div class="clearfix"></div>
</div>
    
<?PHP
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

