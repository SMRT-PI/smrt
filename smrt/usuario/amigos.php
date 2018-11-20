<?php
include_once '../usuario/autenticacao.php';
include_once '../bd/conectar.php';
include_once '../cabecalho.php';

if (!estaLogado()) {
	header('Location: entrar.php');
}

if ($_POST) {
    $sql = sprintf("SELECT u.id, u.nome, u.sobrenome, u.email, u.ext FROM usuario u WHERE u.nome LIKE '%%%s%%'", $_POST['usuario']);
} else {
    $sql = sprintf("SELECT u.id, u.nome, u.sobrenome, u.email, u.ext FROM usuario u WHERE u.id IN 
        (
            SELECT idFriend FROM friends where idUser = %d
        )", $_SESSION['id']);
}
$resultado = mysqli_query($conexao, $sql);

?>
<div class="container">
    <div class="row">
        <div class="col-md-12 my-3" >
            <form action="amigos.php" method="post">
                <button type="submit" class="btn btn-primary float-right">Procurar</button>
                <div class="form-group float-right">
                    <input type="text" class="form-control" name="usuario" placeholder="Pesquisar">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="d-flex my-3 justify-content-center">
    <div class="container">
<?php
while ($friend = mysqli_fetch_array($resultado)) { ?>
        <div class="card border-radius">
            <div class="card-header py-3">
                <a href="perfil.php?id=<?= $friend["id"] ?>" class="card-link float-left text-dark">
                    <strong><?= $friend["nome"] . ' ' . $friend["sobrenome"] ?> </strong>
                </a>
            </div>
        </div>
    <?php } ?>
</div>
</div>
<?php

require_once '../rodape.php';