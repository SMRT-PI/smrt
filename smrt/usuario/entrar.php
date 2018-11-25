<?php
include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include '../cabecalho.php';
//require_once './form_logar.php'; //FORMULÁRIO DE LOGIN
//require_once './form_cadastrar.php'; //FORMULÁRIO DE CADASTRO
if (!estaLogado()) {
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://parsleyjs.org/dist/parsley.js"></script> <!-- Biblioteca de validação de formulários JavaScript -->
    <div class="container mb-4">
        <div class="container-fluid text-center">
            <div class="row justify-content-center">
                <form id="form_logar" class="col-lg-6" name="logar">
                    <div class="jumbotron jumbotron-fluid text-center m-0 h2" style="background-color: whitesmoke;">Entre com sua Conta!</div>

                    <div style="display: block;" id="data_login"></div>
                    <input class="form-control py-2" id="email_login" type="email" name="email_login" placeholder="E-mail" data-parsley-type="email" data-parsley-errors-container="#email_error_login" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu email!" data-parsley-type-message="Email inválido!" required data-parsley-validation-threshold="">
                    <div class="invalid-feedback mb-0" style="display: block;" id="email_error_login"></div>

                    <input class="form-control py-2 mt-2" id="senha_login" required type="password" name="senha_login" placeholder="Senha" required data-parsley-length="[8, 16]" data-parsley-errors-container="#senha_error_login" data-parsley-trigger="keyup" data-parsley-required-message="Informe sua senha!" data-parsley-length-message="A senha deve possuir de 8 a 16 caracteres!" data-parsley-validation-threshold="0">
                    <div class="invalid-feedback my-0" style="display: block;" id="senha_error_login"></div>

                    <div class="btn-group w-100 justify-content-center mt-3">
                        <a class="btn btn-default mr-2 rounded" href="#primeiro_nome" onclick="mudar(form_logar)">Não é Cadastrado?</a>
                        <input class="btn btn-success rounded" type="submit" id="submit_login" name="submit_login" value="LOGAR">
                    </div>
                </form>

                <form id="form_cadastrar" class="col-lg-6" style="display: none;">              
                    <div class="jumbotron jumbotron-fluid text-center m-0 h2" style="background-color: whitesmoke;">Cadastre-se Gratuitamente!</div>
                    <input class="form-control py-2" type="text" name="nome" id="primeiro_nome" placeholder="Nome" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-errors-container="#nome_error" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu nome!" data-parsley-length="[2, 25]" data-parsley-validation-threshold="0" data-parsley-length-message="Nome muito curto!">
                    <div class="invalid-feedback mt-2" style="display: block;" id="nome_error"></div>

                    <input class="form-control py-2 my-2" type="text" name="sobrenome" id="last_name" placeholder="Sobrenome" data-parsley-errors-container="#sobrenome_error" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu sobrenome!" data-parsley-length="[2, 25]" data-parsley-validation-threshold="0" data-parsley-length-message="Sobrenome muito curto!">
                    <div class="invalid-feedback my-0" style="display: block;" id="sobrenome_error"></div>

                    <input class="form-control py-2" type="text" name="email" id="email" placeholder="Email" data-parsley-type="email" data-parsley-errors-container="#email_error" data-parsley-trigger="keyup" data-parsley-required-message="Informe seu email!" data-parsley-type-message="Email inválido!" required data-parsley-validation-threshold="">
                    <div class="invalid-feedback mb-0" style="display: block;" id="email_error"></div>

                    <input class="form-control py-2 my-2" type="password" name="senha" id="password" placeholder="Senha" required data-parsley-length="[8, 16]" data-parsley-errors-container="#senha_error" data-parsley-trigger="keyup" data-parsley-required-message="Informe sua senha!" data-parsley-length-message="A senha deve possuir de 8 a 16 caracteres!" data-parsley-validation-threshold="0">
                    <div class="invalid-feedback my-0" style="display: block;" id="senha_error"></div>

                    <input class="form-control py-2" type="password" name="confirm_senha" id="confirm_password" placeholder="Confirme a senha" data-parsley-errors-container="#confirm_senha_error" data-parsley-equalto="#password" data-parsley-equalto-message="As senhas não conferem!" data-parsley-trigger="keyup" required data-parsley-required-message="Confirme sua senha!" data-parsley-validation-threshold="0">
                    <div class="invalid-feedback my-0" style="display: block;" id="confirm_senha_error"></div>

                    <div class="btn-group w-100 justify-content-center mt-3">
                        <a class="btn btn-default mr-2 rounded" href="#email_login" onclick="mudar(form_cadastrar)">Já é Cadastrado?</a>
                        <input class="btn btn-success rounded" type="submit" id="submit" name="submit" value="CADASTRAR" >
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        ul{
            list-style-type: none;
        }
    </style>
    
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

        $(document).ready(function () {
            $('#form_logar').parsley();
            $('#form_logar').on('submit', function (event) {
                event.preventDefault();
                if ($('#form_logar').parsley().isValid())
                {
                    $.ajax({
                        url: "logar.php",
                        method: "POST",
                        data: $(this).serialize(),
                        beforeSend: function () {
                            $('#submit_login').attr('disabled', 'disabled');
                            $('#submit_login').val('LOGANDO...');
                        },
                        success: function (data)
                        {
                            if (data === "Email ou senha inválido!") {

                                $('#data_login').attr('class', 'invalid-feedback mt-0 mb-2');
                                $('#data_login').html(data);
                                $('#form_logar').parsley().reset();
                                $('#submit_login').attr('disabled', false);
                                $('#submit_login').val('LOGAR');

                            } else if (data === "Logado com sucesso!") {

                                $('#data_login').attr('class', 'valid-feedback mt-0 mb-2');
                                $('#data_login').html(data);
                                window.location.replace("/smrt/index.php");

                            }
                        }
                    });
                }
            });
        }
        );
    </script>

    <?php
} else {
    ?>

    <div class="jumbotron jumbotron-fluid text-center h1" style="background-color: whitesmoke;">Você já está logado!</div>
    <?php
}
require_once '../rodape.php';
