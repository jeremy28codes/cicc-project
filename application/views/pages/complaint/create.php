<?php
    $c = 0;

    if(!empty($offenses)){
        $c = count($offenses);
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
                                    <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                                            <h2 class="card-title">Create</h2>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="col-lg-12">
                                    <form id="form" class="form needs-validation" novalidate>
                                        <!-- Victim's Data -->
                                        <div class="card mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-body">
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
                                                                    <label for="rgv_report_type_id" class="form-label">Report Type <code>*</code></label>
                                                                </div>
                                                                <div class="col-md-8 pb-2">
                                                                    <select id="rgv_report_type_id" name="rgv_report_type_id" class="form-control form-control-sm" required>
                                                                        <option value="">Please select one ...</option>
                                                                        <?php foreach($report_types as $key => $value): ?>
                                                                        <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 pb-2">
                                                                    <label for="date_received" class="form-label">Date <code>*</code></label>
                                                                </div>
                                                                <div class="col-md-8 pb-2">
                                                                    <input type="date" id="date_received" name="date_received" class="form-control form-control-sm" required> 
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 pb-2">
                                                                    <label for="time_received" class="form-label">Time <code>*</code></label>
                                                                </div>
                                                                <div class="col-md-8 pb-2">
                                                                    <input type="time" id="time_received" name="time_received" class="form-control form-control-sm" placeholder="Enter province here" required> 
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 pb-2">
                                                                    <label for="report_modus" class="form-label">Modus</label>
                                                                </div>
                                                                <div class="col-md-8 pb-2">
                                                                    <input type="text" id="report_modus" name="report_modus" class="form-control form-control-sm" placeholder="Enter modus here"> 
                                                                </div>
                                                                <div class="col-md-4 pb-2">
                                                                    <label for="report_group" class="form-label">Group</label>
                                                                </div>
                                                                <div class="col-md-8 pb-2">
                                                                    <input type="text" id="report_group" name="report_group" class="form-control form-control-sm" placeholder="Enter group here"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="card-title">Officer-On-Case <code>*</code></h4>
                                                        <hr/>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <select id="officer_on_case" name="officer_on_case" class="form-control" required>
                                                                        <option value="" disabled selected>Please select one ...</option>
                                                                        <?php foreach($case_officers as $key => $value): ?>
                                                                        <option value="<?= strtoupper($value->first_name. " " . $value->middle_name . " " . $value->last_name) ?>" ><?php echo strtoupper($value->first_name. " " . $value->middle_name . " " . $value->last_name) ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="card-title">Cybercrime Offenses</h4>
                                                        <hr/>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <?php if(!empty($offenses)): ?>
                                                                    <?php foreach($offenses as $key => $value): ?>
                                                                        <div class="col-md-6 mb-2">
                                                                            <label for="rgv_report_category_<?= $c ?>"><input type="checkbox" class="form-input" id="rgv_report_category_<?= $c ?>" name="rgv_report_category[]" value="<?= $value->id ?>"> <?= $value->name ?></label>
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
                                                            <h4 class="card-title">Victim's Info</h4>
                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="first_name" class="form-label">First Name <code>*</code></label>
                                                                    <input type="text" id="first_name" name="first_name" class="form-control form-control-sm" placeholder="Enter first name here" required> 
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="middle_name" class="form-label">Middle Name </label>
                                                                    <input type="text" id="middle_name" name="middle_name" class="form-control form-control-sm" placeholder="Enter middle name here"> 
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="last_name" class="form-label">Last Name <code>*</code></label>
                                                                    <input type="text" id="last_name" name="last_name" class="form-control form-control-sm" placeholder="Enter last name here" required> 
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="rgv_age_bracket_id" class="form-label">Age Bracket</label>
                                                                    <select id="rgv_age_bracket_id" name="rgv_age_bracket_id" class="form-control form-control-sm">
                                                                        <option value="">Please select one ...</option>
                                                                        <?php foreach($age_brackets as $key => $value): ?>
                                                                        <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="rgv_sex_id" class="form-label">Sex</label>
                                                                    <select id="rgv_sex_id" name="rgv_sex_id" class="form-control form-control-sm">
                                                                        <option value="">Please select one ...</option>
                                                                        <?php foreach($sexes as $key => $value): ?>
                                                                        <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="rgv_marital_status_id" class="form-label">Marital Status</label>
                                                                    <select id="rgv_marital_status_id" name="rgv_marital_status_id" class="form-control form-control-sm">
                                                                        <option value="">Please select one ...</option>
                                                                        <?php foreach($marital_statuses as $key => $value): ?>
                                                                        <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="mobile_number" class="form-label">Mobile Number <code>*</code></label>
                                                                    <input type="text" id="mobile_number" name="mobile_number" class="form-control form-control-sm" placeholder="Enter mobile number here" required> 
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="email" class="form-label">Email <code>*</code></label>
                                                                    <input type="email" id="email" name="email" class="form-control form-control-sm" placeholder="Enter email here" required> 
                                                                    <div class="invalid-feedback">Please enter a valid email!</div>
                                                                </div>
                                                                <div class="col-md-12 mb-2">
                                                                    <label for="address" class="form-label">Address </label>
                                                                    <textarea id="address" name="address" class="form-control form-control-sm" placeholder="Enter address here"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4 class="card-title">Suspect's Info </h4>
                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="suspect_first_name" class="form-label">First Name</label>
                                                                    <input type="text" id="suspect_first_name" name="suspect_first_name" class="form-control form-control-sm" placeholder="Enter first name here"> 
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="suspect_middle_name" class="form-label">Middle Name </label>
                                                                    <input type="text" id="suspect_middle_name" name="suspect_middle_name" class="form-control form-control-sm" placeholder="Enter middle name here"> 
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="suspect_last_name" class="form-label">Last Name</label>
                                                                    <input type="text" id="suspect_last_name" name="suspect_last_name" class="form-control form-control-sm" placeholder="Enter last name here"> 
                                                                </div>
                                                                <div class="col-md-8 mb-2">
                                                                    <label for="suspect_business_name" class="form-label">Business Name</label>
                                                                    <input type="text" id="suspect_business_name" name="suspect_business_name" class="form-control form-control-sm" placeholder="Enter business name here"> 
                                                                </div>
                                                                <div class="col-md-4 mb-2">
                                                                    <label for="suspect_username" class="form-label">Alias/Username</label>
                                                                    <input type="text" id="suspect_username" name="suspect_username" class="form-control form-control-sm" placeholder="Enter username/alias here"> 
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="ip_address" class="form-label">IP Address</label>
                                                                    <input type="text" id="ip_address" name="ip_address" class="form-control form-control-sm" placeholder="Enter ip address here"> 
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="website" class="form-label">Website</label>
                                                                    <input type="text" id="website" name="website" class="form-control form-control-sm" placeholder="Enter website here"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4 class="card-title">Complaint <code>*</code></h4>
                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-md-12 mb-2">
                                                                    <textarea id="description_of_incident" name="description_of_incident" class="form-control form-control-sm" placeholder="Enter descripton of incident here" rows="10" required></textarea>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4 class="card-title">Actions Taken</h4>
                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-md-12 mb-2">
                                                                    <textarea id="actions_taken" name="actions_taken" class="form-control form-control-sm" placeholder="Enter descripton of incident here" rows="5" required></textarea>
                                                                    <div class="invalid-feedback">This field is required!</div>
                                                                </div>
                                                                <div class="col-md-12 mb-2">
                                                                    <label for="report_status" class="form-label">Report Status</label>
                                                                    <select id="report_status" name="report_status[]" class="form-control form-control-sm" multiple="">
                                                                        <?php foreach($report_statuses as $key => $value): ?>
                                                                        <option value="<?php echo $value->status ?>"><?php echo $value->status ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4 class="card-title">After Status Report </h4>
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
                                        </div>
                                        <div class="col-12 text-right">
                                            <button id="btnSubmit" class="btn btn-info" type="submit">
                                            <i class="loading-icon fa fa-spinner fa-spin hide"></i> 
                                            <span class="btn-txt">SUBMIT</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            