<?php
include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include_once '../cabecalho.php';

if (adm()) {
    $sql_pessoa = "select * from usuario where email != '$_SESSION[email]'";
    $resultado = mysqli_query($conexao, $sql_pessoa);
    ?>



    <div class="d-flex my-3">
        <form class="container text-center" action="excluir_lote.php" method="post">
            <table class="table table-striped table-responsive-sm table-responsive-md table-hover table-default">
                <thead>
                    <tr>
                        <th>
                            <button class="btn btn-danger btn-sm w-100" data-toggle="modal" data-target="#confirm" type="button" >Excluir</button>
                            <div class="modal fade" id="confirm" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p class="font-weight-bold"> Deseja realmente excluir ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <input class="btn btn-danger float-right" type="submit" value="Excluir">
                                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Email</th>
                        <th>Bloqueado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                        <tr>
                            <td>
                                <div class="checkbox justify-content-center text-center align-middle">
                                    <label>
                                        <input type="checkbox" name="id[]" value="<?= $linha['id'] ?>" >
                                        <span class="cr align-middle text-center "><i class="cr-icon fa fa-check"></i></span>
                                    </label>
                                </div>
                            </td>
                            <td><?= $linha['nome'] ?></td>
                            <td><?= $linha['sobrenome'] ?></td>
                            <td><?= $linha['email'] ?></td>
                            <td class="w-25">

                                <button type="button" id="bloq" onclick="bloquear(<?= $linha['id'] ?>)"
                                        class="<?php if ($linha['bloqueado'] == FALSE) { ?>
                                            btn-secondary
                                        <?php } else { ?>
                                            btn-danger <?php } ?> btn btn-sm text-center">

                                    <?php if ($linha['bloqueado'] == FALSE) { ?>
                                        BLOQUEAR<?php } else { ?>
                                        DESBLOQUEAR<?php } ?>

                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <thead>
                    <tr>
                        <th>
                            <button class="btn btn-danger btn-sm w-100" data-toggle="modal" data-target="#confirm" type="button" >Excluir</button>
                            <div class="modal fade" id="confirm" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p class="font-weight-bold"> Deseja realmente excluir ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <input class="btn btn-danger float-right" type="submit" value="Excluir">
                                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Email</th>
                        <th>Bloqueado</th>
                    </tr>
                </thead>
            </table>
            <?php
        } else {
            header('Location: ../index.php');
        }
        ?>
    </form>
</div>

<script>
    function bloquear(id) {
        var xhttp;
        if (window.XMLHttpRequest) {
            // codigo para browsers modernos
            xhttp = new XMLHttpRequest();
        } else {
            // codigo para IE6, IE5
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                location.reload();
            }
        };
        xhttp.open("POST", "bloquear.php?id=" + id, true);
        xhttp.send();
    }




    function excluir(id) {
        var xhttp;
        if (window.XMLHttpRequest) {
            // codigo para browsers modernos
            xhttp = new XMLHttpRequest();
        } else {
            // codigo para IE6, IE5
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                location.reload();
            }
        };
        xhttp.open("POST", "bloquear.php?id=" + id, true);
        xhttp.send();
    }
</script>
<?php
include '../rodape.php';
?>

