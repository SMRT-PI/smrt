<?php
include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include '../cabecalho.php';
?>

<div id="form_logar" class="container-fluid mb-4">
    <div class="jumbotron jumbotron-fluid text-center m-0 h2" style="background-color: whitesmoke;">Entre com sua Conta!</div>
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <form id="logar" class="col-lg-6" method="post" action="logar.php"><br>
                <div class="alert alert-danger" id="error" style="display: none;">
                </div>
                <input class="form-control py-3" id="email" type="email" name="email" placeholder="E-mail">
                <input class="form-control py-3 mt-3 mb-4" id="senha" type="password" name="senha" placeholder="Senha">
                <div class="btn-group w-100 justify-content-center">
                    <button class="btn btn-default mr-2 rounded" type="button" onclick="mudar(form_logar)">Não é Cadastrado?</button>
                    <input class="btn btn-success rounded" type="submit" value="ENTRAR">
                </div>
            </form>
        </div>
    </div>
</div>

<div id="form_cadastrar" class="container-fluid mb-4" style="display: none;">
    <div class="jumbotron jumbotron-fluid text-center m-0 h2" style="background-color: whitesmoke;">Cadastre-se Gratuitamente!</div>
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <form class="col-lg-6" method="post" action="cadastrar.php"><br>
                <input id="cadastrar" class="form-control py-3" type="text" name="nome" placeholder="Nome">
                <input class="form-control py-3 my-3" type="text" name="sobrenome" placeholder="Sobrenome">
                <input class="form-control py-3" type="email" name="email" placeholder="E-mail">
                <input class="form-control py-3 mt-3 mb-4" type="password" name="senha" placeholder="Senha">
                <div class="btn-group w-100 justify-content-center">
                    <button class="btn btn-default mr-2 rounded" type="button" onclick="mudar(form_cadastrar)">Já é Cadastrado?</button>
                    <input class="btn btn-success rounded" type="submit" value="CADASTRAR">
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    function mudar(form) {

        if (form === form_logar) {
            form.style.display = "none";
            form_cadastrar.style.display = "block";
        }
        if (form === form_cadastrar) {
            form_logar.style.display = "block";
            form.style.display = "none";
        }
    }

    function validar(tipo) {
        if (form === form_logar) {
            form.style.display = "none";
            form_cadastrar.style.display = "block";
        }
        if (form === form_cadastrar) {
            form_logar.style.display = "block";
            form.style.display = "none";
        }
    }

</script>

<?php
include '../rodape.php';
