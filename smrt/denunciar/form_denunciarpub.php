<?php
include '../bd/conectar.php';
include_once '../cabecalho.php';
include_once '../usuario/autenticacao.php';

ini_set("display_errors", true);


$sql = "SELECT denuncia_pub.id,denuncia_pub.id_post,denuncia_pub.id_user from ((denuncia_pub 
INNER JOIN usuario on usuario.id = denuncia_pub.id_user)
INNER JOIN pub on pub.id_pub = denuncia_pub.id_post);";

$resultado = mysqli_query($conexao, $sql);
?>

<?php
if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $id_user = $linha['id_user'];
        $id_post = $linha['id_post'];
        $nome = 'a';
        ?>
        <div class="d-flex my-3 justify-content-center">
            <div id="accordion" class="container">
                <div class="card border-radius">
                    <div class="card-header py-3">
                        <a class="card-link float-left text-dark">
                            <p class="" value="<?= $linha['id'] ?>">Denunciador: <?php echo $id_user; ?> Publicação denunciada: <?php echo $id_post; ?></p>
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
<?php include_once '../rodape.php'; ?>

