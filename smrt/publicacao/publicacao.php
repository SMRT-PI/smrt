<?php
include_once '../usuario/autenticacao.php';
include_once '../cabecalho.php';
include_once '../bd/conectar.php';

$sql = "SELECT pub.id,pub.legenda,pub.imagem,pub.autor,pub.dataa,usuario.id,usuario.nome,usuario.sobrenome,
date_format(dataa, '%d-%m-%Y %H:%i:%s') as dataa FROM pub inner join usuario on pub.autor = usuario.id order by dataa Desc;";
$resultado = mysqli_query($conexao, $sql);
require_once './form_inserir.php';

if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        ?>
        <div class="row my-3">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-header bg-light">
                        <a class=" text-dark">
                            <strong class=""><?= $linha["nome"] ?> <?= $linha["sobrenome"] ?></strong><br>
                        </a>
                        <a class="float-left text-muted" style="font-size: 80%"><?php echo $linha["dataa"] ?></a>

                    </div>
                    <div class="card-body">
                        <p class="card-text container-fluid"><?php echo $linha["legenda"] ?></p>
                        <div class="container-fluid">
                            <img class="img-fluid" src="/smrt/img/<?php echo $linha["imagem"]; ?>" style="min-width: 100%">
                        </div>
                    </div>
                    <div class="card-footer bg-light">

                        <div class="row text-center">
                            <div class="col"> Curtir</div>
                            <div class="col"> Mapa </div>
                            <div class="col"> Comentar </div>
                        </div>
                    </div>
                    <div class="float-center">
                        <input type="text" name="comentario" size="50" placeholder="Digite seu comentario!" class="form-control campo"/>
                    </div>

                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">Autor</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <?php
    }
}
require_once '../rodape.php';
