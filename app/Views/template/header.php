<!doctype html>
<html lang="pt-br">

    <head>
        <!-- Required meta tags -->
        <!-- Linkado para pasta public "Assets" -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap CSS -->
        <!--<link rel="stylesheet" href="../assets/node_modules/bootstrap/compiler/bootstrap.css">-->


        <link rel="stylesheet" href="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">

        <link rel="stylesheet" href="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/compiler/bootstrap.css'); ?>">

        <!--<link rel="stylesheet" href="../assets/node_modules/bootstrap/compiler/fontawesome/fontawesome.css">-->
        <link rel="stylesheet" href="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/compiler/fontawesome/fontawesome.css'); ?>">

        <!-- <link rel="stylesheet" href="../assets/node_modules/bootstrap/compiler/style.css">-->
        <link rel="stylesheet" href="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/compiler/style.css'); ?>">

        <link rel="shortcut icon" href="<?php echo base_url('./Sistema_TCC/public/assets/imagens/logo/projteste3107_v6.ico'); ?>" type="image/x-icon" />


        <!--          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        -->

        <title><?php echo $titulo ?> </title>
    </head>

    <body>
   
        <header>
            <!-- ////////////////////     HEADER - NAV       /////////////////////////// -->
            <div class="container">

                <!-- ////////////////////      NAV       /////////////////////////// -->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="<?php echo base_url('./Sistema_TCC/public/index.php/home') ?>">
                        <img src="<?php echo base_url('./Sistema_TCC/public/assets/imagens/logo/projteste3107_v6.png') ?>" width="150" height="150" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite" >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSite">
                        <ul class="navbar-nav ml-5 ">
                            <li class="nav-item nav-link-color nav-link-item m-0">
                                <a class="nav-link" href="<?php echo base_url('./Sistema_TCC/public/index.php/home') ?>">Home</a>
                            </li>

                            <li class="nav-item nav-link-item m-0">
                                <a class="nav-link" href="<?php echo base_url('./Sistema_TCC/public/index.php/categoria') ?>">Categorias</a>
                            </li>

                            <li class="nav-item nav-link-item m-0">
                                <a class="nav-link" href="<?php echo base_url('./Sistema_TCC/public/index.php/localizacao') ?>" title="Localizações" >&nbsp<i class="fas fa-map-marked-alt fa-2x" style="opacity:0.2;">&nbsp</i></a>
                            </li>
                            <li class="nav-item nav-link-item m-0">
                                <a class="nav-link" href="<?php echo base_url('./Sistema_TCC/public/index.php/contato') ?>">Contato</a>
                            </li>
                            <li class="nav-item nav-link-item m-0">
                                <a class="nav-link" href="<?php echo base_url('./Sistema_TCC/public/index.php/cadastro') ?>"> Cadastre-se</a>
                            </li>


                            <li class="nav-item nav-link-item ml-3 pl-5">
                                <a class="nav-link " href="<?php echo base_url('./Sistema_TCC/public/index.php/login') ?>" title="Fazer Login"><i class="fas fa-user">&nbsp</i></a>
                            </li>
                            <li class="nav-item nav-link-item m-0">
                                <a class="nav-link" href="<?php echo base_url('./Sistema_TCC/public/index.php/login/signOut') ?>" title="Sair da Sessão"><i class="fas fa-sign-out-alt"></i></a>
                            </li>
                            <li class="nav-item nav-link-item m-0">

                                <?php if ((string) session()->tipo != 'administrador'): ?>

                                    <a class="nav-link" href="<?php echo base_url('./Sistema_TCC/public/index.php/DashBoardHome/DashboardUser') ?>" title="Painel de Controle"><i class="fas fa-cog"></i></a>
                                <?php else: ?>
                                    <a class="nav-link" href="<?php echo base_url('./Sistema_TCC/public/index.php/DashBoardHome') ?>" title="Painel de Controle"><i class="fas fa-cog"></i></a>
                                <?php endif ?>


                            </li>



                        </ul>
                        <div class="col-lg-2 ml-3 bem_vindo_login" title="Usuário Logado" style="font-size: 11px; color:#888; text-transform: uppercase; font-weight: bold; ">
                            <i class="fas fa-ellipsis-v"></i> Bem-vindo <p> <?php echo session()->nome ?></div><p>

                    </div>
                </nav>
                <!-- ////////////////////      NAV       /////////////////////////// -->
            </div>
        </header>


        <!--Fecha Container-->
        <!-- ////////////////////    FECHA HEADER       /////////////////////////// -->
