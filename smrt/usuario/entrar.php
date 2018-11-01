<?php

include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include '../cabecalho.php';
//require_once './form_logar.php'; //FORMULÁRIO DE LOGIN
//require_once './form_cadastrar.php'; //FORMULÁRIO DE CADASTRO
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://parsleyjs.org/dist/parsley.js"></script> <!-- Biblioteca de validação de formulários JavaScript -->

<div id="form_cadastrar" class="container mb-4">
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <form id="logar" class="col-lg-6" method="post" action="logar.php" name="logar"><br>
                <div class="jumbotron jumbotron-fluid text-center m-0 h2 py-4" style="background-color: whitesmoke;">Entre com sua Conta!</div>
                <input class="form-control py-2" id="email_login" type="email" required name="email" placeholder="E-mail">
                <input class="form-control py-2 mt-3 mb-4" id="senha_login" type="password" name="senha" placeholder="Senha">
                <div class="btn-group w-100 justify-content-center">
                    <a class="btn btn-default mr-2 rounded" href="#first_name">Não é Cadastrado?</a>
                    <input class="btn btn-success rounded" type="submit" name="logar" value="ENTRAR">
                </div>
            </form>

            <form id="validate_form" class="col-lg-6"><br>
                <div class="jumbotron jumbotron-fluid text-center m-0 h2 py-4" style="background-color: whitesmoke;">Cadastre-se Gratuitamente!</div>
                <input class="form-control py-2" type="text" name="nome" id="first_name" placeholder="Nome" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                <input class="form-control py-2 my-3" type="text" name="sobrenome" id="last_name" placeholder="Sobrenome" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup">
                <input class="form-control py-2" type="text" name="email" id="email" placeholder="Email" required data-parsley-type="email" data-parsley-trigger="keyup">
                <input class="form-control py-2 my-3" type="password" name="senha" id="password" placeholder="Senha" required data-parsley-length="[8, 16]" data-parsley-trigger="keyup">
                <input class="form-control py-2 mb-3" type="password" name="confirm_senha" id="confirm_password" placeholder="Confirme a senha"data-parsley-equalto="#password" data-parsley-trigger="keyup" required>
                <div class="btn-group w-100 justify-content-center">
                    <a class="btn btn-default mr-2 rounded" href="#email_login">Já é Cadastrado?</a>
                    <input class="next acao btn btn-success rounded" type="submit" id="submit" name="submit" value="CADASTRAR" >
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#validate_form').parsley();

        $('#validate_form').on('submit', function (event) {
            event.preventDefault();
            if ($('#validate_form').parsley().isValid())
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
                        $('#validate_form')[0].reset();
                        $('#validate_form').parsley().reset();
                        $('#submit').attr('disabled', false);
                        $('#submit').val('CADASTRAR');
                        alert(data);
                    }
                });
            }
        });
    });
</script>

<?php

require_once '../rodape.php';
