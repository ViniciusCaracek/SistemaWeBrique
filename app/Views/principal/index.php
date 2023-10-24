    

<!-- FOI PARA PASTA VIEW/COMMON-->

<div class="container-fluid">
    <div class="row">
        <div class="col-md banner-fundo">
            <div class="img-banner">
                <img src=" <?php echo base_url('./Sistema_TCC/public/assets/imagens/banner/map_banner_v2.png') ?>" class="img-fluid" alt="Imagem responsiva">

            </div>
        </div>
    </div>
</div>
<!-- <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="card bg-dark text-dark card-banner" style="border:none;">
           
            <div class="card-img-overlay">
                <h5 class="card-title">Procurar Artesão</h5>
                <p class="card-text">Encontre Aqui seu Artesão ou Produto Predileto</p>
            </div>
        </div>
    </div>

</div> -->
<!-- ////////////////////     PROCURAR       /////////////////////////// -->
<div class="container">

    <div class="row">
        <div class="col-xl m-auto">
            <div class="div-procurar">
                <div class="col-lg-10 main_procurar">
                    <!-- Formulário de Procura -->
                    <form action="<?php echo base_url('./Sistema_TCC/public/index.php/home/perfilArtesaoLista/') ?>" method="post">
                        <div class="input-group" id="input-group-search">
                            <input class="form-control" type="search" id="search" name="pesquisar" placeholder="Pesquisar: Artesão" aria-label="Search" style="border-right: none;">
                            <div class="input-group-append">

                                <button class="input-group-text" type="submit" name="submit"><i class="fas fa-search"></i>
                                </button>
    <!--                            <div class="input-group-text"><i class="fas fa-search"></i> </div>-->

                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

    </div>
    <!-- ////////////////////     FIM PROCURAR       /////////////////////////// -->

    <div class="row">
        <div class="col">
            <h6 class="cabecalho-1"> Destaques </h6>
        </div>
    </div>

    <!-- ////////////////////      ITENS PRODUTO       /////////////////////////// -->
    <div class="row">
        <?php foreach ($produtos as $produto) : ?>
            <div class="col-lg-4 mb-2 card-edit-1">
                <div class="card">
                    <?php echo "<img src='/Sistema_TCC/public/assets/imagens/uploads/$produto->imagem' width='450px' height='250px' class='card-img-top' alt='...'>" ?>
                    <div class="card-body ">
                        <h5 class="card-title"><?php echo $produto->nome ?></h5>


                        <small class="text"><?php echo $produto->descricao ?></small>
                        <div class="text-danger pt-2 pb-2">
                            <p class="card-text">R$ <?php echo $produto->preco ?></p>
                        </div>

                        <div class="text-danger pt-2 pb-1">
                            <a href="<?php echo base_url('./Sistema_TCC/public/index.php/categoria/detalhes/' . $produto->id_produto) ?>"> <button type="button" class="btn btn-outline-danger"><i class="fas fa-plus"></i> Informações</button></a>

                        </div>
                    </div>
                </div>
            </div> 
        <?php endforeach; ?>

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
       
    </div>

</div>


<!-- ////////////////////      FIM ITENS PRODUTO       /////////////////////////// -->
<!-- FOOTER FOI PARA PASTA VIEW/COMMON-->

