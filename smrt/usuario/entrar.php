<?php

include '../usuario/autenticacao.php';
include '../bd/conectar.php';
include '../cabecalho.php';

require_once './form_logar.php'; //FORMULÁRIO DE LOGIN
require_once './form_cadastrar.php'; //FORMULÁRIO DE CADASTRO
?>

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
</script>

<?php

include '../rodape.php';
