<?php
include '../cabecalho.php';
include_once '../bd/conectar.php';

$Name_autor = $_SESSION['nome'];
?>

<form method="post" action="inserir.php">
    <fieldset>
        <h2>Publicar</h2>
        <h3>Informe os dados</h3>
        <input type="text" name="legenda" class="form-control py-2 my-3" placeholder="Titulo da publicação" />
        <input type="text" name="imagem" class="form-control py-2 " placeholder="Selecione a imagem" />
        <input type="text" name="titulo" class="form-control py-2 my-3" placeholder="Legenda da publicacao" />
        <input type="submit" name="enviar" class="acao btn btn-lg btn-success small mt-3" value="Enviar" />
    </fieldset>
</form>

<?php
echo $Name_autor ;
?>
