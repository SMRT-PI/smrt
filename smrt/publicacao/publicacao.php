<?php
include_once '../cabecalho.php';
include_once '../bd/conectar.php';
error_reporting(0);
?>

<?php
$sql = "SELECT * FROM pub";
$resultado = mysqli_query($conexao, $sql);
?>
<link rel="stylesheet" href="css/style.css">
<?php
if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        ?>  

        <div id="comentario" id="<?php echo $id; ?>">
            <form action="inserir_comentario.php" method="post" name="form_comentario" id="form_comentario">
                <input type="text" name="comentario" size="50" value="Digite seu comentario" class="campo"/>
                <input type="hidden" name="id_postagem" value="<?php echo $id ?>"
                       <input type="submit" name="enviar" class="btn btn-success float-left" value="Enviar" />
            </form>
        </div>



        <div class="row">
            <div class="col-sm-6 offset-md-3">

                <div class="post-content">
                    <h4><?php echo $linha["legenda"]; ?></h4>
                    <span class="text-muted small"><i class="fas fa-user"> </i> <?php echo $linha["autor"]; ?> - <i class="far fa-clock"></i > <?php echo $linha["dataa"]; ?> </span>
                    <div class="media">
                        <img class="mr-3" src="../img/rio1.jpg">
                        <div class="media-body">
                            <?php echo $linha["titulo"]; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo '<h1>Nenhuma publicacao encontrada!</h1>';
}
header("Location: ../smrt/publicacao/teste.php?id=$id#$id");
include_once '../rodape.php';
