<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <?php require_once 'usuario/autenticacao.php'; ?>

        <meta charset="UTF-8">
        <title>SMRT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="/smrt/css/css.css">   
        <!-- ICONES FONTAWESOME -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <!-- BOOTSTRAP 4 CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- BOOTSTRAP 4 jQuery library -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <!-- BOOTSTRAP 4 Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <!-- BOOTSTRAP 4 JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- BOOTSTRAP TOGGLE -->
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script type="text/javascript" src="../js/functions.js"></script>
        <!-- Botão de Like-->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV9x1ioWPmKq2F5zrfw4FVeHCW_L2Ruso&callback=initMap"
        type="text/javascript"></script>
    </head>


    <body>
        <!-- FUNDO PRINCIPAL -->
        <div class="content2">

            <!-- MENU -->
            <nav class="navbar navbar-expand-lg navbar-dark d-flex py-2 px-5" style="min-height: 12vh" >

                <!-- BRAND -->
                <a class="navbar-brand text-muted" href="/smrt/index.php">
                    <img class="img-fluid d-inline-block align-top" src="/smrt/img/logo.png" width="30" height="30">
                    <strong>SMRT</strong>
                </a>
                <!-- /BRAND -->

                <!-- ICONE -->
                <button class="navbar-toggler border-white" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" >
                    <span class="navbar-toggler-icon align-middle"></span>
                </button>
                <!-- /ICONE -->


                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav text-center py-2 px-3">
                        <!-- LINK4 -->
                        <li class="nav-item <?php if (admin()) { ?>dropdown <?php } ?>">
                            <a class="nav-link text-light" <?php if (admin()) { ?>href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php } else { ?>href="/smrt/informacao/area_info.php" <?php } ?> >
                                <strong>Área Informativa </strong>
                            </a>
                            <?php if (admin()) { ?>  
                                <div class="dropdown-menu text-center  bg-light py-1" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item bg-light text-dark py-2" href="/smrt/informacao/area_info.php">Matérias</a>
                                    <a class="dropdown-item bg-light text-dark py-2" href="/smrt/informacao/form_inserir.php">Criar Matéria</a>
                                </div> 
                            <?php } ?>
                        </li>
                        <!-- /LINK4 --> 

                        <li class="nav-item">
                            <a class="nav-link text-light" href="/smrt/publicacao/publicacao.php"><strong>Feed de Notícias</strong></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light" href="/smrt/alerta/alerta.php"><strong>Alertas</strong></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light" href="/smrt/sobre.php"><strong>Sobre nós</strong></a>
                        </li>
                        <!-- LINK5 -->
                        <?php
                        if (estaLogado()) {
                            if (admin()) {
                                ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <strong>Gerenciar</strong>
                                    </a>
                                    <div class="dropdown-menu text-center  bg-light py-1" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item bg-light text-dark py-2" href="/smrt/usuario/listar.php">Usuários</a>
                                        <a class="dropdown-item bg-light text-dark py-2" href="/smrt/denunciar/form_denunciarpub.php">Denuncias Pub</a>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                    <?php if (estaLogado()) { ?>

                        <li class="navbar-nav dropdown ml-auto">
                            <a href="#" class="text-light nav-link m-0" data-toggle="dropdown">
                                <img class="rounded-circle" src="/smrt/img/m1.jpg" width="40" height="40"> 
                                <strong><?= $_SESSION['nome'] ?> <?= $_SESSION['sobrenome'] ?> </strong>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left m-0 bg-light py-1 text-center" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item bg-light text-dark py-2 m-0" href="/smrt/perfil/perfil.php">Perfil</a>
                                <a class="m-0 text-muted dropdown-item bg-light py-2" href="/smrt/usuario/logout.php">
                                    <strong>SAIR</strong>
                                </a>
                            </div>
                        </li>
                    <?php } else { ?>   
                        <!-- LINK7 -->
                        <a class="navbar-brand ml-auto" href="/smrt/usuario/entrar.php">                             
                            <strong>ENTRAR</strong>
                        </a>
                        <!-- /LINK7 -->
                    <?php } ?> 
                </div>
            </nav>
            <!-- /MENU -->
