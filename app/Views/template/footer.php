<!-- ////////////////////      FOOTER        /////////////////////////// -->
<style>
    #color_p_footer a:hover{
        text-decoration: underline;
    }
    #color_p_footer a {
        color:#fff;  
        text-decoration: none;
    }
</style>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm mt-5 col-footer-1">
                <h6 class="footer-1"> Categorias </h6>
                <p>content</p>
                <p>content</p>
                <p>content</p>
            </div>
            <div class="col-sm mt-5 col-footer-2">
                <h6 class="footer-2"> Sobre </h6>
                <p id="color_p_footer"><a href="<?php echo base_url('./Sistema_TCC/public/index.php/home/sobre') ?>"> Sobre o Site</a></p>
                <p id="color_p_footer"><a href="<?php echo base_url('./Sistema_TCC/public/index.php/home/PerfilArtesaoLista') ?>"> Perfis dos Artesãos</a></p>

                <p>content</p>
            </div>
            <div class="col-sm-3 mt-5  col-footer-3">
                <h6 class="footer-3"> Siga-nos </h6>
                <div class="row">
                    <div class="col-xl-3 footer-social">
                        <div class="footer-social-facebook">
                            <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook fa-2x"></i></a></div>
                        <!-- <a href="#"><img src="imagens/icones/facebook.png" href="#" width="50" height="50" alt=""
                                loading="lazy"></a> -->
                    </div>
                    <div class="col-xl-3 footer-social">
                        <div class="footer-social-instagram">
                            <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-2x"></i></a></div>
                        <!-- <a href="#"><img src="imagens/icones/whats.png" href="#" width="50" height="50" alt=""
                                loading="lazy"></a> -->
                    </div>
                    <div class="col-xl-3 footer-social">
                        <div class="footer-social-gmail">
                            <a href="https://www.gmail.com/" target="_blank"><i class="fab fa-google fa-2x"></i></a></div>
                        <!-- <a href="#"><img src="imagens/icones/email.png" href="#" width="50" height="50" alt=""
                                loading="lazy"></a> -->
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mt-4">
                <p class="footer-4">Copyright 2020 - Alguns direitos Reservados</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">

                <div id="voltarTopo">
                    <a href="#" class="scrollToTop"><i class="fas fa-chevron-circle-up fa-2x"></i></a>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- ////////////////////      FOOTER        /////////////////////////// -->

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<!-- Optional JavaScript -->
<?php //echo base_url('')?>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/jquery/dist/jquery.js') ?>"></script>
<script src="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/popper.js/dist/umd/popper.js') ?>"></script>
<script src="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/dist/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/js/custom.js') ?>"></script>

</body>

</html>
<!-- ////////////////////      FIM HTML        /////////////////////////// -->