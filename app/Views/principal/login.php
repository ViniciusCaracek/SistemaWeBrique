<!doctype html>
<html lang="pt-br">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">

        <link rel="stylesheet" href="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/compiler/bootstrap.css'); ?>">

        <!--<link rel="stylesheet" href="../assets/node_modules/bootstrap/compiler/fontawesome/fontawesome.css">-->
        <link rel="stylesheet" href="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/compiler/fontawesome/fontawesome.css'); ?>">

        <!-- <link rel="stylesheet" href="../assets/node_modules/bootstrap/compiler/style.css">-->
        <link rel="stylesheet" href="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/compiler/style.css'); ?>">

        <link rel="shortcut icon" href="<?php echo base_url('./Sistema_TCC/public/assets/imagens/logo/projteste3107_v6.ico'); ?>" type="image/x-icon" />

        <title><?php echo $titulo ?></title>
    </head>
    <body>

        <div class="form_bg">
            <div class="container">
                <div class="row">
                    <div class="offset-md-4 col-md-4 offset-sm-3 col-sm-6">
                        <form action="<?php echo base_url('login/signIn') ?>"  method="post" class="form_horizontal">
                            <div class="form_icon"><i class="fa fa-user-circle"></i></div>
                            <h3 class="title-login"> LOGIN</h3>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-user"></i></span>
                                <input class="form-control" type="text" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-lock"></i></span>
                                <input class="form-control" type="password" name="senha" placeholder="Senha">
                            </div>

                            <button type="submit" class="btn btn-lg btn-block btn_login">Fazer Login</button>

                            <ul class="form-options">
                                <li><a class="form-login-link-1" href="<?php echo base_url('cadastro') ?>">Criar uma Conta  <i class="fa fa-arrow-right"></i></a></li>
                            </ul>
                            <ul class="form-options">
                                <li><a class="form-login-link-1" href="<?php echo base_url('home') ?>">Voltar para página inicial  <i class="fa fa-home"></i></a></li>
                            </ul>
                        </form>

                        <?php $msg = session()->getFlashData('msg') ?>
                        <?php if (!empty($msg)) : ?>
                            <div class="alert alert-danger">
                                <?php echo '<small><b>' . $msg . '</b></small>' ?>
                            </div>
                        <?php endif; ?>





                    </div>
                </div>
            </div>


            <footer>
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/jquery/dist/jquery.js') ?>"></script>
                <script src="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/popper.js/dist/umd/popper.js') ?>"></script>
                <script src="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/dist/js/bootstrap.js') ?>"></script>
                <script src="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/js/custom.js') ?>"></script>

            </footer>
    </body>
</html>

