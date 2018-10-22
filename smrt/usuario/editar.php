<?php
include_once '../usuario/autenticacao.php';
include_once '../bd/conectar.php';
include_once '../cabecalho.php';

if (!estaLogado()) {
	header('Location: entrar.php');
}

$sql = sprintf("SELECT * FROM usuario WHERE email = '%s'", $_SESSION['email']);
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);

if (!empty($_POST)) {
	$sql = sprintf(
		"UPDATE usuario SET nome = '%s', sobrenome = '%s', email = '%s', senha = '%s' WHERE id = %d",
		$_POST['nome'],
		$_POST['sobrenome'],
		$_POST['email'],
		$_POST['senha'],
		$linha['id']
	);
	mysqli_query($conexao, $sql);

	if(mysqli_affected_rows($conexao) > 0){
		header('Location: perfil.php');
	}else{
		echo "Aviso: Não foi atualizado!";
	}
}

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
    <div class="row profile">
	<form action="editar.php">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" id="nome" class="form-control" placeholder="Nome" value="<?php echo $linha['nome']; ?>">
		</div>
		<div class="form-group">
			<label for="sobrenome">Sobrenome</label>
			<input type="text" id="sobrenome" class="form-control" placeholder="Sobrenome" value="<?php echo $linha['sobrenome']; ?>">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" id="email" class="form-control" placeholder="Endereço de email" value="<?php echo $linha['email']; ?>">
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input type="password" id="senha" class="form-control" placeholder="Senha">
		</div>
		<div class="form-group">
			<label for="image">Foto do perfil</label>
			<input type="file" class="form-control-file" id="image">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		</form>		
	</div>
</div>

<?php

require_once '../rodape.php';
