<?php 
    $title = isset($page_info['title']) && $page_info['title'] ? $page_info['title'] : ''; 
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon icon -->
    <link href="<?php echo base_url() ?>assets/img/cicc-logo.png" rel="icon">
    <title><?= $title ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/sweetalert/sweetalert2.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/toastr/toastr.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>dist/css/style.min.css" rel="stylesheet">

    <!-- Cusomized CSS Files -->
    <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">

    <style>
        .select2-container--classic .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            background-color: #137eff !important;
            border-color: #137eff !important;
            color: #fff !important;
        }
    </style>

    <!-- Additional Page CSS Files -->
    <?php if (isset($page_info['styles_path']) && !empty($page_info['styles_path'])) : ?>
        <?php foreach ($page_info['styles_path'] as $value) : ?>
            <link href="<?= base_url() ?><?= $value ?>" rel="stylesheet">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">