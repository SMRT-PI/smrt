<?php 
 ini_set("display_errors", true);
include '../bd/conectar.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$conteudo = $_POST['conteudo'];
$autor = $_POST['autor'];
$capa = $_POST['capa'];

$sql = "insert into materia (titulo,descricao,conteudo,autor,capa) values ('$titulo','$descricao','$conteudo', $autor, '$capa')";
header('Location: area_info.php');



//require_once '../usuario/autenticacao.php';
//require_once '../bd/conectar.php';
//
//
// 
//$titulo = (!empty($_POST['titulo']) ? $_POST['titulo'] : null);
//$descricao = (!empty($_POST['descricao']) ? $_POST['descricao'] : null);
//$conteudo = (!empty($_POST['conteudo']) ? $_POST['conteudo'] : null);
//$autor = (!empty($_POST['autor']) ? $_POST['autor'] : null);
//$capa = (!empty($_POST['capa']) ? $_POST['capa'] : null);
//
//if (!empty($_FILES['capa']['titulo'])){
//    $uploaddir = 'uploads/';
//    $dir = (rtrim(dirname(__FILE__), '\\/') . $uploaddir); // Obtém a pasta do arquivo do site
//    if (!@is_writable($dir)) mkdir($dir, 0777, true); // Cria a pasta de uploads se não existir
//    $arquivo = strtolower(preg_replace('{[^a-z0-9_\-\.]+}i', '_', $_FILES['capa']['titulo'])); // Limpa o nome da imagem removendo caracteres não permitidos
//    $caminho = ($dir . $arquivo); // Monta o endereço da imagem
//    $foto = ( // Monta a url da imagem
//        'http' .
//        ((isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 's' : '') .
//        '://' .
//        $_SERVER['HTTP_HOST'] .
//        rtrim(dirname($_SERVER['REQUEST_URI']), '\\/')  .
//        $uploaddir . $arquivo
//    );
//    if (!empty($_FILES['capa']['error'])) die('Erro ao fazer upload'); // Para se deu erro no envio do arquivo
//    if (empty($_FILES['capa']['tmp_name'])) die('Upload não enviado'); // Para se não foi encontrado o arquivo temporário
//    if (!@is_readable($_FILES['capa']['tmp_name'])) die('Upload não encontrado'); // Para se não foi encontrado o arquivo temporário
//    move_uploaded_file($_FILES['capa']['tmp_name'], $caminho) or die('Upload não copiado'); // Move o arquivo enviado para a pasta de uploads
//} else {
//    $capa = null;
//}
//
//
//$sql = mysqli_query($conexao, "insert into materia (titulo,descricao,conteudo,autor,capa) values ('$titulo','$descricao','$conteudo', $autor, '$capa')");
//header('Location: area_info.php');



//$query_perfil = "update usuario set nome = ".mysqliEscaparTexto($nome).", sobrenome = ".mysqliEscaparTexto($sobrenome).", email= ".mysqliEscaparTexto($email).", sexo = ".mysqliEscaparTexto($sexo).", datanasc = ".mysqliEscaparTexto($datanasc, 'date');
//if ($foto) $query_perfil .= ", foto = ".mysqliEscaparTexto($foto);
//$query_perfil .= " where id = $_SESSION[id]";
//mysqli_query($conexao, $query_perfil) or die('ERRO: '.mysqli_error($conexao).PHP_EOL.$query_perfil.PHP_EOL.print_r(debug_backtrace(), true));
//
//if ($foto) $_SESSION['foto'] = $foto;
//
//header('Location: perfil.php');

// Para dar permissão nas pastas do site pelo linux:
// Abra um terminal e acesse a pasta
//  # cd /var/www/html/FitSan
// Digite o comando:
//  # sudo chown -Rc karen:karen ./
//  # find \( -type f -printf 'chmod -c 666 %p\n' \) -or \( -type d -printf 'chmod -c 777 %p\n' \) | sudo bash






