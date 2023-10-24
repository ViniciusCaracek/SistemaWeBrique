<!-- FOI PARA PASTA VIEW/COMMON-->
<div class="hr_nav"></div>
<!--Fecha Container-->
<div class="container">
    <div class="row">
        <div class="col mb-3">
            <h6 class="cabecalho-cadastro"> Categorias </h6>
        </div>
    </div>
    <!--    <div class="container-fluid">-->
    <!--        <div class="row categ_all">-->
    <div class="row">
        <div class="col-md mb-5">
            <form action="" method="post" style="float:right;">
                <div class="row_buscar">
                    <div class="dashboard_buscar">
                        <!-- <div class="col-lg-12 main_buscar"> -->
                        <div class="input-group" id="input-group-search-dashboard">
                            <input class="form-control" type="search" id="search" name="pesquisar" placeholder="Pesquisar" aria-label="Search" style="border-right: none;">
                            <div class="input-group-append">
                                <button class="input-group-text" type="submit" name="submit"><i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>

                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-3">
           
                <div class=" mb-5">
                    <div class="categ_1">
                        <a href="<?php echo base_url('./Sistema_TCC/public/index.php/categoria/')?>"> Todos os itens </a>
                    </div>
                </div>


            <!--        </div>-->
        
        
            <?php foreach ($categorias as $categoria) : ?>
                <div class=" mb-5">
                    <div class="categ_1">
                        <a href="<?php echo base_url('./Sistema_TCC/public/index.php/categoria/mostrar/' . $categoria->id_categoria) ?>"><?php echo $categoria->descricao ?></a>
                    </div>
                </div>
            <?php endforeach; ?>


            <!--        </div>-->
        </div>

        <!--    </div>-->

       
        <?php foreach ($produtos as $produto) : ?>
            <div class="col-lg-3 mb-3 card-edit-1">
                <div class="card">
                    <?php echo "<img src='/Sistema_TCC/public/assets/imagens/uploads/$produto->imagem' width='450px' height='250px' class='card-img-top' alt='...'>" ?>
                    <div class="card-body">
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

    <?php echo $pager->links('paginacao', 'view_paginacao'); ?>

</div>

<!-- FOI PARA PASTA VIEW/COMMON-->