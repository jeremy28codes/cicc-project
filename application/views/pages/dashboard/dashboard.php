<?php

    $offenses = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Offenses',0,0);

?>    
    
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <?php foreach($offenses as $key => $value): ?>
                <?php 
                    $count = count($this->M_report_assessments->getByReportCategoryID($value->id))  
                ?>
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row p-t-10 p-b-10">
                                <div class="col-8">
                                    <h6 class="text-muted"><?= $value->name ?></h6>
                                </div>
                                <div class="col-4 p-r-0">
                                    <h1 class="font-light"><?= $count ?></h1>
                                </div>
                                <!-- Column
                                <div class="col p-r-0">
                                    <h1 class="font-light"><?= $count ?></h1>
                                    <h6 class="text-muted"><?= $value->name ?></h6>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Offenses</h4>
                        <div class="status m-t-30" style="min-height: 500px; width:100%"></div>
                        <!-- <div class="row">
                            <div class="col-4 border-right">
                                <i class="fa fa-circle text-primary"></i>
                                <h4 class="mb-0 font-medium">5489</h4>
                                <span>Success</span>
                            </div>
                            <div class="col-4 border-right p-l-20">
                                <i class="fa fa-circle text-info"></i>
                                <h4 class="mb-0 font-medium">954</h4>
                                <span>Pending</span>
                            </div>
                            <div class="col-4 p-l-20">
                                <i class="fa fa-circle text-success"></i>
                                <h4 class="mb-0 font-medium">736</h4>
                                <span>Failed</span>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h4 class="card-title">Yearly Comparison</h4>
                            </div>
                            <div class="ml-auto">
                                <div class="dl m-b-10">
                                    <select class="custom-select border-0 text-muted">
                                        <option value="0" selected="">2018</option>
                                        <option value="1">2015</option>
                                        <option value="2">2016</option>
                                        <option value="3">2017</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="chart1 m-t-40" style="position: relative; height:250px;"></div>
                        <ul class="list-inline m-t-30 text-center font-12">
                            <li class="list-inline-item text-muted"><i class="fa fa-circle text-info m-r-5"></i> This Year</li>
                            <li class="list-inline-item text-muted"><i class="fa fa-circle text-light m-r-5"></i> Last Year</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        
        