<?php

//Report Info
$id        =    isset($report[0]->id) && $report[0]->id ? $report[0]->id : 0;
$reference_number        =    isset($report[0]->reference_number) && $report[0]->reference_number ? $report[0]->reference_number : '';
$date_received        =    isset($report[0]->date_received) && $report[0]->date_received ? date_format(new DateTime($report[0]->date_received),'Y-m-d') : '';
$time_received        =    isset($report[0]->time_received) && $report[0]->time_received ? $report[0]->time_received : '';
$rgv_report_type_id        =    isset($report[0]->rgv_report_type_id) && $report[0]->rgv_report_type_id ? $report[0]->rgv_report_type_id : '';
$rgv_report_category_id        =    isset($report[0]->rgv_report_category_id) && $report[0]->rgv_report_category_id ? $report[0]->rgv_report_category_id : '';
$report_modus        =    isset($report[0]->report_modus) && $report[0]->report_modus ? $report[0]->report_modus : '';
$report_group        =    isset($report[0]->report_group) && $report[0]->report_group ? $report[0]->report_group : '';
$description_of_incident        =    isset($report[0]->description_of_incident) && $report[0]->description_of_incident ? $report[0]->description_of_incident : '';
$officer_on_case        =    isset($report[0]->officer_on_case) && $report[0]->officer_on_case ? $report[0]->officer_on_case : '';
$actions_taken        =    isset($report[0]->actions_taken) && $report[0]->actions_taken ? $report[0]->actions_taken : '';
$after_status_report        =    isset($report[0]->after_status_report) && $report[0]->after_status_report ? $report[0]->after_status_report : '';
$remarks        =    isset($report[0]->remarks) && $report[0]->remarks ? $report[0]->remarks : '';

//Victim Info
$victim_id        =    isset($victim[0]->id) && $victim[0]->id ? $victim[0]->id : 0;
$victim_last_name        =    isset($victim[0]->last_name) && $victim[0]->last_name ? strtoupper($victim[0]->last_name) : '';
$victim_first_name       =    isset($victim[0]->first_name) && $victim[0]->first_name ? strtoupper($victim[0]->first_name) : '';
$victim_middle_name        =    isset($victim[0]->middle_name) && $victim[0]->middle_name ? strtoupper($victim[0]->middle_name) : '';
$is_in_behalf_of_business        =    isset($victim[0]->is_in_behalf_of_business) && $victim[0]->is_in_behalf_of_business ? $victim[0]->is_in_behalf_of_business : 0;
$victim_business_name        =    isset($victim[0]->business_name) && $victim[0]->business_name ? $victim[0]->business_name : '';
$is_impacting_business_operations        =    isset($victim[0]->is_impacting_business_operations) && $victim[0]->is_impacting_business_operations ? $victim[0]->is_impacting_business_operations : 0;
$victim_rgv_age_bracket_id        =    isset($victim[0]->rgv_age_bracket_id) && $victim[0]->rgv_age_bracket_id ? $victim[0]->rgv_age_bracket_id : '';
$victim_rgv_marital_status_id        =    isset($victim[0]->rgv_marital_status_id) && $victim[0]->rgv_marital_status_id ? $victim[0]->rgv_marital_status_id : '';
$victim_rgv_sex_id        =    isset($victim[0]->rgv_sex_id) && $victim[0]->rgv_sex_id ? $victim[0]->rgv_sex_id : '';
$victim_email       =    isset($victim[0]->email) && $victim[0]->email ? $victim[0]->email : '';
$victim_mobile_number       =    isset($victim[0]->mobile_number) && $victim[0]->mobile_number ? $victim[0]->mobile_number : '';
$victim_address       =    isset($victim[0]->address1) && $victim[0]->address1 ? $victim[0]->address1 : '';
$victim_country       =    isset($victim[0]->country) && $victim[0]->country ? $victim[0]->country : '';
$victim_province       =    isset($victim[0]->province) && $victim[0]->province ? $victim[0]->province : '';
$victim_city       =    isset($victim[0]->city) && $victim[0]->city ? $victim[0]->city : '';
$victim_zip_code       =    isset($victim[0]->zip_code) && $victim[0]->zip_code ? $victim[0]->zip_code : '';
$victim_business_it_poc       =    isset($victim[0]->business_it_poc) && $victim[0]->business_it_poc ? $victim[0]->business_it_poc : '';
$victim_other_busines_poc      =    isset($victim[0]->other_busines_poc ) && $victim[0]->other_busines_poc  ? $victim[0]->other_busines_poc  : '';
$victim_remarks       =    isset($victim[0]->remarks) && $victim[0]->remarks ? $victim[0]->remarks : '';

