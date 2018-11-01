<?php

include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include '../cabecalho.php';
//require_once './form_logar.php'; //FORMULÁRIO DE LOGIN
//require_once './form_cadastrar.php'; //FORMULÁRIO DE CADASTRO
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://parsleyjs.org/dist/parsley.js"></script> <!-- Biblioteca de validação de formulários JavaScript -->

<div class="container mb-4">
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <form id="form_logar" class="col-lg-6" method="post" action="logar.php" name="logar">
                <div class="jumbotron jumbotron-fluid text-center m-0 h2" style="background-color: whitesmoke;">Entre com sua Conta!</div>
                <input class="form-control py-2" id="email_login" type="email" required name="email" placeholder="E-mail">
                <input class="form-control py-2 mt-2" id="senha_login" required type="password" name="senha" placeholder="Senha">
                <div class="btn-group w-100 justify-content-center mt-3">
                    <a class="btn btn-default mr-2 rounded" href="#first_name" onclick="mudar(form_logar)">Não é Cadastrado?</a>
                    <input class="btn btn-success rounded" type="submit" name="logar" value="ENTRAR">
                </div>
            </form>

            <form id="form_cadastrar" class="col-lg-6" novalidate="true" style="display: none;">              
                <div class="jumbotron jumbotron-fluid text-center m-0 h2" style="background-color: whitesmoke;">Cadastre-se Gratuitamente!</div>
                <input class="form-control py-2" type="text" name="nome" id="first_name" placeholder="Nome" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu nome!" data-parsley-length="[2, 25]" data-parsley-validation-threshold="0" data-parsley-length-message="Nome muito curto!">
                <input class="form-control py-2 my-2" type="text" name="sobrenome" id="last_name" placeholder="Sobrenome" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu sobrenome!" data-parsley-length="[2, 25]" data-parsley-validation-threshold="0" data-parsley-length-message="Sobrenome muito curto!">
                <input class="form-control py-2" type="text" name="email" id="email" placeholder="Email" data-parsley-type="email" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu email!" data-parsley-type-message="Email inválido!" required data-parsley-validation-threshold="1">
                <input class="form-control py-2 my-2" type="password" name="senha" id="password" placeholder="Senha" required data-parsley-length="[8, 16]" data-parsley-trigger="keyup" data-parsley-required-message="Informe sua senha!" data-parsley-length-message="A senha deve possuir de 8 a 16 caracteres!" data-parsley-validation-threshold="1">
                <input class="form-control py-2 mb-3" type="password" name="confirm_senha" id="confirm_password" placeholder="Confirme a senha" data-parsley-equalto="#password" data-parsley-equalto-message="As senhas não conferem!" data-parsley-trigger="keyup" required data-parsley-required-message="Confirme sua senha!" data-parsley-validation-threshold="1">
                <div class="btn-group w-100 justify-content-center">
                    <a class="btn btn-default mr-2 rounded" href="#email_login" onclick="mudar(form_cadastrar)">Já é Cadastrado?</a>
                    <input class="btn btn-success rounded" type="submit" id="submit" name="submit" value="CADASTRAR" >
                </div>
            </form>
        </div>
    </div>
</div>
<!--<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>-->
<script>
    $(document).ready(function () {
        $('#form_cadastrar').parsley();
        $('#form_cadastrar').on('submit', function (event) {
            event.preventDefault();
            if ($('#form_cadastrar').parsley().isValid())
            {
                $.ajax({
                    url: "cadastrar.php",
                    method: "POST",
                    data: $(this).serialize(),
                    beforeSend: function () {
                        $('#submit').attr('disabled', 'disabled');
                        $('#submit').val('CADASTRANDO...');
                    },
                    success: function (data)
                    {
                        $('#form_cadastrar')[0].reset();
                        $('#form_cadastrar').parsley().reset();
                        $('#submit').attr('disabled', false);
                        $('#submit').val('CADASTRAR');
                        alert(data);
                    }
                });
            }
        });
    }
    );
</script>

<?php

require_once '../rodape.php';
