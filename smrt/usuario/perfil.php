<?php
include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include '../cabecalho.php';

if (!estaLogado()) {
	header('Location: entrar.php');
}

$sql = "SELECT * FROM usuario WHERE email = '$_SESSION[email]'";
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);

$sql_usuarios = "SELECT
        nome,
        id,
        sobrenome,
        email
    FROM 
		usuario u 
	WHERE id != ".$linha['id']."
    ORDER BY nome";
$retorno_usrs = mysqli_query($conexao, $sql_usuarios);

$sql_publicacoes = "SELECT
        id,
		titulo,
		descricao,
		conteudo,
		capa
    FROM 
		publicacao 
	WHERE autor = ".$linha['id']."
    ORDER BY titulo";
$retorno_publicacoes = mysqli_query($conexao, $sql_publicacoes);

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
				</div>
				<!-- IMAGEM PERFIL -->
				
				<!-- INFORMACOES -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<strong><?= $linha['nome'] . ' ' . $linha['sobrenome'] ?></strong>
					</div>
					<div class="profile-usertitle-job">
						<p><?= $linha['email'] ?></p>
						<span>Informações sobre o usuário cadastrado</span>
					</div>
				</div>
				<!-- INFORMACOES -->
<!--				 BOTOES -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Seguir</button>
					<button type="button" class="btn btn-danger btn-sm">Mensagem</button>
				</div><!--  BOTOES	MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
					
						<li>
							<a href="#" onclick="mostrarUsuarios()">
								<i class="glyphicon glyphicon-user"></i>
								Usuários
							</a>
						</li>
						<li>
							<a href="#" onclick="mostrarPublicacoes()" >
							<i class="glyphicon glyphicon-ok"></i>
							Publicações </a>
						</li>
						<!-- Qual a tabela de alertas? -->
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
		<div class="col-md-9" id="usuarios" hidden>
            <div class="profile-content">
			<h2>Usuários</h2>
			<?php while ($user = mysqli_fetch_array($retorno_usrs)) { ?>
                <div class="card border-radius">
                    <div class="card-header py-3">
                        <a class="card-link float-left text-dark">
                            <strong><?= $user["nome"] ?> <?= $user["sobrenome"] ?></strong>
                        </a>
                    </div>
                </div>
            <?php } ?>   
            </div>
		</div>
		<div class="col-md-9" id="publicacoes" hidden>
			<h2>Publicações</h2>
            <div class="profile-content">
			<?php while ($user = mysqli_fetch_array($retorno_publicacoes)) { ?>
                <div class="card border-radius">
                    <div class="card-header py-3">
                        <a class="card-link float-left text-dark">
                            <strong><?= $user["titulo"] ?></strong>
                        </a>
                    </div>
                </div>
            <?php } ?>   
            </div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function mostrarUsuarios(){
		document.getElementById('publicacoes').hidden = true;
		e = document.getElementById('usuarios');
		e.hidden = !e.hidden;
	}
	function mostrarPublicacoes(){
		document.getElementById('usuarios').hidden = true;
		e = document.getElementById('publicacoes');
		e.hidden = !e.hidden;
	}
</script>
<?php

require_once '../rodape.php';
