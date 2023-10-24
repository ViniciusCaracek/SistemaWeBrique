<!-- FOI PARA PASTA VIEW/COMMON-->
<div class="hr_nav"></div>
<!--Fecha Container-->
<div class="container">
    <div class="row">
        <div class="col mb-3">
            <h6 class="cabecalho-cadastro"> Perfis dos Artesãos </h6>
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


        <!--    </div>-->
        <?php
        $cont = 0;
        ?>

        <?php foreach ($usuarios as $usuario) : ?>
            <?php $cont++ ?>
            <div class="col-lg-3 mb-3 card-edit-1">
                <div class="card">
                    <center><div class="form_icon m-3" style="color: lightgray; "><i class="fa fa-user-circle fa-8x"></i></div></center>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $usuario->nome ?></h5>


                        <small class="text"><?php echo $usuario->descricao ?></small>
                        <!--                        <div class="text-danger pt-2 pb-2">
                                                    <p class="card-text">R$ </p>
                                                </div>-->

                        <div class="text-danger pt-3 pb-2">


                            <a href="<?php echo base_url('./Sistema_TCC/public/index.php/categoria/perfilArtesao/' . $usuario->id_usuario) ?>"> <button type="button" class="btn btn-outline-danger"><i class="fas fa-plus"></i> Visualizar</button></a>


                        </div>
                    </div>
                </div>
            </div> 
        <?php endforeach; ?> 
        <!--Contador de itens na lista-->

    </div>
    <?php
    echo '<div class="row">';
    echo '<div class="col ">';
    if ($cont == 0) {
        echo '<p id="color_p">Nenhum Registro encontrado</p>';
    } else
    if ($cont == 1) {
        echo ' <p id="color_p">' . $cont . ' Registro encontrado</p>';
    } else {
        echo ' <p id="color_p">' . $cont . ' Registros encontrados</p>';
    }

    echo '</div></div>';
    ?>
    <style>
        #color_p a, #color_p{
            color:orange;
            text-decoration: none;
            font-weight: bold;
        }
        .cont_perfil{
            float:right;
        }
    </style>

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
    <div class="col mt-4">
        <?php echo $pager->links('paginacao', 'view_paginacao'); ?>
    </div>

</div>

<!-- FOI PARA PASTA VIEW/COMMON-->