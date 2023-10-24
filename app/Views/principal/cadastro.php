<!-- FOI PARA PASTA VIEW/COMMON-->
<div class="hr_nav"></div>
<!--Fecha Container-->
<div class="container">
    <div class="row">
        <div class="col">
            <h6 class="cabecalho-cadastro"> Cadastre-se </h6>
        </div>
    </div>

    <form class="needs-validation" method="post" novalidate>
        <div class="form-group-1">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <input type="hidden" name="id_usuario" value="<?php echo(isset($usuario) ? $usuario->id_usuario : '') ?>">
                    <!-- Setta Padrão para todos usuarios -->
                    <input type="hidden" name="tipo" value="<?php echo(isset($usuario) ? $usuario->tipo : 'padrao') ?>">

                    <label for="validationCustom01" class="form-label-cadastro">E-mail</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email" value="<?php echo(isset($usuario) ? $usuario->email : '') ?>" required>
                    <div class="invalid-feedback">
                        Campo Obrigatório
                    </div>
                </div>
                <!-- Script para confimar a senha -->
                <script>
                    var check = function () {
                        if (document.getElementById('senha').value ==
                                document.getElementById('confirma_senha').value) {
                            document.getElementById('message').style.color = 'green';
                            document.getElementById('message').innerHTML = 'Senhas Corretas';
                        } else {
                            document.getElementById('message').style.color = 'red';
                            document.getElementById('message').innerHTML = 'Senhas Diferentes';
                        }
                        if (document.getElementById('senha').value ==
                                '') {
                            document.getElementById('message').style.color = 'red';
                            document.getElementById('message').innerHTML = '';
                        }
                    }

                </script>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom02" class="form-label-cadastro">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="********" name="senha" onkeyup="check();" value="<?php echo('') ?>" required>
                    <div class="invalid-feedback">
                        Campo Obrigatório
                    </div>
                    <small><span id='message'></span></small>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom02" class="form-label-cadastro">Confirmar Senha</label>
                    <input type="password" class="form-control" id="confirma_senha" placeholder="********" name="senha" onkeyup="check();" value="<?php echo('') ?>" required>
                    <div class="invalid-feedback">
                        Campo Obrigatório
                    </div>
                    <small><span id='message'></span></small>
                </div>




            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom03" class="form-label-cadastro">Nome Completo</label>
                <input type="text" class="form-control" id="validationCustom04" name="nome" value="<?php echo(isset($usuario) ? $usuario->nome : '') ?>" required>
                <div class="invalid-feedback">
                    Campo Obrigatório
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom03" class="form-label-cadastro">Nome Profissional / Fantasia</label>
                <input type="text" class="form-control" id="validationCustom05" name="nome_profissional" value="<?php echo(isset($usuario) ? $usuario->nome_profissional : '') ?>" required>
                <div class="invalid-feedback">
                    Campo Obrigatório
                </div>
            </div>



            <!-- <div class="col-md-3 mb-3">
                <label for="validationCustom04">State</label>
                <select class="custom-select" id="validationCustom04" required>
                    <option selected disabled value=".">Choose...</option>
                    <option>...</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom05">Zip</label>
                <input type="text" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div> -->
        </div>
        <div class="form-row">
            <div class="col-md-8 mb-3">
                <label for="validationCustom03" class="form-label-cadastro">Descrição</label>
                <input type="text" class="form-control" id="validationCustom06" name="descricao" maxlength="400" placeholder="Mínimo 400 Caracteres" value="<?php echo(isset($usuario) ? $usuario->descricao : '') ?>" required>
                <div class="invalid-feedback">
                    Campo Obrigatório
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom03" class="form-label-cadastro">Telefone</label>
                <input type="text" class="form-control" id="validationCustom07" name="telefone" placeholder="(xx)9 0000-0000" value="<?php echo(isset($usuario) ? $usuario->telefone : '') ?>" required>
                <div class="invalid-feedback">
                    Campo Obrigatório
                </div>
            </div>
            <!--            <div class="col-md-7 mb-4">
                            <label class="form-label-cadastro" for="customFile">Imagem</label>
                            <input type="file" class="form-control" id="customFile" name="imagem" /><?php echo(isset($usuario) ? $usuario->imagem : '') ?>
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>-->
            <div class="col-md-7 mb-3">
                <p id="color_p"><a href="<?php echo base_url('login') ?>"> Já possui uma conta? Clique para fazer Login</a></p>
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationCustom03" class="form-label-cadastro">Data de Nascimento</label>
                <input type="date" class="form-control" id="validationCustom08" name="data_nascimento" value="<?php echo(isset($usuario) ? $usuario->data_nascimento : '') ?>" required>
                <div class="invalid-feedback">
                    Campo Obrigatório
                </div>
            </div>


            <!--            <div class="col-md-6 mb-3">
                            <label for="validationCustom03" class="form-label-cadastro">Tipo</label>
                            <input type="text" class="form-control" id="validationCustom05" name="tipo" value="" required>
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>-->





            <style>
                #color_p a:hover, #color_p{
                    opacity: 0.8;
                    color:orange;
                    font-weight: bold;
                    font-size: 14px;

                }
                #color_p a {
                    color:orange;

                    text-decoration: none;
                }
            </style>

            <!--<div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>-->
        </div>
        <b><?php echo $msg ?></b>
        <div class="btn-avanca-cadastro">
            <button class="btn btn-primary" id="btn-cadastro" type="submit" value="<?php echo $acao ?>"><span><i
                        class="fa fa-arrow-right fa-2x"></i></span></button>
        </div>
    </form>
</div>


<!-- FOOTER FOI PARA PASTA VIEW/COMMON-
