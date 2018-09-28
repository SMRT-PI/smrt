<?php
include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include '../cabecalho.php';


if (estaLogado()) {
    $sql = "select * from usuario where email = '$_SESSION[email]'";
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado)
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- IMAGEM PERFIL -->
				<div class="profile-userpic">
					<img src="https://cdn3.iconfinder.com/data/icons/users-6/100/5-512.png" class="img-responsive" alt="">
                                </div> <br>
                                <!-- IMAGEM PERFIL -->
				
                                <!-- INFORMACOES -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                                            <h1><?= $linha['nome'] ?></h1>
					</div>
					<div class="profile-usertitle-job">
                                            <h4><?= $linha['email'] ?></h4>
                                            <span>Informações sobre o usuário cadastrado</span>
					</div>
				</div>
				<!-- INFORMACOES -->
<!--				 BOTOES
-->				<br>
                                <div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Seguir</button>
					<button type="button" class="btn btn-danger btn-sm">Mensagem</button>
				</div><!--
				 BOTOES
				MENU -->
                                <br>
				<div class="profile-usermenu">
					<ul class="nav">
					
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Usuários </a>
						</li>
						<li>
                                                    <a href="#" onclick="publicacao()" >
							<i class="glyphicon glyphicon-ok"></i>
							Publicações </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Alertas </a>
						</li>
					</ul>
				</div>
				<!-- MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
                
                <script type="text/javascript">
                    function publicacao(){
                        document.write('<iframe style="width: 900px; height: 600px;" src="http://localhost/smrt/publicacaoUsuario/area_publicacao.php"></iframe>'); 
                    }
                    </script>
   
            </div>
		</div>
	</div>
</div>

<br>
<br>


<?php

} else {
    header('Location: entrar.php');
}


require_once '../rodape.php';
