<?php
include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include '../cabecalho.php';
include '../publicacao.php';

if (estaLogado()) {
    $sql = "select * from usuario where email = '$_SESSION[email]'";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado)
?>

<!--LINKS-->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!--LINKS-->

<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
	<div class="row panel">
		<div class="col-md-4 bg_blur ">
		</div>
        <div class="col-md-8  col-xs-12">
            <img src="http://portalcreci.org.br/resource/frontend/slices/img_perfil_corretor.jpg" class="img-thumbnail picture hidden-xs" />
            <img src="http://portalcreci.org.br/resource/frontend/slices/img_perfil_corretor.jpg" class="img-thumbnail visible-xs picture_mob" />
           <div class="header">
                
<!--                DADOS SOBRE O USUARIO-->

                <h1><?= $linha['nome'] ?></h1>
                <h4><?= $linha['email'] ?></h4>
                <span>Informações sobre o usuário cadastrado</span>
                
<!--                DADOS SOBRE O USUARIO-->
           
           </div>
        </div>
    </div>   
    
	<div class="row nav">    
        <div class="col-md-4"></div>
        <div class="col-md-8 col-xs-12" style="margin: 0px;padding: 0px;">
            
            
            <div class="col-md-6 col-xs-6 well"><a href="../publicacao/area_publicacao.php" >Publicações</a><i class="fa fa-thumbs-o-up fa-lg"></i>  </div>
            <div class="col-md-6 col-xs-6 well"><a href="../usuario/alerta.php" >Alertas</a><i class="fa fa-weixin fa-lg"></i>  </div>
           
            
        </div>
    </div>
</div>

<?php
   require("scripts/funcao-altera-pagina.php");
?>

<!--
<form method="get" action="http://localhost/smrt/publicacao/area_publicacao.php">
    <button type="submit">Publicações</button>
</form>
<form method="get" action="http://localhost/smrt/publicacao/alertas.php">
    <button type="submit">Alertas</button>
</form>-->

<?php

} else {
    header('Location: entrar.php');
}


require_once '../rodape.php';
