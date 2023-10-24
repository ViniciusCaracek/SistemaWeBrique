
<main>

    <!-- Page content -->
    <section class="full-box page-content">
        <nav class="full-box navbar-info">
            <a href="#" class="float-left show-nav-lateral">
                <i class="fas fa-exchange-alt"></i>
            </a>
            <a href="#">
                <i class="fas fa-user-cog"></i>
            </a>
            <a href="../index.php" data-toggle="modal" data-target="#modalExemplo">
                <i class="fas fa-power-off"></i>
            </a>

            <!-- Modal -->
            <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deseja Realmente Sair?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-footer">
                            <a href="<?php echo base_url('DashboardHome') ?>"><button type="button" class="btn btn-outline-info" data-dismiss="modal">Retornar</button></a>
                            <a href="<?php echo base_url('home') ?>"><button type="button" class="btn btn-outline-danger">Sair</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>



        <!-- <a href="../index.php" class="btn-exit-system"> -->
        <!-- Page header -->
        <div class="full-box page-header">
            <div class="container">
                <div class="text-dashboard-home">
                    <h3 class="text-left">
                        <i class="fab fa-dashcube fa-fw"></i> &nbsp; DASHBOARD - HOME - ADMINISTRADOR
                    </h3>
                    <p class="text-justify">
                        Painel de controle onde é feita a operação de manipulação de dados no sistema.
                    </p>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="full-box tile-container">

            <a href="<?php echo base_url('Cadastro/listar_usuario') ?>" class="tile">
                <div class="tile-tittle">Artesãos</div>
                <div class="tile-icon">
                    <i class="fas fa-users fa-fw"></i>
                    <p><?= $cont5 ?> Registrados</p>
                </div>
            </a>

            <a href="<?php echo base_url('Produto/listar_produto') ?>" class="tile">
                <div class="tile-tittle">Produtos</div>
                <div class="tile-icon">
                    <i class="fas fa-pallet fa-fw"></i>
                    <p><?= $cont2 ?> Registrados</p>
                </div>
            </a>

            <a href="<?php echo base_url('CategoriaController/listar_categoria') ?>" class="tile">
                <div class="tile-tittle">Categorias</div>
                <div class="tile-icon">
                    <i class="fas fa-object-group"></i>
                    <p><?= $cont3 ?> Registrados</p>
                </div>
            </a>

            <a href="<?php echo base_url('localizacao/listar_localizacao') ?>" class="tile">
                <div class="tile-tittle">Localização</div>
                <div class="tile-icon">
                    <i class="fas fa-map-marked-alt"></i>
                    <p><?= $cont4 ?> Registrados</p>
                </div>
            </a>

<!--            <a href="<?php echo base_url('listar_usuario') ?>" class="tile">
                <div class="tile-tittle">Usuarios</div>
                <div class="tile-icon">
                    <i class="fas fa-user"></i>
                    <p>0 Registrados</p>
                </div>
            </a>-->

            <a href="<?php echo base_url('Contato/listar_contato') ?>" class="tile">
                <div class="tile-tittle">Contatos</div>
                <div class="tile-icon">
                    <i class="fas fa-address-book"></i>
                    <p> <?= $cont1 ?> Registros </p>
                </div>
            </a>

            <a href="<?php echo base_url('RedeSocial/listar_rede_social') ?>" class="tile">
                <div class="tile-tittle">Redes Sociais</div>
                <div class="tile-icon">
                    <i class="fas fa-share-alt"></i>
                    <p> <?= $cont6 ?> Registros </p>
                </div>
            </a>



        </div>


    </section>
</main>




