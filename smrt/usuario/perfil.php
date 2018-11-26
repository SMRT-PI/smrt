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

<div class="col-lg-6 mt-4 text-center">
    <form id="form_editar">
        <label for="imagem" class="bg-secondary rounded-circle img-fluid" style="cursor: pointer;min-width: 100px;min-height: 120px;height: 100%;width: 100%;max-width: 150px;max-height: 150px;">
            <input type="file" id="imagem" name="imagem" class="form-control mb-3" style="cursor: pointer;visibility: hidden" multiple="true">
        </label>
        <input value="<?= $linha['nome'] ?>" class="form-control py-2" type="text" name="nome" id="primeiro_nome" placeholder="Nome" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-errors-container="#nome_error" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu nome!" data-parsley-length="[2, 25]" data-parsley-validation-threshold="0" data-parsley-length-message="Nome muito curto!">
        <div class="invalid-feedback mt-2" style="display: block;" id="nome_error"></div>

        <input value="<?= $linha['sobrenome'] ?>" class="form-control py-2 my-2" type="text" name="sobrenome" id="last_name" placeholder="Sobrenome" data-parsley-errors-container="#sobrenome_error" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu sobrenome!" data-parsley-length="[2, 25]" data-parsley-validation-threshold="0" data-parsley-length-message="Sobrenome muito curto!">
        <div class="invalid-feedback my-0" style="display: block;" id="sobrenome_error"></div>

        <input value="<?= $linha['email'] ?>" class="form-control py-2" type="text" name="email" id="email" placeholder="Email" data-parsley-type="email" data-parsley-errors-container="#email_error" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu email!" data-parsley-type-message="Email inválido!" required data-parsley-validation-threshold="">
        <div class="invalid-feedback mb-0" style="display: block;" id="email_error"></div>

        <input class="form-control py-2 my-2" type="password" name="senha" id="password" placeholder="Senha" required data-parsley-length="[8, 16]" data-parsley-errors-container="#senha_error" data-parsley-trigger="keyup" data-parsley-required-message="Informe sua senha!" data-parsley-length-message="A senha deve possuir de 8 a 16 caracteres!" data-parsley-validation-threshold="0">
        <div class="invalid-feedback my-0" style="display: block;" id="senha_error"></div>

        <input class="form-control py-2" type="password" name="confirm_senha" id="confirm_password" placeholder="Confirme a senha" data-parsley-errors-container="#confirm_senha_error" data-parsley-equalto="#password" data-parsley-equalto-message="As senhas não conferem!" data-parsley-trigger="keyup" required data-parsley-required-message="Confirme sua senha!" data-parsley-validation-threshold="0">
        <div class="invalid-feedback my-0" style="display: block;" id="confirm_senha_error"></div>

        <div class="btn-group w-100 justify-content-center mt-3">
            <input class="btn btn-success rounded" type="submit" id="submit" name="submit" value="SALVAR" >
        </div>
    </form>
</div>
<div class="col-lg-6 my-4">

</div>

<?php
require_once '../rodape.php';
