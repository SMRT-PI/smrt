<?php
include_once '../usuario/autenticacao.php';
include '../bd/conectar.php';
include_once '../cabecalho.php';
include_once './localizacao.php';

$sql_pessoa = "select * from usuario where email = '$_SESSION[email]'";
$resultado = mysqli_query($conexao, $sql_pessoa);
$linha = mysqli_fetch_array($resultado);

if (estaLogado()) {
    if (adm()) {
        ?>
        <div class="d-flex justify-content-center text-center my-4">
            <form class="w-50 mb-3" method="post" action="inserir.php">
                <input type="hidden" name="autor" value="<?= $linha['id'] ?>"> 
                <label class="text-muted mr-2" for="capa">Capa</label><input class="my-3" id="capa" type="file" name="capa">
                <input class="form-control py-3" type="text" name="titulo" placeholder="Título">
                <textarea class="form-control py-3 my-3" rows="2" type="text" name="descricao" placeholder="Descrição"></textarea>
                <textarea class="form-control p-3" rows="10" placeholder="Conteúdo" name="conteudo"></textarea>
                
                <input type="submit" value="Publicar" class="btn btn-lg btn-success small mt-3">
            </form>   
        </div>
        <?php
    }
} include '../rodape.php';
