
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
                            <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Pesquisar Localizações
                        </h3>
                        <p class="text-justify">
                            Pesquisar localização de profissionais artesãos que estão cadastrados no sistema
                        </p>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <!-- <div class="full-box tile-container"> -->
            <div class="container-fluid">

                <a href="lista_localizacao.php"><button href="lista_localizacao.php" class="btn_top_tab" style="float:left;"> <i class="fas fa-arrow-left fa-fw"></i></button></a>
                <div class="botoes_top_tab">
                    <a href="cadastrar_localizacao.php"><button class="btn_top_tab">Cadastrar Novo <i class="fas fa-plus fa-fw"></i></button></a>
                    <a href="pesquisar_localizacao.php"><button class="btn_top_tab">Pesquisar Localização <i class="fas fa-search fa-fw"></i></button></a>
                </div>

                <!-- <div class="form_procurar">
                    <form class="form-inline-procurar ">
                        <input class="form-control " type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-danger dashboard_buscar" type="submit"> Buscar <i class="fas fa-search fa-fw"></i></button>
                    </form>
                </div> -->
                <div class="row_buscar">
                    <div class="dashboard_buscar">
                        <!-- <div class="col-lg-12 main_buscar"> -->
                        <div class="input-group" id="input-group-search-dashboard">
                            <input class="form-control" type="search" id="search_dashboard" placeholder="Pesquisar" aria-label="Search" style="border-right: none;">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>

                </div>


                <div class="tabela_container">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="header_table">
                                    <th scope="col">Id</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Senha</th>
                                    <th scope="col">Tipo</th>
                
                                    <th scope="col">Ações</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td colspan="1">email@email.com</td>
                                    <td>Joao</td>

                                    <td>123456</td>
                                    <td>profis</td>
                                    
                                    <td><a href="../cadastrar_localizacao.php"><button class="botao_tabela_editar">Editar <i class="fas fa-edit edit_icon"></i></button></a>
                                        <button class="botao_tabela_deletar" href="./lista_localizacao.php">Excluir <i class="fas fa-trash-alt trash_icon"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td colspan="1">email3@email.com</td>
                                    <td>Maria</td>

                                    <td>123123</td>
                                    <td>profis</td>
                                    
                                    <td><a href="../cadastrar_localizacao.php"><button class="botao_tabela_editar">Editar <i class="fas fa-edit edit_icon"></i></button></a>
                                        <button class="botao_tabela_deletar" href="./lista_localizacao.php">Excluir <i class="fas fa-trash-alt trash_icon"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="1">email2@email.com</td>
                                    <td>Vinicius</td>

                                    <td>123321</td>
                                    <td>Adm</td>
                                    
                                    <td><a href="../cadastrar_localizacao.php"><button class="botao_tabela_editar">Editar <i class="fas fa-edit edit_icon"></i></button></a>
                                        <button class="botao_tabela_deletar" href="./lista_localizacao.php">Excluir <i class="fas fa-trash-alt trash_icon"></i></button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <nav aria-label="paginacao">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">Próximo</a>
                                    </li>
                                </ul>
                            </nav>
                        </nav>

                    </div>
                </div>
            </div>







            <!-- </div> -->


        </section>
    </main>





    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="../node_modules/bootstrap/js/custom.js"></script>

</body>

</html>