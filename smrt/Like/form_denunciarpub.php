<?php
include '../bd/conectar.php';
include_once '../cabecalho.php';
include_once '../usuario/autenticacao.php';

ini_set("display_errors", true);
if (adm()) {


    $sql = "SELECT denuncia_pub.id,denuncia_pub.id_post,denuncia_pub.id_user,
    denuncia_pub.id_denunciado,denuncia_pub.nome_denunciador,denuncia_pub.sobrenome_denunciador,
    denuncia_pub.nome_denunciado,denuncia_pub.sobrenome_denunciado from ((denuncia_pub 
INNER JOIN usuario on usuario.id = denuncia_pub.id_user)
INNER JOIN pub on pub.id_pub = denuncia_pub.id_post);
";

    $resultado = mysqli_query($conexao, $sql);
    ?>

    <?php
    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $id = $linha['id'];
            $id_user = $linha['id_user'];
            $id_post = $linha['id_post'];
            $n_denunciador = $linha['nome_denunciador'];
            $s_denunciador = $linha['sobrenome_denunciador'];
            $n_denunciado = $linha['nome_denunciado'];
            $s_denunciado = $linha['sobrenome_denunciado'];
            ?>
            <div class="d-flex my-3 justify-content-center">
                <div id="accordion" class="container">
                    <div class="card border-radius">
                        <div class="card-header py-3">
                            <a class="btn-danger btn btn-sm text-center float-right" href="http://localhost/smrt/publicacao/publicacao.php?id=#<?= $id_post ?>" role="button" target="_blank">Ver a publicação</a>
                            <a class="card-link" value="<?= $linha['id'] ?>">
                                <strong class="row text-dark">Nome do denunciador: <strong class="font-weight-light"><?php echo $n_denunciador; ?> <?php echo $s_denunciador; ?></strong></strong>
                                <strong class="row text-dark">Nome do denunciado: <strong class="font-weight-light"><?php echo $n_denunciado; ?> <?php echo $s_denunciado; ?></strong></strong> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>    
            <?php
        }
        ?>
        <?php
    }
    ?>
<?php } else { ?>

    <h1>Pagina não encontrada!</h1>

<?php } ?>
<?php include_once '../rodape.php'; ?>

