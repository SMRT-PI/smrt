<?php
include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include_once '../cabecalho.php';

if (adm()) {
    $sql_pessoa = "select * from usuario where email != '$_SESSION[email]' order by nome";
    $resultado = mysqli_query($conexao, $sql_pessoa);
    $n = 1;
    ?>
    <div class="d-flex my-3 justify-content-center">
        <div id="accordion" class="container">  
            <?php while ($linha = mysqli_fetch_array($resultado)) {
                ?>
                <div class="card bg-light">
                    <div class="card-header py-3">
                        <a class="card-link float-right" data-toggle="collapse" href="#collapse<?= $n ?>">
                            <strong class="">...</strong>
                        </a>
                        <a class="card-link float-left" data-toggle="collapse" href="#collapse<?= $n ?>">
                            <strong class=""><?= $linha["nome"] ?> <?= $linha["sobrenome"] ?></strong>
                        </a>
                    </div>
                    <div id="collapse<?= $n ?>" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <?= $linha["nome"] ?>
                        </div>
                    </div>
                </div>
                <?php
                $n++;
            }
            ?>
        </div>
    </div>
<?php }
?>

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

