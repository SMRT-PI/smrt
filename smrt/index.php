<?php
require_once './cabecalho.php';
?>


<?php
//include_once 'css/fundoConteudo_start.php';

 if(estaLogado()){?>
    
    
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

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
            <h2> <a href="">Sobre nós</a></h2>
            <hr />
            <p>Conheça um pouco mais sobre este projeto.</p>

        </div>
    </div>
    <div class="clearfix"></div>
</div>


    
<?PHP
} else {?>

<!--
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
   Indicators 
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

   Wrapper for slides 
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="ny.jpg" alt="New York">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>The atmosphere in New York is lorem ipsum.</p>
      </div>
    </div>

    <div class="item">
      <img src="chicago.jpg" alt="Chicago">
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago - A night we won't forget.</p>
      </div>
    </div>

    <div class="item">
      <img src="la.jpg" alt="Los Angeles">
      <div class="carousel-caption">
        <h3>LA</h3>
        <p>Even though the traffic was a mess, we had the best time.</p>
      </div>
    </div>
  </div>

   Left and right controls 
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->

    
<?php

}

?>

<?php
require_once 'rodape.php';
?>

