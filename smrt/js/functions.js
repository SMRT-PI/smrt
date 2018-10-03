$(function () {
    var cadastrar = $('form[name=cadastrar]');
    $('input[name=next]').click(function (evento) {
        var array = cadastrar.serializeArray();
        if (array[3].value == '' || array[4].value == '') {
            $('.resp').html('<p class="m-0">Preencha Todos os Dados!</p>');
        } else {
            $.ajax({
                method: 'post',
                url: 'cadastrar.php',
                data: {cadastrar: 'sim', campos: array},
                dataType: 'json',
                beforeSend: function () {
                    $('.resp').html('<div class="erros"><p>Aguarde Enquanto Processamos seus Dados...</p></div>');
                },
                success: function (valor) {
                    if (valor.erro == 'sim') {
                        $('.resp').html('<div class="erros"><p>' + valor.getErro + '</p></div>');
                    } else {
                        $('.resp').html('<div class="ok">' + valor.msg + '</div>');
                    }
                }
            });
        }
        evento.preventDefault();
    });
});

function mudar(form) {

    if (form === form_logar) {
        form.style.display = "none";
        form_cadastrar.style.display = "block";
    };
    if (form === form_cadastrar) {
        form_logar.style.display = "block";
        form.style.display = "none";
    };
};
