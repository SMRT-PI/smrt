<?php
include_once '../bd/conectar.php';
include_once '../cabecalho.php';

$sql = "SELECT denuncia_pub.id,denuncia_pub.id_post,denuncia_pub.id_user,usuario.id,usuario.nome,usuario.sobrenome "
        . "FROM denuncia_pub inner join usuario on denuncia_pub.id_user = usuario.id;";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        echo $id;
        $id_user = $linha['id_user'];
        echo $id_user;
        $nome = $linha['nome'];
        $sobrenome = $linha['sobrenome'];
        ?>
        <div class="card border-radius" id="<?php $id ?>">
            <div class="card-header py-3">
                <a class="card-link float-left text-dark">
                    <strong class=""> <?= $nome ?> <?= $sobrenome ?></strong>
                </a>
            </div>
        </div>

    <?php } ?>
<?php } ?>
<?php include_once '../rodape.php'; ?>
