    
        <footer class="footer text-center">
            All Rights Reserved by Nice admin. Designed and Developed by
            <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
    </div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/toastr/toastr.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/toastr/toastr-init.js"></script>
    <!-- apps -->
    <script src="<?= base_url() ?>dist/js/app.min.js"></script>
    <script src="<?= base_url() ?>dist/js/app.init.js"></script>
    <script src="<?= base_url() ?>dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url() ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>dist/js/custom.js"></script>
    <script>
        const base_url = "<?= base_url(); ?>";

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true
        });

        $('#btn-logout').on('click',function() {
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to logout?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Success!',
                    'Successfully logged out.',
                    'success'
                    ).then(() => {
                        window.location = base_url + "Auth/logout";
                    }); 
                }
            });
        });

        $('[data-toggle="tooltip"]').tooltip(); 
        $(".preloader").fadeOut();
    </script>
    <!--This page JavaScript -->
    <?php if (isset($page_info['scripts_path']) && !empty($page_info['scripts_path'])) : ?>
        <?php foreach ($page_info['scripts_path'] as $value) : ?>
            <script src="<?= base_url() ?><?= $value ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>