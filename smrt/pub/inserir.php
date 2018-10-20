<?php

include '../bd/conectar.php';

$legenda = $_POST['legenda'];
$imagem = $_FILES['imagem']['name'];
$autor = $_POST['autor'];

//$sql_pessoa = "INSERT INTO pub (legenda, imagem, autor, titulo) VALUES ('$legenda', '$imagem','$autor','$titulo')";

$_UP['pasta'] = '../img/';

//Tamanho máximo do arquivo em Bytes
$_UP['tamanho'] = 1024 * 1024 * 100; //5mb
//Array com a extensões permitidas
$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');

//Renomeiar
$_UP['renomeia'] = false;

//Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
    die("Não foi possivel fazer o upload, erro: <br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
    exit; //Para a execução do script
}

//Faz a verificação da extensao do arquivo
$extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
    echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/pub/form_inserir.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>
				";
}

//Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['imagem']['size']) {
    echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/pub/form_inserir.php'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>
				";
}

//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
else {
    //Primeiro verifica se deve trocar o nome do arquivo
    if ($UP['renomeia'] == true) {
        //Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
        $nome_final = time() . '.jpg';
    } else {
        //mantem o nome original do arquivo
        $nome_final = $_FILES['imagem']['name'];
    }
    //Verificar se é possivel mover o arquivo para a pasta escolhida
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'] . $nome_final)) {
        //Upload efetuado com sucesso, exibe a mensagem
        mysqli_query($conexao, "INSERT INTO pub (legenda, imagem, autor, titulo) VALUES ('$legenda', '$imagem','$autor','$titulo')");
        echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/pub/teste.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem cadastrada com Sucesso.\");
						</script>
					";
    } else {
        //Upload não efetuado com sucesso, exibe a mensagem
        echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/pub/inserir.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadastrada com Sucesso.\");
						</script>
					";
    }
}
		