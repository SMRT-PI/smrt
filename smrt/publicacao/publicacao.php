<?php
include_once '../cabecalho.php';
include_once '../bd/conectar.php';
error_reporting(0);
?>

<?php
$sql = "SELECT * FROM pub";
$sql2 = "SELECT * FROM comentario";
$resultado = mysqli_query($conexao, $sql);
$resultado2 = mysqli_query($conexao, $sql2);
require_once './form_inserir.php';
?>
<h5 class="text-center">(Substitui 'publicacao.php' por 'teste.php' ali em cima)</h5>
<link rel="stylesheet" href="css/style.css">
<?php
if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        ?>  
        <br>
        <div class="row">
            <div class="col-sm-6 offset-md-3">

                <div class="post-content">
                    <h4><i class="fas fa-user"> </i> <?php echo $linha["autor"]; ?></h4>
                    <span class="text-muted small"><i class="far fa-clock"></i > <?php echo $linha["dataa"]; ?> </span>
                    <div class="media">
                        <img class="mr-3" src="../img/rio1.jpg">
                        <div class="media-body">
                            <?php echo $linha["legenda"]; ?>

                        </div>
                    </div>

                    <div id="box_comentario" id="<?php echo $id; ?>">
                        <form action="inserir_comentario.php" method="post" name="form_comentario" id="form_comentario"><br>
                            <input type="text" name="comentario" size="50" placeholder="Digite seu comentario!" class="form-control campo"/>
                            <input type="hidden" name="id_postagem" value="<?php echo $id ?>"
                                   <input type="submit" name="enviar" class="btn btn-success float-left" value="Enviar" />
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo '<h1>Nenhuma publicacao encontrada!</h1>';
}
?>
<?php
if (mysqli_num_rows($resultado2) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado2)) {
        ?>
        <?php
        if ($linha["comentario"] == !NULL) {
            ?>
            <div class="row">
                <div class="col-sm-6 offset-md-3">
                    <div class="post-content">
                        <i class="fas fa-user"> </i> <?php echo $linha["autor"]; ?><br>
                        <span class="text-muted small"><i class="far fa-clock"></i > <?php echo $linha["dataa"]; ?> </span>

                        <?php echo $linha["comentario"]; ?>
                        <div class="comentarios media-body">

                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="text-muted small"><?php echo 'Nenhum comentario encontrado!'; ?></div>
            <?php
        }
    }
}


include_once '../rodape.php';
