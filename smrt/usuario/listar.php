<?php
include_once '../usuario/autenticacao.php';
include_once '../bd/conectar.php';
include_once '../cabecalho.php';

if (adm()) {
    $sql_denunciado = "SELECT
        d.denunciado,
        d.data,
        u.nome,
        u.id,
        u.sobrenome,
        u.email
    FROM 
        denuncia d
        INNER JOIN usuario u ON d.denunciado = u.id
    ORDER BY nome";
    $retorno = mysqli_query($conexao, $sql_denunciado);
    $adm = mysqli_query($conexao, "SELECT id FROM usuario WHERE email = " . $_SESSION['email']);
    ?>
    <div class="d-flex my-3 justify-content-center">
        <div id="accordion" class="container">  
            <?php while ($denunciado = mysqli_fetch_array($retorno)) {
                ?>
                <div class="card border-radius">
                    <div class="card-header py-3">
                        <button type="button" id="bloq" onclick="bloquear(<?= $denunciado['id'] ?><?= $adm ?>)"
                                class="<?php if ($denunciado['bloqueado'] == FALSE) { ?>
                                    btn-light
                                <?php } else { ?>
                                    btn-danger <?php } ?> btn btn-sm text-center float-right">

                            <?php if ($linha['bloqueado'] == FALSE) { ?>
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

    function bloquear(id,adm) {
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

