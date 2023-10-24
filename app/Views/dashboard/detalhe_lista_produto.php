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
                        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Produtos
                    </h3>
                    <p class="text-justify">
                        Lista que contém os dados armazenados dos produtos.
                </div>
            </div>
        </div>

        <!-- Content -->
        <!-- <div class="full-box tile-container"> -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-4">
                    
                   <?php if (session()->tipo === 'padrao'): ?>
                    <a href="<?php echo base_url('produto/listar_produto_user') ?>"><button class="btn_top_tab" style="float:left;"> <i
                                class="fas fa-arrow-left fa-fw"></i></button></a>
                    <?php else: ?>
                    <a href="<?php echo base_url('produto/listar_produto') ?>"><button class="btn_top_tab" style="float:left;"> <i
                                class="fas fa-arrow-left fa-fw"></i></button></a>
                    <?php endif?>  
                    
                    <div class="botoes_top_tab" style="float:right;">
                        <a href="<?php echo base_url('produto') ?>"><button  class="btn_top_tab">Cadastrar Novo <i
                                    class="fas fa-plus fa-fw"></i></button></a>
                        <a href="<?php echo base_url('produto/pesquisarProduto') ?>"><button  class="btn_top_tab">Pesquisar Produto <i
                                    class="fas fa-search fa-fw"></i></button></a>
                    </div>
                </div>
            </div>
            <?php
//                foreach ($consulta->getResult() as $categoria) {
//                       echo $categoria->descricao; echo $categoria->id_categoria;
//                       
//                    
//                }
            ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md mb-3">

<!--                            <tr class="header_table"></tr>-->


                        <?php foreach ($consulta->getResult() as $categoria) : ?>
                            <?php foreach ($consulta->getResult() as $produto) : ?>
                                <table class='table table-hover'>
                                    <thead class="thead-dark"> 
                                    <tbody><tr><th scope="col">ID Produto</th> <td> <?php echo $categoria->id_produto ?> </td></tr>
                                        <tr><th scope='col'>Preço</th> <td><?php echo $categoria->preco ?> </td></tr>
                                        <tr><th scope='col'>Nome</th> <td><?php echo $categoria->nome ?> </td></tr>

                                        <tr><th scope='col'>ID Categoria</th> <td><?php echo $categoria->id_categoria ?> </td></tr>
                                        <tr><th scope='col'>Descrição da Categoria</th> <td><?php echo $categoria->descricao ?> </td></tr>
                                        <tr><th scope='col'>Imagem </th> <td> <?php echo "<img src='/Sistema_TCC/public/assets/imagens/uploads/$produto->imagem' width='350px' height='250px' alt='Foto de Exibição'" ?></td></tr>
                                        <tr><td colspan="2">


                                                                        <!--                            <tr>Id</tr>
                                                                                                    <tr>Preço</tr>
                                                                                                    <tr>Nome </tr>
                                                                                                    <tr>  Descrição </tr>
                                                                                                    <tr> Id Categoria </tr>
                                                                                                    <tr>  Descrição</tr>
                                                                                                    <tr>  Imagem </tr>
                                                                                                    <tr>   Ações </tr>
                                                                                                    </td>-->


                                                <a href="<?php echo base_url('../Sistema_TCC/public/index.php/produto/editar/' . $produto->id_produto) ?>" 
                                                   title="Editar"><button class="botao_tabela_editar"> <i class="fas fa-edit edit_icon"></i></button></a>

                                                <a href="<?php echo base_url('../Sistema_TCC/public/index.php/produto/excluir/' . $produto->id_produto) ?>" 
                                                   title="Excluir" onclick="return confirm('Tem certeza que deseja excluir esse registro?')" data-toggle="" data-target="" > <button class="botao_tabela_deletar"><i class="fas fa-trash-alt trash_icon"></i></button></a>

                                                <a href="<?php echo base_url('../Sistema_TCC/public/index.php/produto/mostra_categoria/' . $produto->id_produto) ?>" 
                                                   title="Visualizar" data-toggle="" data-target="" > <button class="botao_tabela_editar"><i class="fas fa-plus edit_icon"></i></button></a>


                                            </td></tr> 
                                        </thead>
                                    </tbody>
                                </table>

                            <?php endforeach; ?>
                        <?php endforeach; ?>


                        <style>
                            #color_p a, #color_p{
                                color:orange;
                                text-decoration: none;
                                font-weight: bold;

                            }
                        </style>

                    </div>
                </div>
            </div>
        </div>






        <!-- </div> -->


    </section>
</main>


