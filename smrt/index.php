<?php
require_once 'cabecalho.php';
require_once 'usuario/autenticacao.php';
require_once 'bd/conectar.php';
?>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div style="background-image: url(http://localhost/smrt/img/m1.jpg); min-height: 80vh;height: 100%;max-height: 40vh;background-position: center; background-size: cover;"></div>
    </div>
    <div class="carousel-item">
        <div style="background-image: url(http://localhost/smrt/img/m2.jpg); min-height: 80vh;height: 100%;max-height: 40vh;background-position: center; background-size: cover;"></div>
    </div>
    <div class="carousel-item">
      <div style="background-image: url(http://localhost/smrt/img/m3.jpg); min-height: 8 0vh;height: 100%;max-height: 40vh;background-position: center; background-size: cover;"></div>
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<?php
require_once 'rodape.php';
?>

