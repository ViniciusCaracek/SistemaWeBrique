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
                        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Pesquisar Categoria
                    </h3>
                    <p class="text-justify">
                        Pesquisar categorias que estão cadastrados no sistema
                    </p>
                </div>
            </div>
        </div>

        <!-- Content -->
        <!-- <div class="full-box tile-container"> -->
        <div class="container-fluid">

            <a href="<?php echo base_url('categoriaController') ?>"><button class="btn_top_tab" style="float:left;"> <i class="fas fa-arrow-left fa-fw"></i></button></a>
            <div class="botoes_top_tab">
                <a href="<?php echo base_url('categoriaController') ?>"><button class="btn_top_tab">Cadastrar Novo <i class="fas fa-plus fa-fw"></i></button></a>
                <a href="<?php echo base_url('categoriaController/pesquisarCategoria') ?>"><button class="btn_top_tab">Pesquisar Categoria <i class="fas fa-search fa-fw"></i></button></a>
            </div>

            <!-- <div class="form_procurar">
                <form class="form-inline-procurar ">
                    <input class="form-control " type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-danger dashboard_buscar" type="submit"> Buscar <i class="fas fa-search fa-fw"></i></button>
                </form>
            </div> -->
            <form action="" method="post">
                <div class="row_buscar">
                    <div class="dashboard_buscar">
                        <!-- <div class="col-lg-12 main_buscar"> -->
                        <div class="input-group" id="input-group-search-dashboard">
                            <input class="form-control" type="search" id="search_dashboard" name="pesquisar" placeholder="Pesquisar" aria-label="Search" style="border-right: none;">
                            <div class="input-group-append">
                                <button class="input-group-text" type="submit" name="submit"><i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>

                </div>
            </form>


            <div class="tabela_container">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="header_table">
                                <th scope="col">Id</th>

                                <th scope="col">Descrição</th>

                                <th scope="col">Ações</th>

                            </tr>
                        </thead>
                        <?php
                        $cont = 0;
                        ?>
                        <?php foreach ($categorias as $categoria) : ?>
                            <?php $cont++ ?>      
                            <tbody>

                                <tr>
                                    <th scope="row"><?php echo $categoria->id_categoria ?></th>
                                    <td colspan="1"> <?php echo $categoria->descricao ?></td>


                                    <td><a href="<?php echo base_url('../Sistema_TCC/public/index.php/categoriaController/editar/' . $categoria->id_categoria) ?>" 
                                           title="Editar"><button class="botao_tabela_editar"> <i class="fas fa-edit edit_icon"></i></button></a>

                                        <a href="<?php echo base_url('../Sistema_TCC/public/index.php/CategoriaController/excluir/' . $categoria->id_categoria) ?>" 
                                           title="Excluir" data-toggle="" data-target="" > <button class="botao_tabela_deletar"><i class="fas fa-trash-alt trash_icon"></i></button></a>
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

