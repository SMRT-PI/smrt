<?php
include_once '../cabecalho.php';
include_once '../bd/conectar.php';
include_once '../publicacao/jvBotaoLike.php';
include_once '../usuario/autenticacao.php';
?>

<?php
$sql = "SELECT * FROM pub";
$resultado = mysqli_query($conexao, $sql);
?>
<!--<link rel="stylesheet" href="css/style.css">-->
<?php
if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        ?>  

        <link rel="stylesheet" href="css/style.css">

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


                        <div class="facebook-reaction"><!-- container div for reaction system --> 
                            <span class="like-btn"> <!-- Default like button --> 
                                <span class="fa like-btn-emo fa-thumbs-o-up"></span> <!-- Default like button emotion--> 
                                <span class="like-btn-text">Like</span>  <!-- Default like button text,(Like, wow, sad..) default:Like  -->
                                <ul class="reactions-box">
                                    <!-- Reaction buttons container-->
                                    <li class="reaction reaction-like" data-reaction="Like"></li>
                                    <li class="reaction reaction-love" data-reaction="Love"></li>
                                    <li class="reaction reaction-haha" data-reaction="HaHa"></li>
                                    <li class="reaction reaction-wow" data-reaction="Wow"></li>
                                    <li class="reaction reaction-sad" data-reaction="Sad"></li>
                                    <li class="reaction reaction-angry" data-reaction="Angry"></li>
                                </ul>
                            </span>
                            <div class="like-stat"> <!-- Like statistic container--> 
                            </div>
                            

                        </div>
                        
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<h1>Nenhuma publicacao encontrada!</h1>';
        }
