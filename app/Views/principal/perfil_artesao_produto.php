<style>
    .titulo_art{
        font-weight:bold;
        text-transform: uppercase;
        font-size: 14px;
    }

    .form_icon_perfil{
        color:orange;
        margin-left:40px;
        opacity: 0.5;
    }
    .btn_user_perfil{
        transition-duration: 0.4s;
        background-color: #eeeeee;
        color:#555;
        border-radius:5px;
        border:none;
        padding:20px;
        font-weight: bold;
        
    }

    .btn_user_perfil:hover{
        transition-duration: 0.4s;
        background-color:#fff;
        border-bottom:2px solid orange;
        

    }


</style>
<!-- FOI PARA PASTA VIEW/COMMON-->
<div class="hr_nav"></div>
<!--Fecha Container-->
<div class="container">
    <div class="row">
        <div class="col mb-3">
            <h6 class="cabecalho-cadastro"> Perfil do Artesão </h6>
        </div>
    </div>
    <!--    <div class="container-fluid">-->
    <!--        <div class="row categ_all">-->
    <div class="row border-bottom  mt-4">

        <div class="col-lg-3 mb-3 border-left">
            <div class="form_icon_perfil"><i class="fas fa-user-circle fa-10x"></i></div>

            <div class="btn_perfil_user">
                <div class="row">
                    <div class="col-sm-10 ml-4 mt-5 mb-3 item_user">
                        <a href="<?php echo base_url('./Sistema_TCC/public/index.php/categoria/perfilArtesao/' . $usuario->id_usuario) ?>"> <button class="btn_user_perfil" style="float:left;"> O Artesão <i class="fas fa-user fa-fw"></i></button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 ml-4 mb-3 item_user">
                        <a href="<?php echo base_url('./Sistema_TCC/public/index.php/categoria/perfilArtesaoProduto/' . $usuario->id_usuario) ?>"> <button class="btn_user_perfil" style="float:left;"> Produtos <i class="fas fa-pallet fa-fw"></i></button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 ml-4 item_user">
                        <a href="<?php echo base_url('./Sistema_TCC/public/index.php/categoria/perfilArtesaoLocalizacao/' . $usuario->id_usuario) ?>"> <button class="btn_user_perfil" style="float:left;"> Localização <i class="fas fa-map-marked-alt fa-fw"></i></button></a>
                    </div>
                </div>
            </div>

            <!--&nbsp;-->


        </div>




        <div class="col-lg-8">

            <h5><p class="text-secondary"> Produtos do Artesão </p> </h5><div class="hr_nav mb-4"></div>



            <div class="row">
                <?php foreach ($produtos as $produto) : ?>
                    <div class="col-lg-4 mb-3 card-edit-1">
                        <div class="card">
                            <?php echo "<img src='/Sistema_TCC/public/assets/imagens/uploads/$produto->imagem' width='450px' height='250px' class='card-img-top' alt='...'>" ?>
                            <div class="card-body ">
                                <h5 class="card-title"><?php echo $produto->nome ?></h5>


                                <small class="text"><?php echo $produto->descricao ?></small>
                                <div class="text-danger pt-2 pb-2">
                                    <p class="card-text">R$ <?php echo $produto->preco ?></p>
                                </div>

                                <div class="text-danger pt-2 pb-2">


                                    <a href="<?php echo base_url('./Sistema_TCC/public/index.php/categoria/detalhes/' . $produto->id_produto) ?>"> <button type="button" class="btn btn-outline-danger"><i class="fas fa-plus"></i> Informações</button></a>


                                </div>
                            </div>
                        </div>
                    </div> 
                <?php endforeach; ?>
            </div>
            <br>







        </div>
    </div> 






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