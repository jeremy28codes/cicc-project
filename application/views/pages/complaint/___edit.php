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

?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Profile</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="../../assets/images/users/5.jpg" class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10">Hanna Gover</h4>
                                    <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6>hannagover@gmail.com</h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6>+91 654 784 547</h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6>
                                <div class="map-box">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div> <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tabs -->
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Timeline</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                                </li>
                            </ul>
                            <!-- Tabs -->
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                    <div class="card-body">
                                        <div class="profiletimeline m-t-0">
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a></p>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="../../assets/images/big/img1.jpg" class="img-fluid rounded" /></div>
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="../../assets/images/big/img2.jpg" class="img-fluid rounded" /></div>
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="../../assets/images/big/img3.jpg" class="img-fluid rounded" /></div>
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="../../assets/images/big/img4.jpg" class="img-fluid rounded" /></div>
                                                        </div>
                                                        <div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../../assets/images/users/2.jpg" alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div> <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <div class="m-t-20 row">
                                                            <div class="col-md-3 col-xs-12"><img src="../../assets/images/big/img1.jpg" alt="user" class="img-fluid rounded" /></div>
                                                            <div class="col-md-9 col-xs-12">
                                                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="javascript:void(0)" class="btn btn-success"> Design weblayout</a></div>
                                                        </div>
                                                        <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../../assets/images/users/3.jpg" alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                                    </div>
                                                    <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="../../assets/images/users/4.jpg" alt="user" class="rounded-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <blockquote class="m-t-10">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">Johnathan Deo</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">(123) 456 7890</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">johnathan@admin.com</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                                <br>
                                                <p class="text-muted">London</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        <h4 class="font-medium m-t-30">Skill Set</h4>
                                        <hr>
                                        <h5 class="m-t-30">Wordpress <span class="pull-right">80%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">Photoshop <span class="pull-right">70%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Message</label>
                                                <div class="col-md-12">
                                                    <textarea rows="5" class="form-control form-control-line"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Select Country</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line">
                                                        <option>London</option>
                                                        <option>India</option>
                                                        <option>Usa</option>
                                                        <option>Canada</option>
                                                        <option>Thailand</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>