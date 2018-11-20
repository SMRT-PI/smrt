<?php
include_once '../usuario/autenticacao.php';
include_once '../bd/conectar.php';

if (!estaLogado()) {
	header('Location: entrar.php');
}

$_SESSION['erro'] = '';

$sql = sprintf("SELECT * FROM usuario WHERE email = '%s'", $_SESSION['email']);
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);

function updateUser($user, $conexao) {
	$ext = $linha['ext'];
	
	if(isset($_FILES["image"])) {
		$target_dir = "../img/";
		$ext = strtolower(pathinfo($_FILES["image"]["name"] ,PATHINFO_EXTENSION));
		$target_file = $target_dir . $user['id'] . '.' . $ext;
		if(!in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
			$_SESSION['erro'] =  "Formato de imagem inválido";
			return;
		}
		
		$ok = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
		
		if (!$ok) {
			$_SESSION['erro'] =  "Erro ao salvar foto do perfil";
			return;
		}
	}
	
	$sql = sprintf(
		"UPDATE usuario SET nome = '%s', sobrenome = '%s', email = '%s', senha = '%s', ext = '%s' WHERE id = %d",
		$_POST['nome'],
		$_POST['sobrenome'],
		$_POST['email'],
		$_POST['senha'],
		$ext,
		$user['id']
	);
	mysqli_query($conexao, $sql);
	
	if(mysqli_affected_rows($conexao) > 0){
		$_SESSION['ok'] = "Usuário atualizado";
		header('Location: perfil.php');
	} else {
		$_SESSION['erro'] = "Erro ao atualizar usuário";
	}
}

if (!empty($_POST)) {
	updateUser($linha, $conexao);
}

include_once '../cabecalho.php';
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
	<div class="row profile">
		<form method="post" action="editar.php" enctype="multipart/form-data">
		<?php
		if (!empty($_SESSION['erro'])) {
			?>
			<div class="alert alert-danger" role="alert">
				<?php echo $_SESSION['erro']; ?>
			</div>
			<?php
		}
		?>
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" value="<?php echo $linha['nome']; ?>">
		</div>
		<div class="form-group">
			<label for="sobrenome">Sobrenome</label>
			<input type="text" id="sobrenome" name="sobrenome" class="form-control" placeholder="Sobrenome" value="<?php echo $linha['sobrenome']; ?>">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" id="email" name="email" class="form-control" placeholder="Endereço de email" value="<?php echo $linha['email']; ?>">
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input type="password" id="senha" name="senha" class="form-control" placeholder="Senha">
		</div>
		<div class="form-group">
			<label for="image">Foto do perfil</label>
			<input type="file" class="form-control-file" id="image" name="image">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		</form>		
	</div>
</div>

<?php

require_once '../rodape.php';
