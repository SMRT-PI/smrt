<?php
include_once '../usuario/autenticacao.php';
include_once '../bd/conectar.php';
include_once '../cabecalho.php';

if (!estaLogado()) {
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/usuario/entrar.php'>
                <script type=\"text/javascript\">
                alert(\"Entre com sua conta!\");
                </script>";
}

$sql = "SELECT * FROM usuario WHERE email = '$_SESSION[email]'";
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);
?>


<style>
    .input-img{
        background-color: whitesmoke;
        border-style: solid;
        border-color: rgba(100,100,100,0.3);
    }
    .input-img:hover{
        background-color: rgba(100,100,100,0.5);
        background-image: url(../img/input-img.png);
        background-position: center;
        background-size: cover;
        background-attachment: inherit;
    }
</style>


<div class="col-lg-6 my-3 text-center container mx-0">
    <div class="card container border-white px-4 my-0">
        <form id="form_editar my-0">
            <div class="card-body my-0 py-2">
                <label for="imagem" class="rounded-circle img-fluid input-img my-0" style="cursor: pointer;min-width: 150px;min-height: 150px;height: 100%;width: 100%;max-width: 160px;max-height: 160px;">
                    <input type="file" id="imagem" name="imagem" class="form-control" style="cursor: pointer;visibility: hidden" multiple="true">
                </label>
            </div>

            <div class="form-row mt-2">
                <div class="col">
                    <input value="<?= $linha['nome'] ?>" class="form-control py-2 col" type="text" name="nome" id="primeiro_nome" placeholder="Nome" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-errors-container="#nome_error" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu nome!" data-parsley-length="[2, 25]" data-parsley-validation-threshold="0" data-parsley-length-message="Nome muito curto!">
                    <div class="invalid-feedback mt-2" style="display: block;" id="nome_error"></div>
                </div>
                <div class="col">
                    <input value="<?= $linha['sobrenome'] ?>" class="form-control py-2 col" type="text" name="sobrenome" id="last_name" placeholder="Sobrenome" data-parsley-errors-container="#sobrenome_error" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu sobrenome!" data-parsley-length="[2, 25]" data-parsley-validation-threshold="0" data-parsley-length-message="Sobrenome muito curto!">
                    <div class="invalid-feedback my-0" style="display: block;" id="sobrenome_error"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <input value="<?= $linha['email'] ?>" class="form-control py-2" type="text" name="email" id="email" placeholder="Email" data-parsley-type="email" data-parsley-errors-container="#email_error" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu email!" data-parsley-type-message="Email inválido!" required data-parsley-validation-threshold="">
                    <div class="invalid-feedback mb-0" style="display: block;" id="email_error"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <input class="form-control py-2 my-2" type="password" name="senha" id="password" placeholder="Senha" required data-parsley-length="[8, 16]" data-parsley-errors-container="#senha_error" data-parsley-trigger="keyup" data-parsley-required-message="Informe sua senha!" data-parsley-length-message="A senha deve possuir de 8 a 16 caracteres!" data-parsley-validation-threshold="0">
                    <div class="invalid-feedback my-0" style="display: block;" id="senha_error"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <input class="form-control py-2" type="password" name="confirm_senha" id="confirm_password" placeholder="Confirme a senha" data-parsley-errors-container="#confirm_senha_error" data-parsley-equalto="#password" data-parsley-equalto-message="As senhas não conferem!" data-parsley-trigger="keyup" required data-parsley-required-message="Confirme sua senha!" data-parsley-validation-threshold="0">
                    <div class="invalid-feedback my-0" style="display: block;" id="confirm_senha_error"></div>
                </div>
            </div>

            <div class="card-body">
                <div class="btn-group d-flex justify-content-end">
                    <input class="btn btn-secondary rounded mr-2" type="submit" id="submit" name="submit" value="CANCELAR" >
                    <input class="btn btn-success rounded" type="submit" id="submit" name="submit" value="SALVAR" >
                </div>
            </div>
        </form>
    </div>
</div>
<div class="col-lg-6 my-4">

</div>

<?php
require_once '../rodape.php';
