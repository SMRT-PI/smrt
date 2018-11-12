<?php

require_once '../bd/conectar.php';

$capa = $_FILES['imagem']['name'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$conteudo = $_POST['conteudo'];

    


$_UP['pasta'] = '../img/'; //PASTA ONDE A IMAGEM VAI SER ARMAZENADA
$_UP['tamanho'] = 1024 * 1024 * 100; //Tamanho MÁXIMO do arquivo em BYTES (FICA 5mB)
$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif'); //Array com a EXTENÇÕES PERMITIDAS
//$_UP['renomeia'] = TRUE; //Renomeiar;
//Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';


if ($_FILES['imagem']['error'] !== 0) { //Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
    die("Não foi possivel fazer o upload, erro: <br />" . $_UP['erros'][$_FILES['imagem']['error']]);
    exit; //Para a execução do script
}

//Faz a verificação da extensao do arquivo
$extensao = (strtolower(end(explode('.', $_FILES['imagem']['name']))));
if (array_search($extensao, $_UP['extensoes']) === FALSE) {
    echo "                              <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/publicacao/form_inserir.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>";
}

//Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['imagem']['size']) {
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/informacao/form_inserir.php'>
        <script type=\"text/javascript\">  alert(\"Arquivo muito grande.\"); </script>";
}

//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
else {
    //Primeiro verifica se deve trocar o nome do arquivo
//    if ($UP['renomeia'] === TRUE) {
    //Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
    $nome_final = "" . time() . $extensao;
//    } else {
//    mantem o nome original do arquivo
//        $nome_final = $_FILES['imagem']['name'];
//    }
    //Verificar se é possivel mover o arquivo para a pasta escolhida
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'] . $nome_final)) {
        //Upload efetuado com sucesso, exibe a mensagem
        mysqli_query($conexao, "INSERT INTO materia (titulo, imagem, descricao, conteudo, capa) VALUES ('$titulo', '$imagem','$descricao','$conteudo','$capa')");
//        insert into materia (titulo,descricao,conteudo,autor,capa) values ('$titulo','$descricao','$conteudo', $autor, '$capa')
        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/informacao/area_info.php'>";
    } else {
        //Upload não efetuado com sucesso, exibe a mensagem
        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/informacao/upload.php'>
                <script type=\"text/javascript\">
                alert(\"Imagem não foi cadastrada com Sucesso.\");
                </script>";
    }
}

header('Location: area_info.php');
		