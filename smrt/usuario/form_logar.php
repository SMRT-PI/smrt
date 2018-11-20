<div id="form_logar" class="container-fluid mb-4">
    <div class="jumbotron jumbotron-fluid text-center m-0 h2" style="background-color: whitesmoke;">Entre com sua Conta!</div>
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <form id="logar" class="col-lg-6" method="post" action="logar.php" name="logar"><br>
                <input class="form-control py-3" id="email" type="email" name="email" placeholder="E-mail">
                <input class="form-control py-3 mt-3 mb-4" id="senha" type="password" name="senha" placeholder="Senha">
                <?php
                if (!empty($_SESSION['erro'])) {
                ?>
                    <div class="alert alert-danger" role="alert">
                     <?php echo $_SESSION['erro']; ?>
                    </div>
                <?php
                }
                ?>
                <div class="btn-group w-100 justify-content-center">
                    <button class="btn btn-default mr-2 rounded" type="button" onclick="mudar(form_logar)">Não é Cadastrado?</button>
                    <input class="btn btn-success rounded" type="submit" name="logar" value="ENTRAR">
                </div>
            </form>
        </div>
    </div>
</div>
