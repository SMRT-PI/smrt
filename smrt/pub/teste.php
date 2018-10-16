<?php
include_once '../cabecalho.php';
include_once '../bd/conectar.php';
?>

<?php
$sql = "SELECT * FROM pub";
$resultado = mysqli_query($conexao, $sql);
?>
<link rel="stylesheet" href="css/style.css">
<?php
if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        ?>  



        <div class="row">
            <div class="col-sm-6 offset-md-3">

                <div class="post-content">
                    <h4><?php echo $linha["legenda"]; ?></h4>
                    <span class="text-muted small"><i class="fas fa-user"> </i> <?php echo $linha["autor"]; ?> - <i class="far fa-clock"></i > 00 / 00 / 00 às 00:00 </span>
                    <div class="media">
                        <img class="mr-3" src="../img/rio1.jpg">
                        <div class="media-body">
                            <?php echo $linha["titulo"]; ?>

                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<h1>Nenhuma publicacao encontrada!</h1>';
        }
