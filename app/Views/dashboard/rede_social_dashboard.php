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
                        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Cadastrar Rede Social
                    </h3>
                    <p class="text-justify">
                        Formulário para cadastro de rede social.
                </div>
            </div>
        </div>

        <!-- Content -->
        <!-- <div class="full-box tile-container"> -->
        <div class="container-fluid">

            <?php
            if (session()->tipo === 'padrao'): ?>
            <a href = "<?php echo base_url('DashboardHome/DashboardUser') ?>"><button class = "btn_top_tab" style = "float:left;"> <i
            class = "fas fa-arrow-left fa-fw"></i></button></a>
            <?php else: ?>
            <a href = "<?php echo base_url('DashboardHome') ?>"><button class = "btn_top_tab" style = "float:left;"> <i
            class = "fas fa-arrow-left fa-fw"></i></button></a>
            <?php endif;?>
                         
            <div class="botoes_top_tab">
                <a href="<?php echo base_url('RedeSocial') ?>"><button  class="btn_top_tab">Cadastrar Novo <i
                            class="fas fa-plus fa-fw"></i></button></a>

            </div>

            <div class="row" style="padding-top:100px;"> </div>

            <div class="container">


                <form class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                    <div class="form-group-1">
                        <div class="form-row">

                            <div class="col-md-11 mb-3">
                                <input type="hidden" name="id_rede_social" value="<?php echo(isset($rede_social) ? $rede_social->id_rede_social : '') ?>">

                                <label for="validationCustom01" class="form-label-cadastro"> Endereço / Link</label>
                                <input type="url" class="form-control" placeholder="Cole a URL de sua rede social" id="validationCustom01" name="descricao" value="<?php echo(isset($rede_social) ? $rede_social->descricao : '') ?>" required>
                                <div class="invalid-feedback">
                                    Campo Obrigatório
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="form-row">

                        <div class="col-md-11 mb-3">
                            <label for="exampleFormControlSelect1" class="form-label-cadastro" >Tipo</label>
                            <select class="form-control" id="rede_social" name="tipo"  required>


                                <option value="">Selecione a Rede Social</option>

                                <option value="Facebook">Facebook</option>
                                <option value="Instagram">Instagram</option>
                                <option value="Twitter">Twitter</option>
                                <option value="Pinterest">Pinterest</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Outras">Outras</option>
                            </select>

                            <div class="invalid-feedback">Campo Obrigatório</div>
                        </div>
                    </div>


<!--                     <input type="hidden" name="id_usuario" value="">-->


<?php echo $msg ?>

                    <div class="btn-avanca-contato">
                        <button class="btn btn-primary" id="btn-contato" type="submit" value="<?php $acao ?>"><span><i
                                    class="fa fa-arrow-right fa-2x"></i></span></button>
                    </div>


                </form>

            </div>
        </div>

        <div class="preenche">
            <style>
                .preenche{
                    padding-bottom: 20%;
                }
            </style>

        </div>







        <!-- </div> -->


    </section>
</main>