//Witness Info
$witness_id        =    isset($witness[0]->id) && $witness[0]->id ? $witness[0]->id : 0;
$witness_last_name        =    isset($witness[0]->last_name) && $witness[0]->last_name ? strtoupper($witness[0]->last_name) : '';
$witness_first_name       =    isset($witness[0]->first_name) && $witness[0]->first_name ? strtoupper($witness[0]->first_name) : '';
$witness_middle_name        =    isset($witness[0]->middle_name) && $witness[0]->middle_name ? strtoupper($witness[0]->middle_name) : '';
$witness_rgv_age_bracket_id        =    isset($witness[0]->rgv_age_bracket_id) && $witness[0]->rgv_age_bracket_id ? $witness[0]->rgv_age_bracket_id : '';
$witness_rgv_marital_status_id        =    isset($witness[0]->rgv_marital_status_id) && $witness[0]->rgv_marital_status_id ? $witness[0]->rgv_marital_status_id : '';
$witness_rgv_sex_id        =    isset($witness[0]->rgv_sex_id) && $witness[0]->rgv_sex_id ? $witness[0]->rgv_sex_id : '';
$witness_email        =    isset($witness[0]->email) && $witness[0]->email ? $witness[0]->email : '';
$witness_mobile_number        =    isset($witness[0]->mobile_number) && $witness[0]->mobile_number ? $witness[0]->mobile_number : '';
$witness_address        =    isset($witness[0]->address1) && $witness[0]->address1 ? $witness[0]->address1 : '';
$witness_country        =    isset($witness[0]->country) && $witness[0]->country ? $witness[0]->country : '';
$witness_province        =    isset($witness[0]->province) && $witness[0]->province ? $witness[0]->province : '';
$witness_city        =    isset($witness[0]->city) && $witness[0]->city ? $witness[0]->city : '';
$witness_zip_code        =    isset($witness[0]->zip_code) && $witness[0]->zip_code ? $witness[0]->zip_code : '';
$witness_remarks        =    isset($witness[0]->remarks) && $witness[0]->remarks ? $witness[0]->remarks : '';

$c = 0;
if(!empty($offenses)){
    $c = count($offenses);
}

$s = 1;
$s_ctr = 0;
if(!empty($suspects)){
    $s_ctr = count($suspects);
}

$f = 1;
$ft_ctr = 0;
if(!empty($financial_transactions)){
    $ft_ctr = count($financial_transactions);
}

