    

<!-- FOI PARA PASTA VIEW/COMMON-->

<!--<script>
    function myMap() {
        var options = {
            center: new google.maps.LatLng(-28.29917, -54.2630),
            zoom: 100,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), options);
    }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBykuY1g5uujQXSCF5dT_z8PXo-04wvVsI&callback=myMap"
type="text/javascript"></script>-->

<!-- CREDENCIAIS MAPS -> AIzaSyBykuY1g5uujQXSCF5dT_z8PXo-04wvVsI -->
<!-- FOI PARA PASTA VIEW/COMMON-->
<!--Fecha Container-->
<div class="hr_nav"></div>
<div class="container">

    <div class="row">
        <div class="col">
            <h6 class="cabecalho-1"> Cadastro de Localização </h6>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">

            <img src="<?php echo base_url('./Sistema_TCC/public/assets/imagens/banner/mapa_referencia_2801.png') ?>" class="img-fluid" alt="Praça do Brique">
            <br><hr>
            <p> Não Encontrou a Coordenada de sua Localização? Acesse o Manual. </p>
            <a href="<?php echo base_url('./Sistema_TCC/public/index.php/localizacao/manualLocalizacao/') ?>" target="_blank"> <button type="button" class="btn btn-outline-danger "><i class="fas fa-book-open"></i> Manual</button></a>


        </div>
        <div class="col-lg-5 mb-2 mt-2">
            <div class="card border-secondary" style="max-width: 24rem;">
                <div class="card-header">Praça do Brique - Santo Ângelo / RS</div>
                <div class="card-body text-secondary">
                    <h5 class="card-title">Referências - Coordenadas</h5>
                    <p class="small"><b>1-></b> -28.299880445145302, -54.25967279810513</p>
                    <p class="small"><b>2-></b> -28.300138527793358, -54.25966192665744</p>
                    <p class="small"><b>3-></b> -28.300482372007593, -54.259641169054866</p>
                    <p class="small"><b>4-></b> -28.300778349074754, -54.25962377144804</p>
                    <p class="small"><b>5-></b> -28.29994248372994, -54.259398262723785</p>
                    <p class="small"><b>6-></b> -28.300122153964747, -54.25936879838479</p>
                    <p class="small"><b>7-></b> -28.300413491328104, -54.259425184229045</p>
                    <p class="small"><b>8-></b> -28.300338224011632, -54.25926163568013</p>
                    <p class="small"><b>9-></b> -28.30060126677658, -54.259262241181005</p>
                    <p class="small"><b>10-></b> -28.300706302182935, -54.25938901803334</p>
                    <p class="small"><b>Para mais localizações, Acesse:</b>
                        <a href="https://www.google.com.br/maps/place/Pra%C3%A7a+Ricardo+Le%C3%B4nidas+Ribas+%22Pra%C3%A7a+Do+Brique%22/@-28.2977855,-54.261623,16z/data=!4m5!3m4!1s0x0:0x41a4e57ee40efbca!8m2!3d-28.3003743!4d-54.2591076" target="_blank" style="text-decoration: none; color:#888 ;"> &nbsp<i class="fas fa-map-marked-alt fa-2x"></i></a>
                    </p>
                </div>
            </div>

        </div>

    </div>
    <div class="form-row">
        <div class="col-md-4 mb-2">
            <h5><p class="text-secondary">Seu Endereço</p> </h5><div class="hr_nav"></div>
        </div>
    </div>

    <form class="needs-validation" method="post" novalidate>
        <div class="form-group-1">
            <div class="form-row">
                <div class="col-md-4 mb-3 ">
                    <input type="hidden" name="id_localizacao" value="<?php echo(isset($localizacao) ? $localizacao->id_localizacao : '') ?>">
                    <label for="validationCustom01" class="form-label-cadastro">CEP</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cep" value="<?php echo(isset($localizacao) ? $localizacao->cep : '') ?>" required>
                    <div class="invalid-feedback">
                        Campo Obrigatório
                    </div>
                </div>
                <div class="col-md-7 mb-3">
                    <label for="validationCustom02" class="form-label-cadastro">Logradouro</label>
                    <input type="text" class="form-control" id="validationCustom02" name="logradouro" value="<?php echo(isset($localizacao) ? $localizacao->logradouro : '') ?>" required>
                    <div class="invalid-feedback">
                        Campo Obrigatório
                    </div>
                </div>

            </div>
        </div>


        <div class="form-row">
            <div class="col-md-8 mb-3">
                <label for="validationCustom02" class="form-label-cadastro">Bairro</label>
                <input type="text" class="form-control" id="validationCustom03" name="bairro" value="<?php echo(isset($localizacao) ? $localizacao->bairro : '') ?>" required>
                <div class="invalid-feedback">
                    Campo Obrigatório
                </div>
            </div>



            <div class="col-md-3 mb-3">
                <label for="validationCustom02" class="form-label-cadastro">Número</label>
                <input type="text" class="form-control" id="validationCustom04" name="numero" value="<?php echo(isset($localizacao) ? $localizacao->numero : '') ?>" required>
                <div class="invalid-feedback">
                    Campo Obrigatório
                </div>
            </div>


        </div>
        <div class="form-row">
            <div class="col-md-4 mt-2 mb-2">
                <h5><p class="text-secondary">Sua Localização </p> </h5><div class="hr_nav"></div>
            </div>
        </div>



        <div class="form-row">
            <div class="col-md-11 mb-3">
                <label for="validationCustom02" class="form-label-cadastro">Latitude</label>
                <input type="text" class="form-control" id="validationCustom05" name="latitude" value="<?php echo(isset($localizacao) ? $localizacao->latitude : '') ?>" required>
                <div class="invalid-feedback">
                    Campo Obrigatório
                </div>
            </div>


        </div>
        <div class="form-row">
            <div class="col-md-11 mb-3">
                <label for="validationCustom02" class="form-label-cadastro">Longitude</label>
                <input type="text" class="form-control" id="validationCustom06" name="longitude" value="<?php echo(isset($localizacao) ? $localizacao->longitude : '') ?>" required>
                <div class="invalid-feedback">
                    Campo Obrigatório
                </div>
            </div>


        </div>

        <?= $msg ?>


        <div class="btn-avanca-cadastro">
            <button class="btn btn-primary" id="btn-cadastro" type="submit" value="<?php $acao ?>"><span><i
                        class="fa fa-arrow-right fa-2x"></i></span></button>
        </div>


    </form>



</div>






<!-- FOOTER FOI PARA PASTA VIEW/COMMON-->

