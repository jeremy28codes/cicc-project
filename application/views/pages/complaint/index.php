<?php
    $searchString        =    isset($filters['searchString']) && $filters['searchString'] ? $filters['searchString'] : '';
    $rgv_report_type_id        =    isset($filters['rgv_report_type_id']) && $filters['rgv_report_type_id'] ? $filters['rgv_report_type_id'] : '';
    $date_received        =    isset($filters['date_received']) && $filters['date_received'] ? date('Y-m-d', strtotime($filters['date_received'])) : '';
    $show_filter        =    isset($filters['show_filter']) && $filters['show_filter'] ? $filters['show_filter'] : false;
    $officer_on_case        =    isset($filters['officer_on_case']) && $filters['officer_on_case'] ? $filters['officer_on_case'] : '';
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
                                    <li class="breadcrumb-item active" aria-current="page">List</li>
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
                                            <h2 class="card-title">List</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                </div>
                                                <div class="col-md-3 m-b-5">
                                                    <button type="submit" class="btn btn-primary font-weight-medium align-items-center" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="width:100%;">
                                                        <i class="fas fa-search"></i>&nbsp;&nbsp;
                                                        Show Filter
                                                    </button>
                                                </div>
                                                <div class="col-md-3 m-b-5">
                                                    <a href="<?= base_url()?>Complaint/create" class="btn btn-success font-weight-medium align-items-center" style="width:100%;">
                                                            <i class="fas fa-plus"></i>&nbsp;&nbsp;
                                                            Add New
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="col-lg-12">
                                    <div class="collapse <?= $show_filter == true ? " show": "" ?>" id="collapseExample">
                                        <div class="card card-body">
                                            <form id="form-filter" action="<?php echo base_url();?>Complaint" method="POST">
                                                <div class="row">
                                                    <div class="col-md-6 pb-3">
                                                        <label for="searchString">Search String</label>
                                                        <input id="searchString" name="searchString" type="text" class="form-control" value="<?= $searchString ?>" placeholder="Enter search text here ..." aria-label="Username">
                                                    </div>
                                                    <div class="col-md-3 pb-3">
                                                        <label for="rgv_report_type_id">Report Type</label>
                                                        <select id="rgv_report_type_id" name="rgv_report_type_id" class="form-control">
                                                            <option value="" <?= ($rgv_report_type_id=="") ? " selected" : "" ?>>Please select one ...</option>
                                                            <?php foreach($report_types as $key => $value): ?>
                                                            <option value="<?php echo $value->id ?>" <?= ($rgv_report_type_id==$value->id) ? " selected" : "" ?>><?php echo $value->name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 pb-3">
                                                        <label for="date_received">Date Received</label>
                                                        <input id="date_received" name="date_received" type="date" value="<?= $date_received ?>" class="form-control" aria-label="Date Received">
                                                    </div>
                                                    <div class="col-md-6 pb-3">
                                                        <label for="officer_on_case">Officer-On-Case</label>
                                                        <select id="officer_on_case" name="officer_on_case" class="form-control">
                                                            <option value="" <?= ($officer_on_case=="" ? " selected": "") ?>>Please select one ...</option>
                                                            <?php foreach($case_officers as $key => $value): ?>
                                                            <option value="<?= strtoupper($value->first_name. " " . $value->middle_name . " " . $value->last_name) ?>" <?= (strtoupper($value->first_name. " " . $value->middle_name . " " . $value->last_name) == $officer_on_case ? " selected" : "") ?>><?php echo strtoupper($value->first_name. " " . $value->middle_name . " " . $value->last_name) ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-10 pb-3">
                                                    </div>
                                                    <div class="col-md-1 pb-3">
                                                        <a id="btn-reset-form" href="javascript:void(0);" class="btn btn-primary font-weight-medium align-items-center" style="width:100%;">
                                                            Reset
                                                        </a>
                                                    </div>
                                                    <div class="col-md-1 pb-3">
                                                        <button type="submit" class="btn btn-primary font-weight-medium align-items-center" style="width:100%;">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive" style="width:100%;">
                                    <table id="table" class="table customize-table v-middle" style="width: 100%">
                                        <thead class="table-dark">
                                            <tr>
                                                <th class="text-center text-white" style="width: 5%;">#</th>
                                                <th class="text-center text-white" style="width: 5%;">ID</th>
                                                <th class="text-center text-white" style="width: 20%;"> Reference Number </th>
                                                <th class="text-center text-white" style="width: 20%;"> Complainant </th>
                                                <th class="text-center text-white" style="width: 20%;"> Date & Time Received </th>
                                                <th class="text-center text-white" style="width: 20%;"> Report Type </th>
                                                <th hidden> Report Details </th>
                                                <th hidden> Officer-On-Case </th>
                                                <th hidden> Cybercrime Offenses </th>
                                                <th hidden> Status </th>
                                                <th hidden> Actions Taken </th>
                                                <th hidden> After Status Report </th>
                                                <th class="text-center text-white" style="width: 10%;"> Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if( ! empty($reports) ): ?>
                                                <?php foreach ($reports as $key => $value) : ?> 
                                                    <?php 
                                                        $report_categories = $this->M_report_assessments->getByReportID($value->id);
                                                        $report_categories_cnt = count($report_categories);
                                                        $report_categories_ctr = 0;

                                                        $report_statuses = $this->M_report_statuses->getByReportID($value->id);
                                                        $report_statuses_cnt = count($report_statuses);
                                                        $report_statuses_ctr = 0;

                                                        $dt_received        =    isset($value->date_received) && $value->date_received ? date('Y-m-d', strtotime($value->date_received)) : '';
                                                    ?>
                                                    <?php if(!empty($report_categories)): ?>
                                                        <tr>
                                                            <td class="text-center"></td>
                                                            <td class="text-center"><?= $value->id ?></td>
                                                            <td class="text-center"><?= $value->reference_number ?></td>
                                                            <td><?= strtoupper($value->victim_last_name.", ".$value->victim_first_name." ".$value->victim_middle_name) ?></td>
                                                            <td class="text-center"><?= $dt_received ?> <?= $value->time_received ?></td>
                                                            <td class="text-center"><?= $value->report_type ?></td>
                                                            <td><?= $value->description_of_incident ?></td>
                                                            <td><?= $value->officer_on_case ?></td>
                                                            <td>
                                                                <?php if(!empty($report_categories)): ?>
                                                                    <?php foreach($report_categories as $key => $rc): ?>
                                                                        <?= $rc->report_assessment_name?>;
                                                                        <?php $report_categories_ctr = $report_categories_ctr + 1; ?>
                                                                    <?php endforeach; ?> 
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if(!empty($report_statuses)): ?>
                                                                    <?php foreach($report_statuses as $key => $rs): ?>
                                                                        <?= $rs->status?>;
                                                                        <?php $report_statuses_ctr = $report_statuses_ctr + 1; ?>
                                                                    <?php endforeach; ?> 
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?= $value->actions_taken ?></td>
                                                            <td><?= $value->after_status_report ?></td>
                                                            <td class="text-center">
                                                                <a class="btn waves-effect waves-light btn-xs btn-warning m-b-5" href="<?= base_url() ?>Complaint/View/<?= $value->id ?>">View</a>
                                                                <a class="btn waves-effect waves-light btn-xs btn-success m-b-5" href="<?= base_url() ?>Complaint/Edit/<?= $value->id ?>">Edit</a>
                                                                <a id="btn-delete" data-id="<?= $value->id ?>" class="btn waves-effect waves-light btn-xs btn-danger m-b-5" href="javascript:void(0);">Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            