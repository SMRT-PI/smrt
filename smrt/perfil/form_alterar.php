<?php
include '../cabecalho.php';
include '../bd/conectar.php';

$email = $_SESSION['email'];
$sql = sprintf("SELECT * FROM usuario WHERE email = '%s'", $_SESSION['email']);
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);
?>

                <div class="tab-pane" id="edit">
                    <form enctype="multipart/form-data" role="form" method="post" action="editar.php">
                        <p>Sobre você:</p>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Sobre mim</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="sobre" type="text" value="<?= $linha['sobre'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Experiências</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="experiencias" type="text" value="<?= $linha['experiencias'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Hobbies</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="hobbies" type="text" value="<?= $linha['hobbies'] ?>">
                            </div>
                        </div>
                        
                        
                        <p>Dados:</p>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Usuário/Login</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="nome" type="text" value="<?= $linha['nome'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Sobrenome</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="sobrenome" type="text" value="<?= $linha['sobrenome'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="email" type="email" value="<?= $linha['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Endereço</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="endereco" type="text" value="<?= $linha['endereco'] ?>" placeholder="Endereco">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-6">
                                <input class="form-control" name="cidade" type="text" value="<?= $linha['cidade'] ?>" placeholder="Cidade">
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" name="estado" type="text" value="<?= $linha['estado'] ?>" placeholder="Estado">
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Senha</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="senha" type="password" value="<?= $linha['senha'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirmar senha</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="senha" type="password" value="<?= $linha['senha'] ?>">
                            </div>
                        </div>
                        <label class="custom-file">
                            <input name="foto" type="file" id="file" class="custom-file-input">
                                <span class="custom-file-control">Escolher foto</span>
                        </label>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancelar">
                                <input type="submit" class="btn btn-primary" value="Editar">
                            </div>
                        </div>
                    </form>
                </div>
<?php
require_once '../rodape.php';
