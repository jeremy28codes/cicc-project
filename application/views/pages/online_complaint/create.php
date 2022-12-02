<?php
    $page_title = isset($page_info['page_title']) && $page_info['page_title'] ? $page_info['page_title'] : '';

    $s_ctr = 0;
    $ft_ctr = 0;
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

    <!-- Page CSS Files -->
    <link href="<?php echo base_url() ?>assets/css/select2/select2.min.css" rel="stylesheet">

    <style>
      .hide {
        display: none;
      }
    </style>

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
                  <h1 class="card-title text-center pb-2 text-info">COMPLAINT FORM</h1>
                </div>
                <form id="form" enctype="multipart/form-data" class="form needs-validation" novalidate>
                  <!-- Victim's Data -->
                  <div class="card mb-3">
                    <div class="border-bottom title-part-padding mb-3 bg-secondary">
                      <div class="d-md-flex align-items-center">
                        <div class="mr-sm-2">
                          <h3 class="card-title p-0 m-0 text-light">VICTIM'S DATA</h3>
                        </div>
                        <div class="mt-3 mt-md-0 ms-auto">
                          <h4 class="card-title p-0 m-0 text-light"><i>NOTE: Fields with "<code>*</code>" are required!</i></h4>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4 pb-3">
                          <label for="first_name" class="form-label">First Name <code>*</code></label>
                          <input type="text" id="first_name" name="first_name" class="form-control form-control-sm" placeholder="Enter first name here" required>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="middle_name" class="form-label">Middle Name</label>
                          <input type="text" id="middle_name" name="middle_name" class="form-control form-control-sm" placeholder="Enter middle name here">
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="last_name" class="form-label">Surname <code>*</code></label>
                          <input type="text" id="last_name" name="last_name" class="form-control form-control-sm" placeholder="Enter surname here" required>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="rgv_age_bracket_id" class="form-label">Age Bracket <code>*</code></label>
                          <select id="rgv_age_bracket_id" name="rgv_age_bracket_id" class="form-select form-select-sm" required>
                            <option value="" disabled selected>Please select one ...</option>
                            <?php foreach($age_brackets as $key => $value): ?>
                              <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="rgv_sex_id" class="form-label">Sex <code>*</code></label>
                          <select id="rgv_sex_id" name="rgv_sex_id" class="form-select form-select-sm" required>
                            <option value="" disabled selected>Please select one ...</option>
                            <?php foreach($sexes as $key => $value): ?>
                              <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="rgv_marital_status_id" class="form-label">Marital Status <code>*</code></label>
                          <select id="rgv_marital_status_id" name="rgv_marital_status_id" class="form-select form-select-sm" required>
                            <option value="" disabled selected>Please select one ...</option>
                            <?php foreach($marital_statuses as $key => $value): ?>
                              <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-6 pb-3">
                          <label for="mobile_number" class="form-label">Mobile Number <code>(numbers only) *</code></label>
                          <input type="number" id="mobile_number" name="mobile_number" class="form-control form-control-sm" min="0" placeholder="09XXXXXXXXX" required>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-6 pb-3">
                          <label for="email" class="form-label">Email Address <code>(janedoe@email.com) *</code></label>
                          <input type="email" id="email" name="email" class="form-control form-control-sm" placeholder="Enter email address here" required>
                          <div class="invalid-feedback">This field is required and please provide a valid email!</div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 pb-3">
                          <label for="is_in_behalf_of_business" class="form-label">Are you reporting on behalf of a business?</label>
                          <select id="is_in_behalf_of_business" name="is_in_behalf_of_business" class="form-select form-select-sm">
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                          </select>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-8 pb-3">
                          <div class="d-md-flex align-items-center">
                            <div class="mr-sm-2">
                              <label for="business_name" class="form-label">Business Name <code id="req_business_name" hidden>*</code></label>
                            </div>
                            <div class="mt-3 mt-md-0 ms-auto">
                              <div class="form-check">
                                <small> 
                                  <input type="checkbox" id="is_impacting_business_operations" name="is_impacting_business_operations" class="form-check-input">
                                </small>
                                <label class="form-label" for="is_impacting_business_operations">Check this if the incident is currently impacting business</label>
                              </div>
                            </div>
                          </div>
                          <input type="text" id="business_name" name="business_name" class="form-control form-control-sm" placeholder="Enter business name here">
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 pb-3">
                          <label for="country" class="form-label">Country <code>*</code></label>
                          <select id="country" name="country" class="form-select form-select-sm" required>
                          </select>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="province" class="form-label">Province <code>*</code></label>
                          <input type="text" id="province" name="province" class="form-control form-control-sm" placeholder="Enter province here" required> 
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="city" class="form-label">City <code>*</code></label>
                          <input type="text" id="city" name="city" class="form-control form-control-sm" placeholder="Enter city here" required>
                          </select>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-8 pb-3">
                          <label for="address" class="form-label">Address <code>*</code></label>
                          <input type="text" id="address" name="address" class="form-control form-control-sm" placeholder="Enter address here" required>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="zip_code" class="form-label">Zip Code </label>
                          <input type="text" id="zip_code" name="zip_code" class="form-control form-control-sm" placeholder="Enter zip code here">
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-6 pb-3">
                          <label for="business_it_poc" class="form-label">Business IT POC (if applicable)</label>
                          <input type="text" id="business_it_poc" name="business_it_poc" class="form-control form-control-sm" placeholder="Name, Email, Phone, etc..">
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-6 pb-3">
                          <label for="other_busines_poc" class="form-label">Other Business POC (if applicable)</label>
                          <input type="text" id="other_busines_poc" name="other_busines_poc" class="form-control form-control-sm" placeholder="Name, Email, Phone, etc..">
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Witness's Data -->
                  <div class="card mb-3">
                    <div class="border-bottom title-part-padding mb-3 bg-primary">
                      <div class="d-md-flex align-items-center">
                        <div class="mr-sm-2">
                          <h3 class="card-title p-0 m-0 text-light">WITNESS'S DATA</h3>
                        </div>
                        <div class="mt-3 mt-md-0 ms-auto">
                          <h4 class="card-title p-0 m-0 text-light"><i>NOTE: This section is optional.</i></h4>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4 pb-3">
                          <label for="w_first_name" class="form-label">First Name </label>
                          <input type="text" id="w_first_name" name="w_first_name" class="form-control form-control-sm" placeholder="Enter first name here">
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="w_middle_name" class="form-label">Middle Name</label>
                          <input type="text" id="w_middle_name" name="w_middle_name" class="form-control form-control-sm" placeholder="Enter middle name here">
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="w_last_name" class="form-label">Surname </label>
                          <input type="text" id="w_last_name" name="w_last_name" class="form-control form-control-sm" placeholder="Enter surname here">
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="w_rgv_age_bracket_id" class="form-label">Age Bracket </label>
                          <select id="w_rgv_age_bracket_id" name="w_rgv_age_bracket_id" class="form-select form-select-sm">
                            <option value="" disabled selected>Please select one ...</option>
                            <?php foreach($age_brackets as $key => $value): ?>
                              <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="w_rgv_sex_id" class="form-label">Sex </label>
                          <select id="w_rgv_sex_id" name="w_rgv_sex_id" class="form-select form-select-sm">
                            <option value="" disabled selected>Please select one ...</option>
                            <?php foreach($sexes as $key => $value): ?>
                              <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="w_rgv_marital_status_id" class="form-label">Marital Status </label>
                          <select id="w_rgv_marital_status_id" name="w_rgv_marital_status_id" class="form-select form-select-sm">
                            <option value="" disabled selected>Please select one ...</option>
                            <?php foreach($marital_statuses as $key => $value): ?>
                              <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-6 pb-3">
                          <label for="w_mobile_number" class="form-label">Mobile Number <code>(numbers only) *</code></label>
                          <input type="number" id="w_mobile_number" name="w_mobile_number" class="form-control form-control-sm" min="0" placeholder="09XXXXXXXXX">
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-6 pb-3">
                          <label for="w_email" class="form-label">Email Address <code>(janedoe@email.com) *</code></label>
                          <input type="email" id="w_email" name="w_email" class="form-control form-control-sm" placeholder="Enter email address here">
                          <div class="invalid-feedback">This field is required and please provide a valid email!</div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 pb-3">
                          <label for="w_country" class="form-label">Country </label>
                          <select id="w_country" name="w_country" class="form-select form-select-sm">
                          </select>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="w_province" class="form-label">Province </label>
                          <input type="text" id="w_province" name="w_province" class="form-control form-control-sm" placeholder="Enter province here">
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="w_city" class="form-label">City </label>
                          <input type="text" id="w_city" name="w_city" class="form-control form-control-sm" placeholder="Enter city here">
                          </select>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-8 pb-3">
                          <label for="w_address" class="form-label">Address </label>
                          <input type="text" id="w_address" name="w_address" class="form-control form-control-sm" placeholder="Enter address here">
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                        <div class="col-md-4 pb-3">
                          <label for="w_zip_code" class="form-label">Zip Code </label>
                          <input type="text" id="w_zip_code" name="w_zip_code" class="form-control form-control-sm" placeholder="Enter zip code here">
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Suspect's Data -->
                  <div class="card mb-3">
                    <div class="border-bottom title-part-padding bg-danger">
                      <div class="d-md-flex align-items-center">
                        <div class="mr-sm-2">
                          <h3 class="card-title p-0 m-0 text-light">SUSPECT'S DATA</h3>
                        </div>
                        <div class="mt-3 mt-md-0 ms-auto">
                          <h4 class="card-title p-0 m-0 text-light"><i>NOTE: This section is optional.</i></h4>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <input type="hidden" id="s_ctr" name="s_ctr" value="<?php echo $s_ctr ?>" />
                          <table id="s_table" style="padding: 5px; width:100%; margin-bottom: 5px;">
                              <tbody>
                              </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="d-md-flex align-items-center">
                            <div class="mt-3 mt-md-0 ms-auto">
                              <a href="javascript:void(0);" role="button" name="s_add" id="s_add" class="btn btn-info rounded-pill px-4 waves-effect waves-light">Add New <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle feather-sm ms-2 fill-white"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Victim's Financial Transactions -->
                  <div class="card mb-3">
                    <div class="border-bottom title-part-padding bg-info">
                      <div class="d-md-flex align-items-center">
                        <div class="mr-sm-2">
                          <h3 class="card-title p-0 m-0 text-light">VICTIM'S FINANCIAL TRANSACTION/S</h3>
                        </div>
                        <div class="mt-3 mt-md-0 ms-auto">
                          <h4 class="card-title p-0 m-0 text-light"><i>NOTE: This section is optional.</i></h4>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <input type="hidden" id="ft_ctr" name="ft_ctr" value="<?php echo $ft_ctr ?>" />
                          <table id="ft_table" style="padding: 5px; width:100%; margin-bottom: 5px;">
                              <tbody>
                              </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="d-md-flex align-items-center">
                            <div class="mt-3 mt-md-0 ms-auto">
                              <a href="javascript:void(0);" role="button" name="ft_add" id="ft_add" class="btn btn-info rounded-pill px-4 waves-effect waves-light">Add New <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle feather-sm ms-2 fill-white"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Victim's Statement of Facts -->
                  <div class="card mb-3">
                    <div class="border-bottom title-part-padding bg-dark">
                      <div class="d-md-flex align-items-center">
                        <div class="mr-sm-2">
                          <h3 class="card-title p-0 m-0 text-light">STATEMENT OF FACTS</h3>
                        </div>
                        <div class="mt-3 mt-md-0 ms-auto">
                          <h4 class="card-title p-0 m-0 text-light"><i>NOTE: This section is required.</i></h4>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <p>Statement of Facts should answer the following questions:</p>
                          <ul>
                              <li>WHO</li>
                              <li>WHAT</li>
                              <li>WHEN</li>
                              <li>WHERE</li>
                              <li>WHY</li>
                          </ul>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <textarea id="description_of_incident" name="description_of_incident" class="form-control form-control-sm" rows="20" required></textarea>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Victim's Digital Evidences -->
                  <div class="card mb-3">
                    <div class="border-bottom title-part-padding bg-primary">
                      <div class="d-md-flex align-items-center">
                        <div class="mr-sm-2">
                          <h3 class="card-title p-0 m-0 text-light">DIGITAL EVIDENCE/S</h3>
                        </div>
                        <div class="mt-3 mt-md-0 ms-auto">
                          <h4 class="card-title p-0 m-0 text-light"><i>NOTE: This section is required.</i></h4>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row pb-2">
                        <div class="col-md-12">
                          <label class="form-label" for="attachments">Attach digital evidence (Image file Only| "jpg", "jpeg", "png")</label>
                          <input type="file" id="attachments" name="attachments[]" class="form-control form-control-sm" title="Accepted File Types ('jpg', 'jpeg', 'png')" accept=".jpg, .jpeg, .png" multiple />
                        </div>
                      </div>
                      <hr/>
                      <div class="row pb-2">
                        <div class="col-md-12">
                          <label class="form-label" for="gov_id">Upload any recognized Government Issued ID(Image file Only| "jpg", "jpeg", "png")</label>
                          <input type="file" id="gov_id" name="gov_id" class="form-control form-control-sm" title="Accepted File Types ('jpg', 'jpeg', 'png')" accept=".jpg, .jpeg, .png" required/>
                          <div class="invalid-feedback">This field is required!</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Victim's Digital Signature -->
                  <div class="card mb-3">
                    <div class="border-bottom title-part-padding bg-dark">
                      <div class="d-md-flex align-items-center">
                        <div class="mr-sm-2">
                          <h3 class="card-title p-0 m-0 text-light">DIGITAL SIGNATURE</h3>
                        </div>
                        <div class="mt-3 mt-md-0 ms-auto">
                          <h4 class="card-title p-0 m-0 text-light"><i>NOTE: This section is required.</i></h4>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row pb-2">
                        <div class="col-md-12">
                          <p>Read the following statement below, and confirm your agreement by typing your full name below in the box provided:</p>
                        </div>
                      </div>
                      <div class="row text-center">
                        <div class="col-md-12">
                          <label class="form-label" for="digital_signature">By digitally signing this document, I affirm that the information I provided is true and accurate to the best of my knowledge. I understand that providing false information could make me subject to fine, imprisonment, or both.</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12" style="display: flex; align-items: center; justify-content: center;">
                              <div class="input-group" style="width:50%;">
                                <input type="text" id="digital_signature" name="digital_signature" class="form-control form-control-sm" title="Digital Signature" required />
                                <div class="invalid-feedback">This field is required!</div>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 text-center">
                    <button id="btnSubmit" class="btn btn-info w-50" type="submit">
                      <i class="loading-icon fa fa-spinner fa-spin hide"></i> 
                      <span class="btn-txt">SUBMIT</span>
                    </button>
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
      <script src="<?php echo base_url() ?>assets/vendor/select2/select2.full.min.js"></script>
      <script src="<?php echo base_url() ?>assets/vendor/select2/select2.min.js"></script>
      <script src="<?php echo base_url() ?>assets/vendor/select2/select2.init.js"></script>
      <script src="<?php echo base_url() ?>assets/js/pages/online_complaint/create.js"></script>
  </body>
</html>