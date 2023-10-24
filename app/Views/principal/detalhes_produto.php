<!-- FOI PARA PASTA VIEW/COMMON-->
<div class="hr_nav"></div>
<!--Fecha Container-->
<div class="container">
    <div class="row">
        <div class="col mb-3">
            <h6 class="cabecalho-cadastro"> Detalhes do Produto</h6>
        </div>
    </div>
    <!--    <div class="container-fluid">-->
    <!--        <div class="row categ_all">-->
    <div class="row border-bottom">

        <div class="col-lg-4 mb-3 border-left">

            <?php echo "<img src='/Sistema_TCC/public/assets/imagens/uploads/$produto->imagem' width='550px' height='250px' class='card-img-top' alt='...'>" ?>
        </div>
        <div class="col-lg-7 ml-3">
            <div class="mb-4">
                <h4><?php echo $produto->nome ?></h4>
            </div>

            <?php echo $produto->descricao ?>
            <div class="text-danger pt-5 pb-2">
                <b><h4><p class="card-text">R$ <?php echo $produto->preco ?></p></h4></b>
            </div>



        </div> 
        <style>
            #visualizar_perfil{
                text-transform: uppercase;
                text-decoration: none;
                
            }
            #visualizar_perfil a{
                color:orange;
                text-decoration: none;
            }
            #visualizar_perfil a:hover{
                opacity:0.8;
            }

        </style>
        <!-- Botao para ver o perfil do artesao-->
        <div class="col-md-10 m-2">
            <div class="row" style="float:right; font-size: 14px; font-weight: bold; color: brown;">
                <p id="visualizar_perfil"> 
                    <a href="<?php echo base_url('./Sistema_TCC/public/index.php/categoria/perfilArtesao/' . $produto->id_usuario) ?>">Visualizar Perfil <span> <i
                                class="fa fa-user fa-2x"></i></span></a>
                </p> </div>
        </div>


    </div>
    <!-- Botao para retornar-->
    <div class="row">
        <div class="col mt-3">


            <div class="btn-avanca-contato">
                <a href="<?php echo base_url('./Sistema_TCC/public/index.php/categoria/') ?>"><button class="btn btn-primary" id="btn-contato" type="submit" title="Voltar"><span><i
                                class="fa fa-arrow-left fa-2x"></i></span></button></a>
            </div>


        </div>
    </div>
    <!--        <div class="col-sm mb-2 card-edit-1">
                <div class="card">
                    <img src="../assets/imagens/fotos/arte_2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mão na Costura</h5>
                        <p class="card-text">Confecções de bordados, tapetes, toalhas e agasalhos.</p>
                        <a href="#">
                            <p>Mais informações</p>
                        </a>
                    </div>
                </div>
            </div>-->
    <!--        <div class="col-sm mb-2 card-edit-1">
                <div class="card">
                    <img src="../assets/imagens/fotos/arte_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Direto da fazendinha</h5>
                        <p class="card-text">Embutidos e Derivados direto do campo, Salames, Morcelas e Linguiças, além de todos os tipos de
                            queijos.
                        </p>
                        <a href="#">
                            <p>Mais informações</p>
                        </a>
                    </div>
                </div>
            </div>-->




</div>

<!-- FOI PARA PASTA VIEW/COMMON-->