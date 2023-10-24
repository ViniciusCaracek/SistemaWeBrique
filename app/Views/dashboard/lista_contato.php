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
                    <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Contatos
                </h3>
                <p class="text-justify">
                    Lista que contém os dados armazenados dos Contatos cadastrados.
                </p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <!-- <div class="full-box tile-container"> -->
    <div class="container-fluid">

        <a href="<?php echo base_url('Contato/listar_contato') ?>"> <button class="btn_top_tab" style="float:left;"> <i class="fas fa-arrow-left fa-fw"></i></button></a>
        <div class="botoes_top_tab">
            <a href="<?php echo base_url('../Sistema_TCC/public/index.php/contato') ?>"><button class="btn_top_tab">Cadastrar Novo <i class="fas fa-plus fa-fw"></i></button></a>
            <a href="<?php echo base_url('contato/pesquisarContato') ?>"><button class="btn_top_tab">Pesquisar Usuários <i class="fas fa-search fa-fw"></i></button></a>
        </div>

        <div class="tabela_container">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="header_table">
                            <th scope="col">Id</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Assunto</th>
                            <th scope="col">Mensagem</th>

                            <th scope="col">Ações</th>

                        </tr>
                    </thead>


                    <?php
                    $cont = 0;
                    ?>

                    <?php foreach ($contatos as $contato) : ?>
                        <?php $cont++ ?>

                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $contato->id_contato ?></th>
                                <td colspan="1"> <?php echo $contato->email ?></td>
                                <td><?php echo $contato->telefone ?></td>

                                <td><?php echo $contato->assunto ?></td>
                                <td><?php echo $contato->mensagem ?></td>

                                <td><a href="<?php echo base_url('../Sistema_TCC/public/index.php/contato/editar/' . $contato->id_contato) ?>" title="Editar"><button class="botao_tabela_editar"> <i class="fas fa-edit edit_icon"></i></button></a>
                                    <a href="<?php echo base_url('../Sistema_TCC/public/index.php/contato/excluir/' . $contato->id_contato) ?>" title="Excluir" data-toggle="" data-target="" onclick="return confirm('Tem certeza que deseja excluir esse registro?')" > <button class="botao_tabela_deletar"><i class="fas fa-trash-alt trash_icon"></i></button></a>
                                </td>
                            </tr>

<!--                        <div class="modal fade" id="modalDeletar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Deseja Realmente Excluir ? </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>


                                    <div class="modal-footer">
                                        <a href=""> <button type="button" data-target="#modalDeletar" class="btn btn-outline-danger btn-ok">Excluir <i class="fas fa-trash-alt trash_icon"></i></button></a>
                                        <a href="./lista_contato.php"><button type="button" class="btn btn-outline-primary" data-dismiss="modal">Retornar <i class="fas fa-arrow-right arrow_icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>-->

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


   <!-- <tr>
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
    </tr>-->
                <!-- Modal -->


                <?php echo $pager->links('paginacao', 'view_paginacao'); ?>


            </div>
        </div>
    </div>



    <!-- </div> -->


</section>
</main>




