<?php
include_once '../usuario/autenticacao.php';
include '../bd/conectar.php';
include_once '../cabecalho.php';

$sql_pessoa = "select * from usuario where email = '$_SESSION[email]'";
$resultado = mysqli_query($conexao, $sql_pessoa);
$linha = mysqli_fetch_array($resultado);

if (estaLogado()) {
    if (adm()) {
        ?>
        <div class="justify-content-center d-flex text-center my-3">
            <form class="col-lg-6" enctype="multipart/form-data" method="post" action="inserir.php">
                <input type="hidden" name="autor" value="<?= $linha['id_info'] ?>"> 
                <div class="custom-file">
                    <label class="custom-file-label" for="customFile">Capa</label>>
<!--                    <input type="file" id="imagem" name="imagem" class="custom-file-input" lang="pt-br" id="capa">-->
                    <input type="file" id="imagem" name="imagem" class="custom-file-input" lang="pt-br" multiple="true">
                </div>
                <textarea class="form-control py-2" type="text" rows="1" name="titulo" wrap="hard" placeholder="Título"></textarea>
                <textarea class="form-control py-2 my-2" rows="3" type="text" name="descricao" placeholder="Descrição"></textarea>
                <textarea class="form-control p-2" rows="16" placeholder="Conteúdo" name="conteudo"></textarea>
                <input type="submit" value="Publicar" class="btn btn-lg btn-success small mt-3">
            </form>   
        </div>
        <?php
    }
} include '../rodape.php';
