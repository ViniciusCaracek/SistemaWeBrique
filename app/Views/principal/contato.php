<!-- FOI PARA PASTA VIEW/COMMON-->
<!--Fecha Container-->
<div class="hr_nav"></div>

<div class="container">

    <div class="row">
        <div class="col">
            <h6 class="cabecalho-1"> Contato </h6>
        </div>
    </div>

    <form class="needs-validation" method="post" novalidate>
        <div class="form-group-1">
            <div class="form-row">
                <div class="col-md-7 mb-3 ">
                    <input type="hidden" name="id_contato" value="<?php echo(isset($contato) ? $contato->id_contato : '') ?>">
                    <label for="validationCustom01" class="form-label-contato">E-mail</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email" value="<?php echo(isset($contato) ? $contato->email : '') ?>" required>
                    <div class="invalid-feedback">
                        Campo Obrigatório
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02" class="form-label-contato">Telefone</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="(xx)9 0000-0000" name="telefone" value="<?php echo(isset($contato) ? $contato->telefone : '') ?>" required>
                    <div class="invalid-feedback">
                        Campo Obrigatório
                    </div>
                </div>

            </div>
        </div>
        <div class="form-row">
            <div class="col-md-11 mb-3">
                <label for="validationCustom02" class="form-label-contato">Assunto</label>
                <input type="text" class="form-control" id="validationCustom02" name="assunto" value="<?php echo(isset($contato) ? $contato->assunto : '') ?>" required>
                <div class="invalid-feedback">
                    Campo Obrigatório
                </div>
            </div>


        </div>
        <div class="form-row">
            <div class="col-md-11 mb-3">

                <label for="exampleFormControlTextarea1" class="form-label-contato">Mensagem</label>
                <textarea class="form-control" id="exampleFormControlTextarea1"  placeholder="Mínimo 400 Caracteres" name="mensagem" rows="5" required><?php echo(isset($contato) ? $contato->mensagem : '') ?></textarea>

                <div class="invalid-feedback">
                    Campo Obrigatório
                </div>

            </div>
        </div>
        
       <?php echo $msg ?>
        
        <div class="btn-avanca-contato">
            <button class="btn btn-primary" id="btn-contato" type="submit" value="<?php $acao ?>"><span><i
                        class="fa fa-arrow-right fa-2x"></i></span></button>
        </div>
        
        
    </form>



</div>
<!-- FOI PARA PASTA VIEW/COMMON-->


