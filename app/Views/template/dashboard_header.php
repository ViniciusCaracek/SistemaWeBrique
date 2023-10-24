<!doctype html>
<html lang="pt-br">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php //base_url('../Sistema_TCC/public/index.php/contato/excluir/')?>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/compiler/bootstrap.css') ?>">

        <link rel="stylesheet" href="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/compiler/fontawesome/fontawesome.css') ?>">

        <link rel="stylesheet" href="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/compiler/style.css') ?>">

        <link rel="stylesheet" href="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/compiler/style_dashboard.css') ?>">

        <link rel="shortcut icon" href="<?php echo base_url('./Sistema_TCC/public/assets/imagens/logo/projteste3107_v6.png') ?>" type="image/x-icon" />

        <title><?php echo $titulo ?></title>
    </head>

    <body>
        <!-- Main container -->
        <main class="full-box main-container">
            <!-- Nav lateral -->
            <div class=" main-nav">
                <section class="full-box nav-lateral">
                    <div class="full-box nav-lateral-bg show-nav-lateral"></div>
                    <div class="full-box nav-lateral-content">
                        <figure class="full-box nav-lateral-avatar">
                            <i class="fa fa-times-circle show-nav-lateral"></i>
                            <img src="<?php echo base_url('./Sistema_TCC/public/assets/imagens/logo/projteste3107_v5.png') ?>" class="img-fluid" alt="Avatar">
                            <figcaption class="roboto-medium text-center">
                                <?php echo session()->nome ?> <br><small class="roboto-condensed-light"><?php echo session()->nome_profissional ?></small>
                            </figcaption>
                        </figure>
                        <div class="full-box nav-lateral-bar"></div>
                        <nav class="full-box nav-lateral-menu">
                            <ul>
                                <li>
                                    <a href="<?php echo base_url('DashBoardHome') ?>"><i class="fab fa-dashcube fa-fw"></i> &nbsp;
                                        Home</a>
                                </li>

                                <!--                                <li>
                                                                    <a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Artesãos
                                                                        <i class="fas fa-chevron-down"></i></a>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="<?php echo base_url('Cadastro') ?>" class="nav-content"><i class="fas fa-user-plus fa-fw"></i>
                                                                                &nbsp; Cadastrar
                                                                                artesão</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="lista_profis.php" class="nav-content"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista
                                                                                de artesãos</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="pesquisar_profis.php" class="nav-content"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar
                                                                                artesão</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>-->

                                <li>
                                    <a href="#" class="nav-btn-submenu"><i class="fas fa-object-group fa-fw"></i> &nbsp; Categorias
                                        <i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url('categoriaController') ?>"><i class="fas fa-plus fa-fw"></i> &nbsp; Cadastrar
                                                Categorias</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('categoriaController/listar_categoria') ?>"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                                                Lista de
                                                Categorias</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('categoriaController/pesquisarCategoria') ?>"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar
                                                Categorias</a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Produtos
                                        <i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url('produto') ?>"><i class="fas fa-plus fa-fw"></i> &nbsp; Cadastrar
                                                produtos</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('produto/listar_produto') ?>"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                                                Lista de
                                                produtos</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('produto/pesquisarProduto') ?>"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar
                                                produtos</a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="nav-btn-submenu"><i class="fas fa-map-marker-alt"></i>
                                        &nbsp; Localização <i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url('localizacao/cadastroLocalizacao') ?>"><i class="fas fa-map-pin"></i>
                                                &nbsp; Cadastrar Localização</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('localizacao/listar_localizacao') ?>"><i class="fas fa-map"></i> &nbsp;
                                                Lista de Localizações</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('localizacao/pesquisarLocalizacao') ?>"><i class="fas fa-search-location"></i>
                                                &nbsp;
                                                Buscar Localização</a>
                                        </li>

                                    </ul>
                                </li>

                                <!--                                <li>
                                                                    <a href="#" class="nav-btn-submenu"><i class="fas  fa-user fa-fw"></i> &nbsp;
                                                                        Usuários <i class="fas fa-chevron-down"></i></a>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="<?php echo base_url('Usuario') ?>"><i class="fas fa-user-plus fa-fw"></i> &nbsp; Novo
                                                                                usuário</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="lista_usuario.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                                                                                Lista de
                                                                                usuários</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="pesquisar_usuario.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar
                                                                                usuário</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>-->

                                <li>
                                    <a href="#" class="nav-btn-submenu"><i class="fas fa-address-book"></i> &nbsp;
                                        Contatos <i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url('Contato') ?>"><i class="fas fa-plus fa-fw"></i> &nbsp; Novo
                                                contato</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Contato/listar_contato') ?>"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                                                Lista de
                                                contatos</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Contato/pesquisarContato') ?>"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar
                                                contatos</a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="nav-btn-submenu"><i class="fas  fa-user fa-fw"></i> &nbsp;
                                        Usuários Cadastrados <i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url('Cadastro') ?>"><i class="fas fa-user-plus fa-fw"></i> &nbsp; Novo
                                                Usuário</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Cadastro/listar_usuario') ?>"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                                                Lista de
                                                Usuários</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Cadastro/pesquisarUsuario') ?>"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar
                                                Usuários</a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="nav-btn-submenu"><i class="fas fa-share-alt"></i> &nbsp;
                                        Redes Sociais <i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url('RedeSocial') ?>"><i class="fas fa-share-alt-square"></i> &nbsp; Nova
                                                Rede Social</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('RedeSocial/listar_rede_social') ?>"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                                                Lista de
                                                Redes Sociais</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('RedeSocial/pesquisarRedeSocial') ?>"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar
                                                Rede Social</a>
                                        </li>

                                    </ul>
                                </li>



                            </ul>
                        </nav>
                    </div>
                </section>

            </div>
            
    

