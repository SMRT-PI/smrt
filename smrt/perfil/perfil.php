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

$sql_alertas = "SELECT
        id,
        titulo,
        email
    FROM 
		alerta u 
	WHERE id != ".$linha['id']."
    ORDER BY titulo";
$retorno_alertas = mysqli_query($conexao, $sql_alertas);

?>
<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				 IMAGEM PERFIL 
				<div class="profile-userpic">
					<img src="https://cdn3.iconfinder.com/data/icons/users-6/100/5-512.png" class="img-responsive" alt="">
				</div>
				 IMAGEM PERFIL 
				
				 INFORMACOES 
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<strong><?= $linha['nome'] . ' ' . $linha['sobrenome'] ?></strong>
					</div>
					<div class="profile-usertitle-job">
						<p><?= $linha['email'] ?></p>
						<span>Informações sobre o usuário cadastrado</span>
					</div>
				</div>
				 INFORMACOES 
				 BOTOES 
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm" onClick="alert('Você seguiu <?= $linha['nome'] . ' ' . $linha['sobrenome'] ?>')">Seguir</button>
					<a href="editar.php">
						<button type="button" class="btn btn-danger btn-sm">Editar</button>
					</a>
		
				</div>  BOTOES	MENU 
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
						 tabela de alertas 
                                                 ainda não feita 
						<li>
							<a href="#" onclick="mostrarAlertas()" >
							<i class="glyphicon glyphicon-ok"></i>
							Alertas </a>
						</li>
					</ul>
				</div>
				 MENU 
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
        function mostrarAlertas(){
		document.getElementById('alertas').hidden = true;
		e = document.getElementById('alertas');
		e.hidden = !e.hidden;
	}
</script>-->


<!--INÍCIO-->
<br><br>
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Perfil</a>
                </li>
                <li class="nav-item">
                    <a href="../publicacao/publicacao.php" data-target="#pub" data-toggle="tab" class="nav-link">Publicações</a>
                </li>
                <li class="nav-item">
                    <a href="../usuario/perfil.php" data-target="#user" data-toggle="tab" class="nav-link">Usuários</a>
                </li>
                <li class="nav-item">
                    <a href="../alerta/alerta.php" data-target="#alert" data-toggle="tab" class="nav-link">Alertas</a>
                </li>
                <li class="nav-item">
                    <a href="editar.php" data-target="#edit" data-toggle="tab" class="nav-link">Editar Informações</a>
                </li>
            </ul>
            
<!--            INFORMACOES DO PERFIL-->

            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">Meu perfil</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Sobre Mim</h6>
                            <p>
                                <?= $linha['sobre'] ?>
                            </p>
                            <h6>Experiências</h6>
                            <p>
                                <?= $linha['experiencias'] ?>
                            </p>
                            <h6>Hobbies</h6>
                            <p>
                                <?= $linha['hobbies'] ?>
                            </p>
                            
                            <h6>Endereço</h6>
                            <p>
                                <?= $linha['endereco'] ?>
                            </p>
                            <h6>Like</h6>
                            <p>
                                <?= $linha['like'] ?>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Rescentes</h6>
                            <a href="#" class="badge badge-dark badge-pill">Tubarão</a>
                            <a href="#" class="badge badge-dark badge-pill">Rio</a>
                            <a href="#" class="badge badge-dark badge-pill">Usuarios</a>
                            <a href="#" class="badge badge-dark badge-pill">Amigos</a>
                            <a href="#" class="badge badge-dark badge-pill">Alertas</a>

                            <hr>
                            <span class="badge badge-primary"><i class="fa fa-user"></i> SEGUIDORES</span>
                            <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 VISUALIZAÇÕES</span>
                        </div>
                       
                    </div>

                </div>
                
<!--                PUBLICACOES-->

                <div class="tab-pane" id="pub">
                    
                    MOSTRAR PUBLICAÇÕES
                   
                </div>

<!--                    USUÁRIOS-->
                <div class="tab-pane" id="user">
                    
                    MOSTRAR USUÁRIOS
                   
                </div>

<!--                ALERTAS-->
                <div class="tab-pane" id="user">
                    
                    MOSTRAR ALERTAS
                   
                </div>

<!--                  EDITAR INFO-->

                <?php
                $id = $_GET['id'];
                $sql_pessoa = "select * from usuario where id = $id";
                $resultado = mysqli_query($conexao, $sql_pessoa);
                $linha = mysqli_fetch_array($resultado);
                ?>
   

                <div class="tab-pane" id="edit">
                    <form role="form" method="post" action="alterar.php">
                        <p>Sobre você:</p>
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Sobre mim</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?= $linha['sobre'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Experiências</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?= $linha['experiencias'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Hobbies</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?= $linha['hobbies'] ?>">
                            </div>
                        </div>
                        
                        
                        <p>Dados:</p>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Nome</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?= $linha['nome'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Sobrenome</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?= $linha['sobrenome'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" value="<?= $linha['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Endereço</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="" placeholder="<?= $linha['endereco'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" value="<?= $linha['cidade'] ?>" placeholder="Cidade">
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text" value="<?= $linha['estado'] ?>" placeholder="Estado">
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Usuário</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?= $linha['usuario'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Senha</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value="<?= $linha['senha'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirmar senha</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value="<?= $linha['senha'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancelar">
                                <input type="button" class="btn btn-primary" value="Salvar alterações">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        
<!--        AVATAR-->
        
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="http://www.epsomps.vic.edu.au/wp-content/uploads/2016/09/512x512-1-300x300.png" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <h2 class="mt-2"><?= $linha['nome'] . ' ' . $linha['sobrenome'] ?></h2>
            <p class="mt-2"><?= $linha['email'] ?></p>
            <div class="profile-userbuttons">
                <button type="button" class="btn btn-success btn-sm" onClick="alert('Você seguiu <?= $linha['nome'] . ' ' . $linha['sobrenome'] ?>')">Seguir</button>

            </div> 
            
            <label class="custom-file">
                <input type="file" id="file" class="custom-file-input">
                <span class="custom-file-control">Escolher foto</span>
            </label>
        </div>
    </div>
</div>



<?php

require_once '../rodape.php';
