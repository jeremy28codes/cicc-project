<?php
    $page_title = isset($page_info['page_title']) && $page_info['page_title'] ? $page_info['page_title'] : '';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $page_title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Icon -->
    <link href="<?php echo base_url() ?>assets/img/cicc-logo.png" rel="icon">

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
    <link href="<?php echo base_url() ?>assets/css/style.min.css" rel="stylesheet">

    <!-- Cusomized CSS Files -->
    <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">

  </head>
  <body>
      <main>
        <div class="container">
          <section class="section register  d-flex flex-column align-items-center justify-content-center py-4">
            <div class="row justify-content-center">
              <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center pb-2">
                  <a href="javascript:void(0);" class="logo d-flex align-items-center w-auto" >
                    <img src="<?php echo base_url() ?>assets/img/cicc-logo.png" alt="" style="max-height: 100px;">
                  </a>
                </div>
  
                <div class="d-flex justify-content-center">
                  <h1 class="card-title text-center pb-2 text-info"><strong>COMPLAINT FORM</strong></h1>
                </div>
                <form id="form" method="POST" action="<?php echo base_url() ?>OnlineComplaint/userAgree" class="form needs-validation" novalidate>

                  <!-- Victim's Data -->
                  <div class="card mb-3">
                    <div class="border-bottom title-part-padding bg-secondary">
                      <div class="d-md-flex align-items-center">
                        <div class="mr-sm-2">
                          <h3 class="card-title p-0 m-0 text-light"><strong>CICC COMPLAINT FORM</strong></h3>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12 pb-3">
                          <p>Prior to filing a complaint with the CICC, please read the following terms and conditions. Should you have additional questions prior to filing your complaint, you may view the FAQs section for more information on inquiries, such as:</p>
                          <ul>
                            <li>What details need to be included in a complaint?</li>
                            <li>What happens after a complaint is filed?</li>
                            <li>How are complaints resolved?</li>
                            <li>Should evidence related to a complaint be retained?</li>
                          </ul>
                          <p>The information provided on this form should be as accurate as possible. Providing false information could lead to a fine, imprisonment, or both, under Article 183-184 of the Revised Penal Code (as amended by R.A 11594).</p>
                          <p>Complaints filed via this website are processed and may be referred to law enforcement agencies for a possible investigation. An investigation of any complaint filed on this website is initiated at the discretion of the law enforcement agencies receiving the complaint information.</p>
                          <p>The complaint information submitted to this site is encrypted via secure socket layer (SSL) encryption. Please see the Privacy Policy for further information.</p>
                        </div>
                      </div> 
                    </div>
                    <div class="border-bottom title-part-padding bg-secondary">
                      <div class="d-md-flex align-items-center">
                        <div class="mr-sm-2">
                          <h3 class="card-title p-0 m-0 text-light"><strong>PRIVACY ACT STATEMENT</strong></h3>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <p>The collection of information on this form is authorized by one or more of the following statutes: RA 10175 authorizing CICC to collect and maintain identification, criminal information, crime, and other records.</p>
                          <p>The collection of this information is relevant and necessary to document and investigate complaints of Internet-related crime. Submission of the information requested is voluntary; however, your failure to supply requested information may impede or preclude the investigation of your complaint by law enforcement agencies.</p>
                          <p>The information collected is maintained in one or more of the following CICC Privacy Act Systems of Records. Descriptions of these systems may also be found at CICC. The information collected may be disclosed in accordance with the routine uses referenced in those notices or as otherwise permitted by law.</p>
                          <p><u>In accordance with those routine uses, the CICC may disclose information from my complaint to appropriate federal, state, local, tribal or international law enforcement and regulatory agencies.</u></p>
                          <p>We thank you for your cooperation.</p>
                        </div>
                      </div> 
                    </div>
                  </div>
                  
                  <div class="col-md-12 text-center">
                    <button id="submit" name="submit" class="btn btn-info w-50" type="submit">I AGREE</button>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>
      </main>

      <script type="text/javascript">
          const base_url = "<?php echo base_url(); ?>";
      </script>

      <!-- Vendor JS Files -->
      <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url() ?>assets/vendor/tinymce/tinymce.min.js"></script>
      <script src="<?php echo base_url() ?>assets/vendor/php-email-form/validate.js"></script>
      <script src="<?php echo base_url() ?>assets/vendor/sweetalert/sweetalert2.all.min.js"></script>
      <script src="<?php echo base_url() ?>assets/vendor/sweetalert/sweet-alert.init.js"></script>
      <script src="<?php echo base_url() ?>assets/vendor/toastr/toastr.min.js"></script>
      <script src="<?php echo base_url() ?>assets/vendor/toastr/toastr-init.js"></script>
      <!-- Template Main JS File -->
      <script type="text/javascript">

          const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
              },
              buttonsStyling: true
          });
      </script>

      <!-- Page JS Files -->
      <script src="<?php echo base_url() ?>assets/js/pages/online_complaint/index.js"></script>
  </body>
</html>