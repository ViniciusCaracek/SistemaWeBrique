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
                        <i class="fas fa-id-badge"></i> &nbsp; Seus Dados de Usuário
                    </h3>
                    <p class="text-justify">
                        Aqui você pode atualizar seu cadastro através dos botões no final da tabela.
                    </p>
                </div>
            </div>
        </div>

        <!-- Content -->
        <!-- <div class="full-box tile-container"> -->
        <div class="container-fluid">

            <a href="<?php echo base_url('DashBoardHome/DashboardUser') ?>"> <button class="btn_top_tab" style="float:left;"> <i class="fas fa-arrow-left fa-fw"></i></button></a>
            <div class="botoes_top_tab">
                <a href="<?php echo base_url('../Sistema_TCC/public/index.php/cadastro') ?>"><button class="btn_top_tab">Cadastrar Novo <i class="fas fa-plus fa-fw"></i></button></a>
            </div>

            <div class="tabela_container">
                <div class="table-responsive">
                    <?php
                    $cont = 0;
                    ?>

                    <?php foreach ($consulta->getResult() as $usuario) : ?>
                        <?php $cont++ ?>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tbody>
                                <tr><th scope="col"> ID </th> <td><?php echo $usuario->id_usuario ?></td></tr>
                                <tr><th scope="col"> Email </th> <td><?php echo $usuario->email ?></td></tr>
                                <tr><th scope="col"> Senha </th> <td><?php echo $usuario->senha ?></td></tr>
                                <tr><th scope="col"> Tipo  <td><?php echo $usuario->tipo ?></td></tr>
                                <tr><td colspan="2"><hr></td></tr>
                                <tr><th scope="col"> Nome </th> <td><?php echo $usuario->nome ?></td></tr>
                                <tr><th scope="col"> Nome Profissional </th> <td><?php echo $usuario->nome_profissional ?></td></tr>
                                <tr><th scope="col"> Descrição </th> <td><?php echo $usuario->descricao ?></td></tr>
                                <tr><th scope="col"> Telefone </th> <td><?php echo $usuario->telefone ?></td></tr>
                                <tr><th scope="col"> Data de nascimento </th> <td> <?php echo date("d/m/Y", strtotime($usuario->data_nascimento)) ?></td></tr>

                                <tr><td colspan="2">



                                        <a href="<?php echo base_url('../Sistema_TCC/public/index.php/cadastro/editar/' . $usuario->id_usuario) ?>" title="Editar"><button class="botao_tabela_editar"> <i class="fas fa-edit edit_icon"></i></button></a>
                                        <a href="#" title="Excluir" data-toggle="" data-target="" onclick="return confirm('Deseja realmente excluir / inativar sua conta? Contate o administrador do sistema.')" > <button class="botao_tabela_deletar"><i class="fas fa-trash-alt trash_icon"></i></button></a>




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

                                </td> </tr>

                            </thead>
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





                </div>
            </div>
        </div>



        <!-- </div> -->


    </section>
</main>




