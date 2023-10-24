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

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/jquery/dist/jquery.js') ?>"></script>
<script src="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/popper.js/dist/umd/popper.js') ?>"></script>
<script src="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/dist/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('./Sistema_TCC/public/assets/node_modules/bootstrap/js/custom.js') ?>"></script>

</body>

</html>