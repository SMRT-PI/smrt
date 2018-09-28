<div id="form_cadastrar" class="container-fluid mb-4">
    <div class="jumbotron jumbotron-fluid text-center m-0 h2" style="background-color: whitesmoke;">Cadastre-se Gratuitamente!</div>
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            
            <form id="formulario" class="col-lg-6" method="post" enctype="multipart/form-data" name="cadastrar" ><br>
                <div class="resp container-fluid text-center m-0 bg-danger text-light rounded"></div>
                <input class="form-control py-3" type="text" name="nome" placeholder="Nome">
                <input class="form-control py-3 my-3" type="text" name="sobrenome" placeholder="Sobrenome">
                <input class="form-control py-3" type="email" name="email" placeholder="E-mail">
                <input class="form-control py-3 my-3" type="password" name="senha" placeholder="Senha">
                <input class="form-control py-3 mb-4" type="password" name="csenha" placeholder="Confirme a senha">
                <div class="btn-group w-100 justify-content-center">
                    <button class="btn btn-default mr-2 rounded" type="button" onclick="mudar(form_cadastrar)">Já é Cadastrado?</button>
                    <input class="next acao btn btn-success rounded" name="next" type="submit" value="CADASTRAR">
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/functions.js"></script>
