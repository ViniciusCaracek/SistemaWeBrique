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

        <!-- Page header -->
        <div class="full-box page-header">
            <div class="container">
                <div class="text-dashboard-home">
                    <h3 class="text-left">
                        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Localizações
                    </h3>
                    <p class="text-justify">
                        Lista que contém os dados armazenados das localizações dos profissionais artesãos
                    </p>
                </div>
            </div>
        </div>

        <!-- Content -->
        <!-- <div class="full-box tile-container"> -->
        <div class="container-fluid">

            <a href="<?php echo base_url('DashBoardHome') ?>"><button class="btn_top_tab" style="float:left;"> <i class="fas fa-arrow-left fa-fw"></i></button></a>
            <div class="botoes_top_tab">
                <a href="<?php echo base_url('../Sistema_TCC/public/index.php/localizacao/cadastroLocalizacao') ?>"><button class="btn_top_tab">Cadastrar Novo <i class="fas fa-plus fa-fw"></i></button></a>
                <a href="<?php echo base_url('localizacao/pesquisarLocalizacao') ?>"><button class="btn_top_tab">Pesquisar Localização <i class="fas fa-search fa-fw"></i></button></a>
            </div>

            <div class="tabela_container">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="header_table">
                                <th scope="col">Id</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Longitude</th>
                                <th scope="col">Logradouro</th>
                                <th scope="col">Bairro</th>
                                <th scope="col">Nº</th>
                                <th scope="col">CEP</th>
                                <th scope="col">Ações</th>

                            </tr>
                        </thead>

                        <?php
                        $cont = 0;
                        ?>

                        <?php foreach ($localizacoes as $localizacao) : ?>
                            <?php $cont++ ?>


                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $localizacao->id_localizacao ?></th>
                                    <td colspan="1"><?php echo $localizacao->latitude ?></td>
                                    <td><?php echo $localizacao->longitude ?></td>

                                    <td><?php echo $localizacao->logradouro ?></td>
                                    <td><?php echo $localizacao->bairro ?></td>
                                    <td><?php echo $localizacao->numero ?></td>
                                    <td><?php echo $localizacao->cep ?></td>

                                    <td><a href="<?php echo base_url('../Sistema_TCC/public/index.php/localizacao/editar/' . $localizacao->id_localizacao) ?>" title="Editar"><button class="botao_tabela_editar"> <i class="fas fa-edit edit_icon"></i></button></a>
                                        <a href="<?php echo base_url('../Sistema_TCC/public/index.php/localizacao/excluir/' . $localizacao->id_localizacao) ?>" title="Excluir" data-toggle="" data-target="" onclick="return confirm('Tem certeza que deseja excluir esse registro?')"> <button class="botao_tabela_deletar"><i class="fas fa-trash-alt trash_icon"></i></button></a>
                                        <a href="<?php echo base_url('../Sistema_TCC/public/index.php/localizacao/') ?>" title="Editar"><button class="botao_tabela_editar"> <i class="fas fa-plus edit_icon"></i></button></a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                            <!--Contador de itens na lista-->
                            <?php
                            if ($cont == 0) {
                                echo '<p id="color_p">Nenhum Registro encontrado</p>';
                            } else
                            if ($cont == 1) {
                                echo ' <p id="color_p">' . $cont . ' Registro encontrado</p>';
                            } else {
                                echo ' <p id="color_p">' . $cont . ' Registros encontrados</p>';
                            }
                            ?>
                        <style>
                            #color_p a, #color_p{
                                color:orange;
                                text-decoration: none;
                                font-weight: bold;

                            }
                        </style>



                        </tbody>
                    </table>


                    <?php echo $pager->links('paginacao', 'view_paginacao'); ?>

                </div>
            </div>
        </div>







        <!-- </div> -->


    </section>
</main>

