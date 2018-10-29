<?php

include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include '../cabecalho.php';
//require_once './form_logar.php'; //FORMULÁRIO DE LOGIN
//require_once './form_cadastrar.php'; //FORMULÁRIO DE CADASTRO
?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#ajax_form').validate({
            rules: {
                nome: {required: true, minlength: 2},
                sobrenome: {required: true, minlength: 2},
                email: {required: true, email: true},
                senha: {required: true}
            },
            messages: {
                nome: {required: 'Preencha o campo Nome', minlength: 'No mínimo 2 letras'},
                sobrenome: {required: 'Preencha o campo Sobrenome', minlength: 'No mínimo 2 letras'},
                email: {required: 'Informe o seu Email', email: 'Ops, informe um email válido'},
                senha: {required: 'Informe uma Senha'}

            },
            submitHandler: function (form) {
                var dados = $(form).serialize();

                $.ajax({
                    type: "POST",
                    url: "logar.php",
                    data: dados,
                    success: function (data)
                    {
                        alert(data);
                    }
                });

                return false;
            }
        });
    });
</script>
<div class="container-fluid mb-4">
    <div class="jumbotron jumbotron-fluid text-center m-0 h2" style="background-color: whitesmoke;">Cadastre-se Gratuitamente!</div>
    <div class="container-fluid text-center">
        <div class="row justify-content-center">

            <form method="post" action="" id="ajax_form" class="col-lg-6"><br>
                <input class="form-control py-3" type="text" name="nome" placeholder="Nome">
                <input class="form-control py-3 my-3" type="text" name="sobrenome" placeholder="Sobrenome">
                <input class="form-control py-3" type="text" name="email" placeholder="E-mail">
                <input class="form-control py-3 my-3" type="password" name="senha" placeholder="Senha">
                <div class="btn-group w-100 justify-content-center">
                    <button class="btn btn-default mr-2 rounded" type="button" onclick="mudar(form_cadastrar)">Já é Cadastrado?</button>
                    <input class="next acao btn btn-success rounded" name="enviar" type="submit" value="CADASTRAR">
                </div>
            </form>
        </div>
    </div>
</div>
<?php

require_once '../rodape.php';
