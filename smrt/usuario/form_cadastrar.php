<div id="form_cadastrar" class="container-fluid mb-4" style="display: none;" >
    <div class="jumbotron jumbotron-fluid text-center m-0 h2" style="background-color: whitesmoke;">Cadastre-se Gratuitamente!</div>
    <div class="container-fluid text-center">
        <div class="row justify-content-center">

            <form method="post" action="" id="ajax_form" class="col-lg-6"><br>
                <div class="resp container-fluid text-center m-0 bg-danger text-light rounded"></div>
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

<!--<form method="post" action="" id="ajax_form">
    <label>Nome: <input type="text" name="nome" value="" /></label>
    <label>Sobrenome: <input type="text" name="sobrenome" value="" /></label>
    <label>Email: <input type="text" name="email" value="" /></label>
    <label>Senha: <input type="text" name="senha" value="" /></label>

    <label><input type="submit" name="enviar" value="Enviar" /></label>
</form>-->

