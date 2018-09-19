<!DOCTYPE html>
<?php
    include '../cabecalho.php';
include_once '../bd/conectar.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario Cadastro</title>
        <link href="../css/teste.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="resp"></div>
        <form id="formulario" method="post" enctype="multipart/form-data" name="formulario" >
            <ul id="progress">
                <li>Configuracoes</li>
                <li>Detalhes</li>
            </ul>
            
            <fieldset>
                <h2>Configuracoes da conta</h2>
                <h3>Algumas configuracoes</h3>
                <input type="text" name="email" class="form-control py-2 my-3" placeholder="E-mail" />
                <input type="password" name="senha" class="form-control py-2 " placeholder="Senha" />
                <input type="password" name="csenha" class="form-control py-2 my-3" placeholder="Confirme a senha" />
                <input type="button" name="next1" class="next acao btn btn-lg btn-success small mt-3" value="Proximo" />
            </fieldset>
            
            <fieldset>
                <h2>Detalhes pessoais</h2>
                <h3>Informe-nos alguns cadastro</h3>
                <input type="text" name="nome" class="form-control py-2 my-3" placeholder="Primeiro nome" />
                <input type="text" name="sobrenome" class="form-control py-2 " placeholder="Segundo nome" />
                <input type="button" name="prev" class="prev acao btn btn-lg btn-success small mt-3" value="Anterior" />
                <input type="submit" name="next" class="acao btn btn-lg btn-success small mt-3" value="Enviar" />
            </fieldset>
        </form>
        
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/functions.js"></script>
        <?php
        // put your code here
        ?>
    </body>
</html>
