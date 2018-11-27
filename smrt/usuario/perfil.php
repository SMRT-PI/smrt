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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://parsleyjs.org/dist/parsley.js"></script>

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
    .btn-editar{color: grey;}
    .btn-editar:hover{
        color: black;
    }
</style>

<form id="form_editar" class="mb-3 mt-0 p-0 text-center">
    <input type="hidden" name="id" value="<?= $linha['id'] ?>">
    <div class="bg-danger jumbotron-fluid jumbotron my-0 p-4">
        <div class="my-0 py-2">
            <label for="imagem" class="rounded-circle img-fluid input-img my-0" style="cursor: pointer;min-width: 150px;min-height: 150px;height: 100%;width: 100%;max-width: 160px;max-height: 160px;">
                <input disabled type="file" id="imagem" name="imagem" class="form-control" style="cursor: pointer;visibility: hidden" multiple="true">
            </label>
        </div>
    </div>
    <div class="col-lg-6 container">
        <div class="card container border-white" style="border-bottom-left-radius:10px;border-bottom-right-radius: 10px;">

            <div class="card-body my-2 p-0">
                <div class="btn-group d-flex justify-content-end p-0 m-0">
                        <div class="" style="display: block;cursor: default;font-size: 1rem;" id="data_editar"></div>
                    <button class="btn btn-link btn-editar bg-white border-white btn-md" onclick="editar()">
                        <i class="fas fa-wrench"></i>
                    </button>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <input disabled value="<?= $linha['nome'] ?>" class="form-control py-2 col" type="text" name="nome" id="primeiro_nome" placeholder="Nome" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-errors-container="#nome_error" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu nome!" data-parsley-length="[2, 25]" data-parsley-validation-threshold="0" data-parsley-length-message="Nome muito curto!">
                    <div class="invalid-feedback mt-2" style="display: block;" id="nome_error"></div>
                </div>
                <div class="col">
                    <input disabled value="<?= $linha['sobrenome'] ?>" class="form-control py-2 col" type="text" name="sobrenome" id="last_name" placeholder="Sobrenome" data-parsley-errors-container="#sobrenome_error" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu sobrenome!" data-parsley-length="[2, 25]" data-parsley-validation-threshold="0" data-parsley-length-message="Sobrenome muito curto!">
                    <div class="invalid-feedback my-0" style="display: block;" id="sobrenome_error"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <input disabled value="<?= $linha['email'] ?>" class="form-control py-2" type="text" name="email" id="email" placeholder="Email" data-parsley-type="email" data-parsley-errors-container="#email_error" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu email!" data-parsley-type-message="Email inválido!" required data-parsley-validation-threshold="">
                    <div class="invalid-feedback mb-0" style="display: block;" id="email_error"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <input disabled class="form-control py-2 my-2" type="password" name="senha" id="password" placeholder="Senha" required data-parsley-length="[8, 16]" data-parsley-errors-container="#senha_error" data-parsley-trigger="keyup" data-parsley-required-message="Informe sua senha!" data-parsley-length-message="A senha deve possuir de 8 a 16 caracteres!" data-parsley-validation-threshold="0">
                    <div class="invalid-feedback my-0" style="display: block;" id="senha_error"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <input disabled class="form-control py-2" type="password" name="confirm_senha" id="confirm_password" placeholder="Confirme a senha" data-parsley-errors-container="#confirm_senha_error" data-parsley-equalto="#password" data-parsley-equalto-message="As senhas não conferem!" data-parsley-trigger="keyup" required data-parsley-required-message="Confirme sua senha!" data-parsley-validation-threshold="0">
                    <div class="invalid-feedback my-0" style="display: block;" id="confirm_senha_error"></div>
                </div>
            </div>

            <div class="card-body">
                <div class="btn-group d-flex justify-content-end">
                    <button class="btn btn-default mr-2 rounded" onclick="cancelar()">CANCELAR</button>
                    <input disabled class="btn btn-success rounded" type="submit" id="submit" name="submit" value="SALVAR" >
                </div>
            </div>

        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        $('#form_editar').parsley();
        $('#form_editar').on('submit', function (event) {
            event.preventDefault();
            if ($('#form_editar').parsley().isValid())
            {
                $.ajax({
                    url: "editar.php",
                    method: "POST",
                    data: $(this).serialize(),
                    beforeSend: function () {
                        $('#submit').attr('disabled', 'disabled');
                        $('#submit').val('SALVANDO...');
                    },
                    success: function (data)
                    {
                        if (data === "O Email já está em uso!") {

                            $('#data_editar').attr('class', 'invalid-feedback pt-1 ml-5');
                            $('#data_editar').html(data);
                            $('#form_editar').parsley().reset();
                            $('#submit').attr('disabled', false);
                            $('#submit').val('LOGAR');

                        } else if (data === "Suas alterações foram salvas!") {

                            $('#data_editar').attr('class', 'valid-feedback pt-1 ml-5');
                            $('#data_editar').html(data);
                            window.location.reload();

                        }
                    }
                });
            }
        });
    }
    );

    function editar() {
        $('#primeiro_nome').attr('disabled', false);
        $('#last_name').attr('disabled', false);
        $('#email').attr('disabled', false);
        $('#password').attr('disabled', false);
        $('#confirm_password').attr('disabled', false);
        $('#submit').attr('disabled', false);
        $('#cancelar').attr('disabled', false);
        $('#senha_error').attr('style', 'display: block');
        $('#confirm_senha_error').attr('style', 'display: block');
    }
    ;

    function cancelar() {
        $('#primeiro_nome').attr('disabled', 'disabled');
        $('#last_name').attr('disabled', 'disabled');
        $('#email').attr('disabled', 'disabled');
        $('#password').attr('disabled', 'disabled');
        $('#confirm_password').attr('disabled', 'disabled');
        $('#submit').attr('disabled', 'disabled');
        $('#cancelar').attr('disabled', 'disabled');
        $('#senha_error').attr('style', 'display: none');
        $('#confirm_senha_error').attr('style', 'display: none');
        $('#form_editar')[0].reset();
    }
    ;
</script>

<?php
require_once '../rodape.php';
