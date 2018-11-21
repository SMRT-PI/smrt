<?php
include_once '../usuario/autenticacao.php';
include_once '../bd/conectar.php';

$sobre = $_POST['sobre'];
$experiencias = $_POST['experiencias'];
$hobbies = $_POST['hobbies'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$foto = "";

$_UP['pasta'] = '../img/'; //PASTA ONDE A IMAGEM VAI SER ARMAZENADA
$_UP['tamanho'] = 1024 * 1024 * 100; //Tamanho MÁXIMO do arquivo em BYTES (FICA 5mB)
$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif'); //Array com a EXTENÇÕES PERMITIDAS
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

if ($_FILES['foto']['error'] !== 0) { //Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
    die("Não foi possivel fazer o upload, erro: <br />" . $_UP['erros'][$_FILES['foto']['error']]);
    exit; 
}
else if ($_UP['tamanho'] < $_FILES['foto']['size']) {
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/publicacao/form_inserir.php'>
        <script type=\"text/javascript\">  alert(\"Arquivo muito grande.\"); </script>";
}

$extensao = (strtolower(end(explode('.', $_FILES['foto']['name']))));
if (array_search($extensao, $_UP['extensoes']) === FALSE) {
    echo "                              <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/smrt/publicacao/form_inserir.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>";
}

else {

    $nome_final = "" . time(). "." . $extensao;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $nome_final)) {
        $foto = $nome_final;

    } else {
        
    }
}

$sql = "UPDATE usuario SET sobre='".$sobre.
        "', experiencias='".$experiencias.
        "', hobbies='".$hobbies.
        "', endereco='".$endereco.
        "', cidade='".$cidade.
        "', estado='".$estado.
        "', nome='".$nome.
        "', sobrenome='".$sobrenome.
        "', email='".$email.
        "', foto ='".$foto.
        "', senha= md5('".$senha.
        "') WHERE email = '".$_SESSION['email']."'";
 
mysqli_query($conexao, $sql);

header("Location: http://localhost/smrt/perfil/perfil.php");

