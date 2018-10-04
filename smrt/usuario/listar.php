<?php
include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include_once '../cabecalho.php';

if (adm()) {
    $sql_denunciado = "select distinct denuncia.denunciado, denuncia.data, usuario.nome, usuario.id, usuario.sobrenome, usuario.email from denuncia inner join usuario on denuncia.denunciado= usuario.id order by nome";
    $retorno = mysqli_query($conexao, $sql_denunciado);
    $sql_bloqueado = "select * from bloqueio";
    $retorno1 = mysqli_query($conexao, $sql_bloqueado);
    ?>
    <div class="d-flex my-3 justify-content-center">
        <div id="accordion" class="container">  
            <?php while ($denunciado = mysqli_fetch_array($retorno)) {
                $bloqueado = mysqli_fetch_array($retorno);
                ?>
                <div class="card border-radius">
                    <div class="card-header py-3">
                        <button type="button" id="bloq" onclick="bloquear(<?= $denunciado['id'] ?>)"
                                class="<?php if ($denunciado['bloqueado'] == FALSE) { ?>
                                    btn-light
                                <?php } else { ?>
                                    btn-danger <?php } ?> btn btn-sm text-center float-right">

                            <?php if ($bloqueado['bloqueado'] == FALSE) { ?>
                                BLOQUEAR<?php } else { ?>
                                DESBLOQUEAR<?php } ?>
                        </button>

                        <a class="card-link float-left text-dark">
                            <strong class=""><?= $denunciado["nome"] ?> <?= $denunciado["sobrenome"] ?></strong>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>

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

