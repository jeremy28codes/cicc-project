<?php
    $page_title = isset($page_info['page_title']) && $page_info['page_title'] ? $page_info['page_title'] : '';
    
?>

<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link href="<?php echo base_url() ?>assets/img/cicc-logo.png" rel="icon">
    <title><?php echo $page_title ?></title>
    <!-- Custom CSS -->
    
	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


	<!-- Vendor CSS Files -->
	<link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?= base_url()?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/toastr/toastr.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?= base_url() ?>dist/css/style.min.css" rel="stylesheet">

	<!-- Cusomized CSS Files -->
	<link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?= base_url() ?>assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo mt-3">
                        <span class="db"><img src="<?= base_url() ?>assets/img/cicc-logo.png" alt="logo" width="120" height="120" /></span>
                        <div style="height: 1.5rem;"></div>
						<h5 class="font-medium m-b-20">Sign In</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                			<form id="form" enctype="multipart/form-data" class="form-horizontal m-t-20 needs-validation" novalidate>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input name="username" type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input name="password" type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-5">
                                        <button id="btnSubmit" class="btn btn-block btn-lg btn-info" type="submit"><i class="loading-icon fa fa-spinner fa-spin hide"></i>&nbsp;&nbsp;Log In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<script type="text/javascript">
		const base_url = "<?php echo base_url(); ?>";
	</script>
    <script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Vendor JS Files -->
	<script src="<?php echo base_url() ?>assets/vendor/tinymce/tinymce.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/sweetalert2/sweetalert2.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/toastr/toastr.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/toastr/toastr-init.js"></script>

	<script>
		const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true
        });
		
		$('[data-toggle="tooltip"]').tooltip();
		$(".preloader").fadeOut();
    </script>
	<script src="<?= base_url() ?>assets/js/pages/login.js"></script>
</body>

</html>