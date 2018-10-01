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
            <form class="col-lg-6" method="post" action="inserir.php">
                <input type="hidden" name="autor" value="<?= $linha['id'] ?>"> 
                <div class="custom-file">
                    <label class="custom-file-label" for="customFile">Capa</label>>
                    <input type="file" name="capa" class="custom-file-input" lang="pt-br" id="capa">
                </div>
                <input class="form-control py-3" type="text" name="titulo" placeholder="Título">
                <textarea class="form-control py-3 my-2" rows="2" type="text" name="descricao" placeholder="Descrição"></textarea>
                <textarea class="form-control p-3" rows="15" placeholder="Conteúdo" name="conteudo"></textarea>
                <input type="submit" value="Publicar" class="btn btn-lg btn-success small mt-3">
            </form>   
        </div>
        <?php
    }
} include '../rodape.php';