?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Complaints</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url()?>Complaint">Complaint</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- DataTable -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="align-items-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h2 class="card-title">Edit</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-9">
                                                </div>
                                                <div class="col-md-3 m-b-5">
                                                    <a href="<?= base_url()?>Complaint" class="btn btn-danger font-weight-medium align-items-center" style="width:100%;">
                                                            <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;
                                                            Back
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="col-lg-12">
                                    <form id="form" class="form needs-validation" novalidate>
                                        <!-- Report's Data -->
                                        <div class="card mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-body">
                                                        <input type="hidden" id="id" name="id" class="form-control form-control-sm" value="<?= $id ?>" readonly> 
                                                        <div class="border-bottom title-part-padding mb-2 bg-secondary">
                                                            <div class="d-md-flex align-items-center">
                                                                <div class="mr-sm-2">
                                                                    <h5 class="card-title p-0 m-0 text-light">Report Type</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-4 pb-2">
                                                                    <label for="reference_number" class="form-label">Reference Number</label>
                                                                </div>
                                                                <div class="col-md-8 pb-2">
                                                                    <input type="text" id="reference_number" name="reference_number" class="form-control form-control-sm" value="<?= $reference_number ?>" readonly> 
                                                                </div>
                                                                <div class="col-md-4 pb-2">
                                                                    <label for="rgv_report_type_id" class="form-label">Report Type <code>*</code></label>
                                                                </div>
                                                                <div class="col-md-8 pb-2">
                                                                    <select id="rgv_report_type_id" name="rgv_report_type_id" class="form-control form-control-sm" required>
                                                                        <option value="" <?= ($rgv_report_type_id=="" ? " selected":"") ?>>Please select one ...</option>
                                                                        <?php foreach($report_types as $key => $value): ?>
                                                                        <option value="<?= $value->id ?>" <?= ($rgv_report_type_id==$value->id ? " selected":"") ?>><?php echo $value->name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 pb-2">
                                                                    <label for="date_received" class="form-label">Date <code>*</code></label>
                                                                </div>
                                                                <div class="col-md-8 pb-2">
                                                                    <input type="date" id="date_received" name="date_received" class="form-control form-control-sm" value="<?= $date_received ?>" required> 
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 pb-2">
                                                                    <label for="time_received" class="form-label">Time</label>
                                                                </div>
                                                                <div class="col-md-8 pb-2">
                                                                    <input type="time" id="time_received" name="time_received" class="form-control form-control-sm" value="<?= $time_received ?>" placeholder="Enter province here" > 
                                                                </div>
                                                                <div class="col-md-4 pb-2">
                                                                    <label for="report_modus" class="form-label">Modus</label>
                                                                </div>
                                                                <div class="col-md-8 pb-2">
                                                                    <input type="text" id="report_modus" name="report_modus" class="form-control form-control-sm" value="<?= $report_modus ?>" placeholder="Enter modus here"> 
                                                                </div>
                                                                <div class="col-md-4 pb-2">
                                                                    <label for="report_group" class="form-label">Group</label>
                                                                </div>
                                                                <div class="col-md-8 pb-2">
                                                                    <input type="text" id="report_group" name="report_group" class="form-control form-control-sm" value="<?= $report_group ?>" placeholder="Enter group here"> 
                                                                </div>
                                                                <div class="col-md-4 pb-2">
                                                                    <label for="remarks" class="form-label">Remarks</label>
                                                                </div>
                                                                <div class="col-md-8 pb-2">
                                                                    <textarea id="remarks" name="remarks" class="form-control form-control-sm" placeholder="Enter remarks here" rows="2"><?= $remarks ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="card-title text-danger">Officer-On-Case</h4>
                                                        <hr/>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <select id="officer_on_case" name="officer_on_case" class="form-control">
                                                                        <option value="" disabled <?= ($officer_on_case=="" ? " selected":"") ?>>Please select one ...</option>
                                                                        <?php foreach($case_officers as $key => $value): ?>
                                                                        <option value="<?= strtoupper($value->first_name. " " . $value->middle_name . " " . $value->last_name) ?>" <?= (strtoupper($officer_on_case)==strtoupper($value->first_name. " " . $value->middle_name . " " . $value->last_name)? " selected":"") ?>><?php echo strtoupper($value->first_name. " " . $value->middle_name . " " . $value->last_name) ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="card-title text-danger">Cybercrime Offenses</h4>
                                                        <hr/>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <?php if(!empty($offenses)): ?>
                                                                    <?php foreach($offenses as $key => $value): ?>
                                                                        <div class="col-md-6 mb-2">
                                                                            <label for="rgv_report_category_<?= $c ?>"><input type="checkbox" class="form-input" id="rgv_report_category_<?= $c ?>" name="rgv_report_category[]" value="<?= $value->id ?>" <?= (in_array($value->name,$report_categories) ? " checked" :"")?> > <?= $value->name ?></label>
                                                                        </div>
                                                                        <?php $c = $c + 1; ?>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                  </div>
                                                  </div>
                                                <div class="col-md-8">
                                                    <div class="form-body">
                                                        <div class="border-bottom title-part-padding mb-2 bg-primary">
                                                            <div class="d-md-flex align-items-center">
                                                                <div class="mr-sm-2">
                                                                    <h5 class="card-title p-0 m-0 text-light">Complaint Info</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4 class="card-title text-danger">Victim's Info</h4>
                                                            <hr/>
                                                            <input type="hidden" id="victim_id" name="victim_id" class="form-control form-control-sm" value="<?= $victim_id ?>" readonly> 
                                                            <div class="row">
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="first_name" class="form-label">First Name <code>*</code></label>
                                                                    <input type="text" id="first_name" name="first_name" class="form-control form-control-sm" value="<?= $victim_first_name?>" placeholder="Enter first name here" required> 
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="middle_name" class="form-label">Middle Name </label>
                                                                    <input type="text" id="middle_name" name="middle_name" class="form-control form-control-sm" value="<?= $victim_middle_name?>" placeholder="Enter middle name here"> 
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="last_name" class="form-label">Last Name <code>*</code></label>
                                                                    <input type="text" id="last_name" name="last_name" class="form-control form-control-sm" value="<?= $victim_last_name?>" placeholder="Enter last name here" required> 
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="rgv_age_bracket_id" class="form-label">Age Bracket</label>
                                                                    <select id="rgv_age_bracket_id" name="rgv_age_bracket_id" class="form-control form-control-sm">
                                                                        <option value="" <?= ($victim_rgv_age_bracket_id=="" ? " selected":"") ?>>Please select one ...</option>
                                                                        <?php foreach($age_brackets as $key => $value): ?>
                                                                        <option value="<?php echo $value->id ?>" <?= ($victim_rgv_age_bracket_id==$value->id ? " selected":"") ?>><?php echo $value->name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="rgv_sex_id" class="form-label">Sex</label>
                                                                    <select id="rgv_sex_id" name="rgv_sex_id" class="form-control form-control-sm">
                                                                        <option value="" <?= ($victim_rgv_sex_id=="" ? " selected":"") ?>>Please select one ...</option>
                                                                        <?php foreach($sexes as $key => $value): ?>
                                                                        <option value="<?php echo $value->id ?>" <?= ($victim_rgv_sex_id==$value->id ? " selected":"") ?>><?php echo $value->name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="rgv_marital_status_id" class="form-label">Marital Status</label>
                                                                    <select id="rgv_marital_status_id" name="rgv_marital_status_id" class="form-control form-control-sm">
                                                                        <option value="" <?= ($victim_rgv_marital_status_id=="" ? " selected":"") ?>>Please select one ...</option>
                                                                        <?php foreach($marital_statuses as $key => $value): ?>
                                                                        <option value="<?php echo $value->id ?>" <?= ($victim_rgv_marital_status_id==$value->id ? " selected":"") ?>><?php echo $value->name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="mobile_number" class="form-label">Mobile Number <code>(numbers only) *</code></label>
                                                                    <input type="number" id="mobile_number" name="mobile_number" class="form-control form-control-sm" value="<?= $victim_mobile_number?>" min="0" placeholder="09XXXXXXXXX" required> 
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="email" class="form-label">Email <code>(janedoe@email.com) *</code></label>
                                                                    <input type="email" id="email" name="email" class="form-control form-control-sm" value="<?= $victim_email?>" placeholder="Enter email here" required> 
                                                                    <div class="invalid-feedback">Please enter a valid email!</div>
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="is_in_behalf_of_business" class="form-label">Are you reporting on behalf of a business?</label>
                                                                    <select id="is_in_behalf_of_business" name="is_in_behalf_of_business" class="form-control form-control-sm">
                                                                        <option value="0" <?= ($is_in_behalf_of_business==0 ? " selected":"")?>>No</option>
                                                                        <option value="1" <?= ($is_in_behalf_of_business==1 ? " selected":"")?>>Yes</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="is_impacting_business_operations" class="form-label">Is the incident is currently impacting business?</label>
                                                                    <select id="is_impacting_business_operations" name="is_impacting_business_operations" class="form-control form-control-sm">
                                                                        <option value="0" <?= ($is_impacting_business_operations==0 ? " selected":"")?>>No</option>
                                                                        <option value="1" <?= ($is_impacting_business_operations==1 ? " selected":"")?>>Yes</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 mb-2">
                                                                    <label for="business_name" class="form-label">Business Name <code id="req_business_name" hidden>*</code></label>
                                                                    <input type="text" id="business_name" name="business_name" class="form-control form-control-sm" value="<?= $victim_business_name?>" placeholder="Enter business name here" > 
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="country" class="form-label">Country</label>
                                                                    <select id="country" name="country" class="form-control form-control-sm">
                                                                        <option value="" <?= ($victim_country=="" ? " selected":"") ?>>Please select one ...</option>
                                                                        <?php foreach($countries as $key => $v_value): ?>
                                                                            <option value="<?php echo $v_value->name ?>" <?= ($victim_country==$v_value->name ? " selected":"") ?>><?php echo $v_value->name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="province" class="form-label">Province</label>
                                                                    <input type="text" id="province" name="province" class="form-control form-control-sm" value="<?= $victim_province?>" placeholder="Enter province here" > 
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="city" class="form-label">City</label>
                                                                    <input type="text" id="city" name="city" class="form-control form-control-sm" value="<?= $victim_city?>" placeholder="Enter city here" > 
                                                                </div>
                                                                <div class="col-md-8 mb-2">
                                                                    <label for="address" class="form-label">Address </label>
                                                                    <textarea id="address" name="address" class="form-control form-control-sm" value="<?= $victim_address?>" placeholder="Enter address here" rows="2"></textarea>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="zip_code" class="form-label">Zip Code</label>
                                                                    <input type="text" id="zip_code" name="zip_code" class="form-control form-control-sm" value="<?= $victim_zip_code?>" placeholder="Enter zip code here" > 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4 class="card-title text-danger">Witness's Info </h4>
                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="witness_first_name" class="form-label">First Name</label>
                                                                    <input type="text" id="witness_first_name" name="witness_first_name" class="form-control form-control-sm" value="<?= $witness_first_name ?>" placeholder="Enter first name here"> 
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="witness_middle_name" class="form-label">Middle Name </label>
                                                                    <input type="text" id="witness_middle_name" name="witness_middle_name" class="form-control form-control-sm" value="<?= $witness_middle_name ?>" placeholder="Enter middle name here"> 
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="witness_last_name" class="form-label">Last Name</label>
                                                                    <input type="text" id="witness_last_name" name="witness_last_name" class="form-control form-control-sm" value="<?= $witness_last_name ?>" placeholder="Enter last name here"> 
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="witness_rgv_age_bracket_id" class="form-label">Age Bracket</label>
                                                                    <select id="witness_rgv_age_bracket_id" name="witness_rgv_age_bracket_id" class="form-control form-control-sm">
                                                                        <option value="" <?= ($witness_rgv_age_bracket_id=="" ? " selected":"") ?>>Please select one ...</option>
                                                                        <?php foreach($age_brackets as $key => $value): ?>
                                                                        <option value="<?php echo $value->id ?>" <?= ($witness_rgv_age_bracket_id==$value->id ? " selected":"") ?>><?php echo $value->name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="witness_rgv_sex_id" class="form-label">Sex</label>
                                                                    <select id="witness_rgv_sex_id" name="witness_rgv_sex_id" class="form-control form-control-sm">
                                                                        <option value="" <?= ($witness_rgv_sex_id=="" ? " selected":"") ?>>Please select one ...</option>
                                                                        <?php foreach($sexes as $key => $value): ?>
                                                                        <option value="<?php echo $value->id ?>" <?= ($witness_rgv_sex_id==$value->id ? " selected":"") ?>><?php echo $value->name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="witness_rgv_marital_status_id" class="form-label">Marital Status</label>
                                                                    <select id="witness_rgv_marital_status_id" name="witness_rgv_marital_status_id" class="form-control form-control-sm">
                                                                        <option value="" <?= ($witness_rgv_marital_status_id=="" ? " selected":"") ?>>Please select one ...</option>
                                                                        <?php foreach($marital_statuses as $key => $value): ?>
                                                                        <option value="<?php echo $value->id ?>" <?= ($witness_rgv_marital_status_id==$value->id ? " selected":"") ?>><?php echo $value->name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="witness_mobile_number" class="form-label">Mobile Number <code>(numbers only)</code></label>
                                                                    <input type="text" id="witness_mobile_number" name="witness_mobile_number" class="form-control form-control-sm" value="<?= $witness_mobile_number?>" min="0" placeholder="09XXXXXXXXX"> 
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="witness_email" class="form-label">Email <code>(janedoe@email.com)</code></label>
                                                                    <input type="email" id="witness_email" name="witness_email" class="form-control form-control-sm" value="<?= $witness_email?>" placeholder="Enter email here"> 
                                                                    <div class="invalid-feedback">Please enter a valid email!</div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="witness_country" class="form-label">Country</label>
                                                                    <select id="witness_country" name="witness_country" class="form-control form-control-sm">
                                                                        <option value="" <?= ($witness_country=="" ? " selected":"") ?>>Please select one ...</option>
                                                                        <?php foreach($countries as $key => $w_value): ?>
                                                                            <option value="<?php echo $w_value->name ?>" <?= ($witness_country==$w_value->name ? " selected":"") ?>><?php echo $w_value->name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="witness_province" class="form-label">Province</label>
                                                                    <input type="text" id="witness_province" name="witness_province" class="form-control form-control-sm" value="<?= $witness_province?>" placeholder="Enter province here" > 
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="witness_city" class="form-label">City</label>
                                                                    <input type="text" id="witness_city" name="witness_city" class="form-control form-control-sm" value="<?= $witness_city?>" placeholder="Enter city here" > 
                                                                </div>
                                                                <div class="col-md-8 mb-2">
                                                                    <label for="witness_address" class="form-label">Address </label>
                                                                    <textarea id="witness_address" name="witness_address" class="form-control form-control-sm" value="<?= $witness_address?>" placeholder="Enter address here" rows="2"></textarea>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="witness_zip_code" class="form-label">Zip Code</label>
                                                                    <input type="text" id="witness_zip_code" name="witness_zip_code" class="form-control form-control-sm" value="<?= $witness_zip_code?>" placeholder="Enter zip code here" > 
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="business_it_poc" class="form-label">Business IT POC (if applicable)</label>
                                                                    <input type="text" id="business_it_poc" name="business_it_poc" class="form-control form-control-sm" placeholder="Name, Email, Phone, etc..">
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="other_busines_poc" class="form-label">Other Business POC (if applicable)</label>
                                                                    <input type="text" id="other_busines_poc" name="other_busines_poc" class="form-control form-control-sm" placeholder="Name, Email, Phone, etc..">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <h4 class="card-title text-danger">Suspect's Info </h4>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <h4 class="card-title m-b-0"><a id="s_add" class="btn btn-sm btn-danger w-100" role="button" href="javascript:void(0);" ><i class="fas fa-user-plus"></i>&nbsp;Add New</a></h4>
                                                                </div>
                                                            </div>
                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" id="s_ctr" name="s_ctr" value="<?php echo $s_ctr ?>" />
                                                                    <table id="s_table" style="padding: 5px; width:100%; margin-bottom: 5px;">
                                                                        <tbody>
                                                                            <?php if(!empty($suspects)): ?>
                                                                                <?php foreach($suspects as $key => $value): ?>
                                                                                <?php
                                                                                        $suspect_first_name        =    isset($value->first_name) && $value->first_name ? strtoupper($value->first_name) : '';
                                                                                        $suspect_middle_name        =    isset($value->middle_name) && $value->middle_name ? strtoupper($value->middle_name) : '';
                                                                                        $suspect_last_name        =    isset($value->last_name) && $value->last_name ? strtoupper($value->last_name) : '';
                                                                                ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="mb-3 pb-3 border-bottom">
                                                                                                <input type="hidden" id="s_id_<?= $s ?>" name="s_id_<?= $s ?>" value="<?php echo $value->id ?>" />
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4 mb-2">
                                                                                                        <label for="s_first_name_<?= $s ?>" class="form-label">First Name</label>
                                                                                                        <input type="text" id="s_first_name_<?= $s ?>" name="s_first_name_<?= $s ?>" class="form-control form-control-sm" value="<?= $suspect_first_name ?>" placeholder="Enter first name here">
                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4 mb-2">
                                                                                                        <label for="s_middle_name_<?= $s ?>" class="form-label">Middle Name</label>
                                                                                                        <input type="text" id="s_middle_name_<?= $s ?>" name="s_middle_name_<?= $s ?>" class="form-control form-control-sm" value="<?= $suspect_middle_name ?>" placeholder="Enter middle name here">
                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4 mb-2">
                                                                                                        <label for="s_last_name_<?= $s ?>" class="form-label">Last Name</label>
                                                                                                        <input type="text" id="s_last_name_<?= $s ?>" name="s_last_name_<?= $s ?>" class="form-control form-control-sm" value="<?= $suspect_last_name ?>" placeholder="Enter last name here">
                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4 mb-2">
                                                                                                        <label for="s_business_name_<?= $s ?>" class="form-label">Business Name</label>
                                                                                                        <input type="text" id="s_business_name_<?= $s ?>" name="s_business_name_<?= $s ?>" class="form-control form-control-sm" value="<?= $value->business_name ?>" placeholder="Enter business name here">
                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4 mb-2">
                                                                                                        <label for="s_ip_address_<?= $s ?>" class="form-label">IP Address</label>
                                                                                                        <input type="text" id="s_ip_address_<?= $s ?>" name="s_ip_address_<?= $s ?>" class="form-control form-control-sm" value="<?= $value->ip_address ?>" placeholder="123.45.67.89 or 2001:abc::1234">
                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4 mb-2">
                                                                                                        <label for="s_website_<?= $s ?>" class="form-label">Website</label>
                                                                                                        <input type="text" id="s_website_<?= $s ?>" name="s_website_<?= $s ?>" class="form-control form-control-sm" value="<?= $value->website_link ?>" placeholder="http://www.example.com/">
                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6 mb-2">
                                                                                                        <label for="s_mobile_number_<?= $s ?>" class="form-label">Mobile Number <code>(numbers only)</code></label>
                                                                                                        <input type="number" id="s_mobile_number_<?= $s ?>" name="s_mobile_number_<?= $s ?>" class="form-control form-control-sm" min="0" value="<?= $value->mobile_number ?>" placeholder="09XXXXXXXXX">
                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6 mb-2">
                                                                                                        <label for="s_email_<?= $s ?>" class="form-label">Email Address <code>(janedoe@email.com)</code></label>
                                                                                                        <input type="email" id="s_email_<?= $s ?>" name="s_email_<?= $s ?>" class="form-control form-control-sm" value="<?= $value->email ?>" placeholder="Enter email address here">
                                                                                                        <div class="invalid-feedback">Please provide a valid email!</div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4 mb-2">
                                                                                                        <label for="s_country_<?= $s ?>" class="form-label">Country </label>
                                                                                                        <select id="s_country_<?= $s ?>" name="s_country_<?= $s ?>" class="form-control form-control-sm">
                                                                                                            <option value="" <?= ($value->country=="" ? " selected":"") ?>>Please select one ...</option>
                                                                                                            <?php foreach($countries as $key => $c_value): ?>
                                                                                                                <option value="<?php echo $c_value->name ?>" <?= ($value->country==$c_value->name ? " selected":"") ?>><?php echo $c_value->name ?></option>
                                                                                                            <?php endforeach; ?>
                                                                                                        </select>
                                                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                                                    </div>
                                                                                                        <div class="col-md-4 mb-2">
                                                                                                        <label for="s_province_<?= $s ?>" class="form-label">Province </label>
                                                                                                        <input type="text" id="s_province_<?= $s ?>" name="s_province_<?= $s ?>" class="form-control form-control-sm" value="<?= $value->province ?>" placeholder="Enter province here">
                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4 mb-2">
                                                                                                        <label for="s_city_<?= $s ?>" class="form-label">City </label>
                                                                                                        <input type="text" id="s_city_<?= $s ?>" name="s_city_<?= $s ?>" class="form-control form-control-sm" value="<?= $value->city ?>" placeholder="Enter city here">
                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                    </div>
                                                                                                    <div class="col-md-8 mb-2">
                                                                                                        <label for="s_address_<?= $s ?>" class="form-label">Address </label>
                                                                                                        <textarea id="s_address_<?= $s ?>" name="s_address_<?= $s ?>" class="form-control form-control-sm" value="<?= $value->address1 ?>" placeholder="Enter address here" rows="2"></textarea>
                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <label for="s_zip_code_<?= $s ?>" class="form-label">Zip Code </label>
                                                                                                        <input type="text" id="s_zip_code_<?= $s ?>" name="s_zip_code_<?= $s ?>" class="form-control form-control-sm" value="<?= $value->zip_code ?>" placeholder="Enter zip code here">
                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row pt-2">
                                                                                                    <div class="col-md-12"><a id="s-btn-delete" data-id="<?= $value->id ?>" role="button" class="btn btn-sm btn-danger w-100" href="javascript:void(0);"><i class="fas fa-trash"></i>&nbsp;&nbsp;Delete</a></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php $s = $s + 1; ?>
                                                                                <?php endforeach; ?>
                                                                            <?php endif; ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <h4 class="card-title text-danger">Financial Transactions </h4>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <h4 class="card-title m-b-0"><a id="ft_add" class="btn btn-sm btn-danger w-100" role="button" href="javascript:void(0);" ><i class="far fa-money-bill-alt"></i>&nbsp;Add New</a></h4>
                                                                </div>
                                                            </div>
                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" id="ft_ctr" name="ft_ctr" value="<?php echo $ft_ctr ?>" />
                                                                    <table id="ft_table" style="padding: 5px; width:100%; margin-bottom: 5px;">
                                                                        <tbody>
                                                                            <?php if(!empty($financial_transactions)): ?>
                                                                                <?php foreach($financial_transactions as $key => $value): ?>
                                                                                <?php
                                                                                    $transaction_date        =    isset($value->transaction_date) && $value->transaction_date ? date_format(new DateTime($value->transaction_date),'Y-m-d') : '';
                                                                                ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="mb-3 pb-3 border-bottom">
                                                                                                <input type="hidden" id="ft_id_<?= $f ?>" name="ft_id_<?= $s ?>" value="<?php echo $value->id ?>" />
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="card pb-0">
                                                                                                            <div class="border-bottom p-1 bg-primary">
                                                                                                                <div class="d-md-flex align-items-center">
                                                                                                                    <div class="mr-sm-2">
                                                                                                                        <h6 class="card-title p-1 m-1 text-light">TRANSACTION TYPE</h6>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="card-body">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-4 mb-2">
                                                                                                                        <label for="ft_rgv_transaction_type_id_<?= $f ?>" class="form-label">Transaction Type <code>*</code> </label>
                                                                                                                        <select id="ft_rgv_transaction_type_id_<?= $f ?>" name="ft_rgv_transaction_type_id_<?= $f ?>" class="form-control form-control-sm" required>
                                                                                                                            <option value="" <?= ($value->rgv_transaction_type_id=="" ? " selected":"") ?>>Please select one ...</option>
                                                                                                                            <?php foreach($transaction_types as $key => $t_value): ?>
                                                                                                                                <option value="<?php echo $t_value->id ?>" <?= ($value->rgv_transaction_type_id==$t_value->id ? " selected":"") ?>><?php echo $c_value->name ?></option>
                                                                                                                            <?php endforeach; ?>
                                                                                                                        </select>
                                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-8">
                                                                                                                        <label for="ft_others_<?= $f ?>" class="form-label">If others, please specify here <code id="ft_req_others_" hidden>*</code></label>
                                                                                                                        <input type="text" id="ft_others_<?= $f ?>" name="ft_others_<?= $f ?>" class="form-control form-control-sm" placeholder="Enter transaction type here">
                                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-4 mb-2">
                                                                                                                        <label for="ft_transaction_date_<?= $f ?>" class="form-label">Date <code>*</code></label>
                                                                                                                        <input type="date" id="ft_transaction_date_<?= $f ?>" name="ft_transaction_date_<?= $f ?>" value="<?= $transaction_date ?>" class="form-control form-control-sm" required>
                                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-3 mb-2">
                                                                                                                        <label for="ft_is_sent_<?= $f ?>" class="form-label">Is the money sent? </label>
                                                                                                                        <select id="ft_is_sent_<?= $f ?>" name="ft_is_sent_<?= $f ?>" class="form-select form-select-sm">
                                                                                                                            <option value="0">No</option>
                                                                                                                            <option value="1" selected>Yes</option>
                                                                                                                        </select>
                                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-5">
                                                                                                                        <label for="ft_amount_<?= $f ?>" class="form-label">Amount <code>*</code></label>
                                                                                                                        <input type="number" id="ft_amount_<?= $f ?>" name="ft_amount_<?= $f ?>" min="0" max="999999999" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" value="<?= $amount ?>" class="form-control form-control-sm" placeholder="0.00" required>
                                                                                                                        <div class="invalid-feedback">This field is required!</div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-6">
                                                                                                                <div class="card pb-0">
                                                                                                                    <div class="border-bottom p-1 bg-primary">
                                                                                                                        <div class="d-md-flex align-items-center">
                                                                                                                            <div class="mr-sm-2">
                                                                                                                                <h4 class="card-title p-1 m-1 text-light">SENDER\'S BANK INFO</h4>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="card-body">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-12 mb-2">
                                                                                                                                <label for="ft_s_bank_name_<?= $f ?>" class="form-label">Bank Name </label>
                                                                                                                                <input type="text" id="ft_s_bank_name_<?= $f ?>" name="ft_s_bank_name_<?= $f ?>" class="form-control form-control-sm" placeholder="Enter bank name here">
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-6 mb-2">
                                                                                                                                <label for="ft_s_account_name_<?= $f ?>" class="form-label">Account Name </label>
                                                                                                                                <input type="text" id="ft_s_account_name_<?= $f ?>" name="ft_s_account_name_<?= $f ?>" class="form-control form-control-sm" placeholder="Enter account name here">
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-6 mb-2">
                                                                                                                                <label for="ft_s_account_no_<?= $f ?>" class="form-label">Account No. </label>
                                                                                                                                <input type="text" id="ft_s_account_no_<?= $f ?>" name="ft_s_account_no_<?= $f ?>" class="form-control form-control-sm" placeholder="Enter account no. here">
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-6 mb-2">
                                                                                                                                <label for="ft_s_country_<?= $f ?>" class="form-label">Country </label>
                                                                                                                                <select id="ft_s_country_<?= $f ?>" name="ft_s_country_<?= $f ?>" class="form-control form-control-sm">
                                                                                                                                </select>
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-6 mb-2">
                                                                                                                                <label for="ft_s_province_<?= $f ?>" class="form-label">Province </label>
                                                                                                                                <input type="text" id="ft_s_province_<?= $f ?>" name="ft_s_province_<?= $f ?>" class="form-control form-control-sm" placeholder="Enter province here">
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-6 mb-2">
                                                                                                                                <label for="ft_s_city_<?= $f ?>" class="form-label">City </label>
                                                                                                                                <input type="text" id="ft_s_city_<?= $f ?>" name="ft_s_city_<?= $f ?>" class="form-control form-control-sm" placeholder="Enter city here">
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-6 mb-2">
                                                                                                                                <label for="ft_s_zip_code_<?= $f ?>" class="form-label">Zip Code </label>
                                                                                                                                <input type="text" id="ft_s_zip_code_<?= $f ?>" name="ft_s_zip_code_<?= $f ?>" class="form-control form-control-sm" placeholder="Enter zip code here">
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-12 mb-2">
                                                                                                                                <label for="ft_s_address_<?= $f ?>" class="form-label">Address </label>
                                                                                                                                <textarea id="ft_s_address_<?= $f ?>" name="ft_s_address_<?= $f ?>" class="form-control form-control-sm" rows="2" placeholder="Enter address here"></textarea>
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-6">
                                                                                                                <div class="card pb-0">
                                                                                                                    <div class="border-bottom p-1 bg-primary">
                                                                                                                        <div class="d-md-flex align-items-center">
                                                                                                                            <div class="mr-sm-2">
                                                                                                                                <h4 class="card-title p-1 m-1 text-light">RECIEPIENT'S BANK INFO</h4>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="card-body">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-12 mb-2">
                                                                                                                                <label for="ft_r_bank_name_<?= $f ?>" class="form-label">Bank Name </label>
                                                                                                                                <input type="text" id="ft_r_bank_name_<?= $f ?>" name="ft_r_bank_name_<?= $f ?>" class="form-control form-control-sm" placeholder="Enter bank name here">
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-6 mb-2">
                                                                                                                                <label for="ft_r_account_name_<?= $f ?>" class="form-label">Account Name </label>
                                                                                                                                <input type="text" id="ft_r_account_name_<?= $f ?>" name="ft_r_account_name_<?= $f ?>" class="form-control form-control-sm" placeholder="Enter account name here">
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-6">
                                                                                                                                <label for="ft_r_account_no_<?= $f ?>" class="form-label">Account No. </label>
                                                                                                                                <input type="text" id="ft_r_account_no_<?= $f ?>" name="ft_r_account_no_<?= $f ?>" class="form-control form-control-sm" placeholder="Enter account no. here">
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-6 mb-2">
                                                                                                                                <label for="ft_r_country_<?= $f ?>" class="form-label">Country </label>
                                                                                                                                <select id="ft_r_country_<?= $f ?>" name="ft_r_country_<?= $f ?>" class="form-control form-control-sm">
                                                                                                                                </select>
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-6 mb-2">
                                                                                                                                <label for="ft_r_province_<?= $f ?>" class="form-label">Province </label>
                                                                                                                                <input type="text" id="ft_r_province_<?= $f ?>" name="ft_r_province_<?= $f ?>" class="form-control form-control-sm" placeholder="Enter province here">
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-6 mb-2">
                                                                                                                                <label for="ft_r_city_<?= $f ?>" class="form-label">City </label>
                                                                                                                                <input type="text" id="ft_r_city_<?= $f ?>" name="ft_r_city_<?= $f ?>" class="form-control form-control-sm" placeholder="Enter city here">
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-6 mb-2">
                                                                                                                                <label for="ft_r_zip_code_<?= $f ?>" class="form-label">Zip Code </label>
                                                                                                                                <input type="text" id="ft_r_zip_code_<?= $f ?>" name="ft_r_zip_code_<?= $f ?>" class="form-control form-control-sm" placeholder="Enter zip code here">
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-12 mb-2">
                                                                                                                                <label for="ft_r_address_<?= $f ?>" class="form-label">Address </label>
                                                                                                                                <textarea id="ft_r_address_<?= $f ?>" name="ft_r_address_<?= $f ?>" class="form-control form-control-sm" rows="2" placeholder="Enter address here"></textarea>
                                                                                                                                <div class="invalid-feedback">This field is required!</div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-12"><a id="f-btn-delete" data-id="<?= $value->id ?>" role="button" class="btn btn-sm btn-danger w-100" href="javascript:void(0);"><i class="fas fa-trash"></i>&nbsp;&nbsp;Delete</a></div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php $f = $f + 1; ?>
                                                                                <?php endforeach; ?>
                                                                            <?php endif; ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4 class="card-title text-danger">Complaint <code>*</code></h4>
                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-md-12 mb-2">
                                                                    <textarea id="description_of_incident" name="description_of_incident" class="form-control form-control-sm" placeholder="Enter descripton of incident here" rows="10" required><?= $description_of_incident ?></textarea>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4 class="card-title text-danger">Actions Taken</h4>
                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-md-12 mb-2">
                                                                    <textarea id="actions_taken" name="actions_taken" class="form-control form-control-sm" placeholder="Enter descripton of incident here" rows="5" required></textarea>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-12 mb-2">
                                                                    <label for="report_status" class="form-label">Report Status</label>
                                                                    <select id="report_status" name="report_status[]" class="form-control form-control-sm" multiple="" style="height: 3rem;">
                                                                        <?php foreach($report_statuses as $key => $value): ?>
                                                                        <option value="<?php echo $value->status ?>"><?php echo $value->status ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4 class="card-title text-danger">After Status Report </h4>
                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-md-12 mb-2">
                                                                    <textarea id="after_status_report" name="after_status_report" class="form-control form-control-sm" placeholder="Enter after status report here" rows="10"></textarea>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-8">
                                                    <div class="form-body">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <a href="<?= base_url()?>Complaint" class="btn btn-danger font-weight-medium align-items-center" style="width:100%;">
                                                                        <!-- <i class="fas fa-arrow-left"></i>&nbsp;&nbsp; -->
                                                                        Cancel
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-6"></div>
                                                                <div class="col-md-3">
                                                                    <button id="btnSubmit" class="btn btn-info" type="submit" style="width:100%;">
                                                                        <i class="loading-icon fa fa-spinner fa-spin hide"></i> 
                                                                        <span class="btn-txt">SUBMIT</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            