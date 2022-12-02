<?php
defined('BASEPATH') OR exit('No direct s    cript access allowed');

date_default_timezone_set('Asia/Manila');

class Complaint extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('system_web_modules_model', 'M_system_web_module');
        $this->load->model('system_web_sections_model', 'M_system_web_section');

        // References: Location
        $this->load->model('System_reference_regions_model','M_system_reference_regions');
        $this->load->model('System_reference_countries_model','M_system_reference_countries');
        $this->load->model('System_reference_provinces_model','M_system_reference_provinces');
        $this->load->model('System_reference_cities_model','M_system_reference_cities');

        $this->load->model('System_users_model', 'M_system_user');
        $this->load->model('System_user_roles_model', 'M_system_user_role');
        $this->load->model('System_user_role_module_access_model','M_system_user_role_module_access');
        $this->load->model('System_user_role_section_access_model','M_system_user_role_section_access');

        // References: Groups and Values
        $this->load->model('System_reference_groups_model', 'M_system_reference_groups');
        $this->load->model('System_reference_group_values_model', 'M_system_reference_group_values');

        // Reference: Department & Division
        $this->load->model('System_departments_model','M_system_departments');
        $this->load->model('System_divisions_model','M_system_divisions');

        $this->load->model('Report_reference_numbers_model','M_report_reference_numbers');
        $this->load->model('Reports_model', 'M_reports');
        $this->load->model('Victims_model','M_victims');
        $this->load->model('Witnesses_model','M_witnesses');
        $this->load->model('Suspects_model','M_suspects');
        $this->load->model('Victim_financial_transactions_model','M_victim_financial_transactions');
        $this->load->model('Report_assessments_model','M_report_assessments');
        $this->load->model('Report_statuses_model', 'M_report_statuses');

        $this->load->model('To_migrate_model', 'M_to_migrate');
    }

	public function index()
	{
        if (!($this->session->userdata('username')))
		{
		    redirect('auth'); 
        }

        $data['page_info'] = array(
            'page_title' => 'CICC - Complaint',
            'system_web_module' => 'Complaints',
            'system_web_section' => '',
            'system_task' => '',
            'system_active_tab' => '',
            'styles_path' => array(
                'assets/extra-libs/DataTables/jQueryUI-1.12.1/themes/base/jquery-ui.css',
                'assets/extra-libs/DataTables/DataTables-1.12.1/css/dataTables.jqueryui.css',
                'assets/extra-libs/DataTables/Buttons-2.2.3/css/buttons.dataTables.min.css'
            ),
            'scripts_path' => array(
                'assets/extra-libs/DataTables/DataTables-1.12.1/js/jquery.dataTables.min.js',
                'assets/extra-libs/DataTables/DataTables-1.12.1/js/dataTables.jqueryui.min.js',
                'assets/extra-libs/DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js',
                'assets/extra-libs/DataTables/JSZip-2.5.0/jszip.min.js',
                'assets/extra-libs/DataTables/pdfmake-0.1.36/pdfmake.min.js',
                'assets/extra-libs/DataTables/pdfmake-0.1.36/vfs_fonts.js',
                'assets/extra-libs/DataTables/Buttons-2.2.3/js/buttons.html5.min.js',
                'assets/extra-libs/DataTables/Buttons-2.2.3/js/buttons.print.min.js',
                'assets/js/pages/complaint/index.js'
            )
        );

        if($this->input->post()){
            $data['filters'] = array(
                'searchString' => $this->security->xss_clean($this->input->post('searchString')),
                'rgv_report_type_id' => $this->security->xss_clean($this->input->post('rgv_report_type_id')),
                'date_received' => ($this->input->post('date_received')!=="") ? $this->security->xss_clean(date('y-m-d', strtotime($this->input->post('date_received')))) : '',
                'officer_on_case' => $this->security->xss_clean($this->input->post('officer_on_case')),
                'show_filter' => true
            );
            $data['reports'] = $this->M_reports->getAllWithFilter($data['filters']);
        }else{
            $data['reports'] = $this->M_reports->getAll();
        }

        $data['report_types'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Report Type',0,0);
        $data['case_officers'] = $this->M_system_user->getAllByDepartmentDivision($this->session->userdata('department_id'),$this->session->userdata('division_id'));
        $this->load->view('_includes/header', $data);
        $this->load->view('_includes/topbar', $data);
        $this->load->view('_includes/side-nav', $data);
        $this->load->view('pages/complaint/index', $data);
        $this->load->view('_includes/customizer', $data);
        $this->load->view('_includes/footer', $data);
       
	}

    public function create(){
        if (!($this->session->userdata('username')))
		{
		    redirect('auth'); 
        }

        $data['page_info'] = array(
            'page_title' => 'CICC - Create a Complaint',
            'system_web_module' => 'Complaints',
            'system_web_section' => '',
            'system_task' => '',
            'system_active_tab' => '',
            'styles_path' => array(
                'assets/libs/select2/dist/css/select2.min.css',
                // 'assets/extra-libs/DataTables/DataTables-1.12.1/css/dataTables.jqueryui.css',
                // 'assets/extra-libs/DataTables/Buttons-2.2.3/css/buttons.dataTables.min.css'
            ),
            'scripts_path' => array(
                'assets/libs/select2/dist/js/select2.full.min.js',
                'assets/libs/select2/dist/js/select2.min.js',
                'assets/vendor/php-email-form/validate.js',
                'assets/js/pages/complaint/create.js'
            )
        );


        $data['report_types'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Report Type',0,0);
        $data['offenses'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Offenses',0,0);
        $data['report_statuses'] = $this->M_report_statuses->getAllGrouped();
        $data['age_brackets'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Age Bracket',0,0);
		$data['sexes'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Sex',0,0);
		$data['marital_statuses'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Marital Status',0,0);
        $data['case_officers'] = $this->M_system_user->getAllByDepartmentDivision($this->session->userdata('department_id'),$this->session->userdata('division_id'));
        $this->load->view('_includes/header', $data);
        $this->load->view('_includes/topbar', $data);
        $this->load->view('_includes/side-nav', $data);
        $this->load->view('pages/complaint/create', $data);
        $this->load->view('_includes/customizer', $data);
        $this->load->view('_includes/footer', $data);

    }

    public function insert()
	{
        $response['status'] = 0;
        $response['message'] = 'Something went wrong. Please contact your technical support. (0)';

        if($this->input->post()){

            $response['status'] = 0;
            $response['message'] = 'Please complete the required fields first and try again! (1)';

            $rgv_report_type_id = $this->security->xss_clean($this->input->post('rgv_report_type_id'));
            $date_received = $this->security->xss_clean($this->input->post('date_received'));
            $time_received = $this->security->xss_clean($this->input->post('time_received'));
            $officer_on_case = $this->security->xss_clean($this->input->post('officer_on_case'));
            $description_of_incident = $this->security->xss_clean($this->input->post('description_of_incident'));
            $actions_taken = $this->security->xss_clean($this->input->post('actions_taken'));
            $victim_first_name = strtoupper($this->security->xss_clean($this->input->post('first_name')));
            $victim_last_name = strtoupper($this->security->xss_clean($this->input->post('last_name')));
            $victim_middle_name =  ($this->security->xss_clean($this->input->post('middle_name'))!=="" ? strtoupper($this->security->xss_clean($this->input->post('middle_name'))) : "");
            $victim_email = $this->security->xss_clean($this->input->post('email'));
            $victim_mobile = $this->security->xss_clean($this->input->post('mobile_number'));

            $division_id = $this->session->userdata('division_id');
            $reference_number = $this->generateReferenceNumber($rgv_report_type_id, $division_id);
            
            if($rgv_report_type_id!=="" && $date_received!=="" && $time_received!=="" && $officer_on_case!==""
                && $description_of_incident!=="" && $actions_taken!=="" && $victim_first_name!=="" && $victim_last_name!==""
                && $victim_email!=="" && $victim_mobile!=="")
            {

                $response['status'] = 1;
                $response['message'] = 'Report Submitted Successfully!';

                $report_data = array(
                    'reference_number' => $this->security->xss_clean($reference_number),
                    'rgv_report_type_id' => $rgv_report_type_id,
                    'date_received' => $date_received,
                    'time_received' => $time_received,
                    'report_modus' => $this->security->xss_clean($this->input->post('report_modus')),
                    'report_group' =>  $this->security->xss_clean($this->input->post('report_group')),
                    'description_of_incident' => $description_of_incident,
                    'digital_signature' => $this->security->xss_clean($this->input->post('digital_signature')),
                    'officer_on_case' => $this->security->xss_clean($this->input->post('officer_on_case')),
                    'actions_taken' => $this->security->xss_clean($this->input->post('actions_taken')),
                    'after_status_report' => $this->security->xss_clean($this->input->post('after_status_report')),
                    'created_by' => $this->security->xss_clean($this->session->userdata('username')),
                    'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                );

                $report_id = $this->M_reports->insert($report_data);
                if($report_id<=0){
                    $response['status'] = 0;
                    $response['message'] = 'Something went wrong. Please contact your technical support. (1)';
                    return;
                }

                $res = $this->M_report_reference_numbers->getBy_ReportTypeIDDivisionID($rgv_report_type_id, $division_id);
                $ctr = 0;
                if($res){
                    $ctr = $res[0]->ctr;
                }
                $reference_data = array(
                    'report_id' => $this->security->xss_clean($report_id),
                    'rgv_report_type_id' => $this->security->xss_clean($rgv_report_type_id),
                    'year' => $this->security->xss_clean(date('Y')),
                    'month' => $this->security->xss_clean(date('m')),
                    'system_division_id' => $this->security->xss_clean($division_id),
                    'ctr' => $this->security->xss_clean(($ctr + 1)),
                    'created_by' => $this->security->xss_clean($this->input->post('digital_signature')),
                    'created_at' => $this->security->xss_clean(date('y-m-d H:i:s'))
                );

                $reference_id = $this->M_report_reference_numbers->insert($reference_data);
                if($reference_id<=0){
                    $response['status'] = 0;
                    $response['message'] = 'Something went wrong. Please contact your technical support. (2)';
                    return;
                }

                $victim_data = array(
                    'report_id' => $this->security->xss_clean($report_id),
                    'last_name' => $victim_last_name,
                    'first_name' => $victim_first_name,
                    'middle_name' => $victim_middle_name,
                    'rgv_age_bracket_id' => $this->security->xss_clean($this->input->post('rgv_age_bracket_id')),
                    'rgv_marital_status_id' =>  $this->security->xss_clean($this->input->post('rgv_marital_status_id')),
                    'rgv_sex_id' => $this->security->xss_clean($this->input->post('rgv_sex_id')),
                    'email' => $victim_email,
                    'mobile_number' => $victim_mobile,
                    'address1' => $this->security->xss_clean($this->input->post('address')),
                    'created_by' => $this->security->xss_clean($this->session->userdata('username')),
                    'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                );

                $victim_id = $this->M_victims->insert($victim_data);
                if($victim_id<=0){
                    $response['status'] = 0;
                    $response['message'] = 'Something went wrong. Please contact your technical support. (3)';
                    return;
                }

                $suspect_first_name = strtoupper($this->security->xss_clean($this->input->post('suspect_first_name')));
                $suspect_last_name = strtoupper($this->security->xss_clean($this->input->post('suspect_last_name')));
                $suspect_middle_name =  ($this->security->xss_clean($this->input->post('suspect_middle_name'))!=="" ? strtoupper($this->security->xss_clean($this->input->post('suspect_middle_name'))) : "");
                $suspect_business_name = $this->security->xss_clean($this->input->post('suspect_business_name'));
                $suspect_username = $this->security->xss_clean($this->input->post('suspect_username'));
                $ip_address = $this->security->xss_clean($this->input->post('ip_address'));
                $website = $this->security->xss_clean($this->input->post('website'));


                if($suspect_first_name!=="" || $suspect_last_name!=="" || $suspect_business_name!=="" || $suspect_username!=="" 
                    || $ip_address!=="" || $website!=="")
                {
                    $suspect_data = array(
                        'report_id' => $this->security->xss_clean($report_id),
                        'last_name' => $suspect_last_name,
                        'first_name' => $suspect_first_name,
                        'middle_name' => $suspect_middle_name,
                        'business_name' => $this->security->xss_clean($this->input->post('suspect_business_name')),
                        'alias' =>  $this->security->xss_clean($this->input->post('suspect_username')),
                        'ip_address' => $this->security->xss_clean($this->input->post('ip_address')),
                        'website_link' => $this->security->xss_clean($this->input->post('website')),
                        'created_by' => $this->security->xss_clean($this->session->userdata('username')),
                        'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                    );
    
                    $suspect_id = $this->M_suspects->insert($suspect_data);
                    if($suspect_id<=0){
                        $response['status'] = 0;
                        $response['message'] = 'Something went wrong. Please contact your technical support. (4)';
                        return;
                    }
                }

                $report_categories = $this->input->post('rgv_report_category');
                $report_categories_cnt = count($report_categories);
                if($report_categories_cnt>0){
                    for($i=0;$i<$report_categories_cnt;$i++){
                        $report_category_data = array(
                            'report_id' => $this->security->xss_clean($report_id),
                            'rgv_report_category_id' => $report_categories[$i],
                            'created_by' => $this->security->xss_clean($this->session->userdata('username')),
                            'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                        );

                        $report_category_id = $this->M_report_assessments->insert($report_category_data);
                        if($report_category_id<=0){
                            $response['status'] = 0;
                            $response['message'] = 'Something went wrong. Please contact your technical support. (5)';
                            return;
                        }
                        
                    }
                }

                $report_statuses = $this->input->post('report_status');
                $report_status_cnt = count($report_statuses);
                if($report_status_cnt>0){
                    for($i=0;$i<$report_status_cnt;$i++){

                        $report_status_data = array(
                            'report_id' => $this->security->xss_clean($report_id),
                            'status' => $report_statuses[$i],
                            'created_by' => $this->security->xss_clean($this->session->userdata('username')),
                            'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                        );

                        $report_status_id = $this->M_report_statuses->insert($report_status_data);
                        if($report_status_id<=0){
                            $response['status'] = 0;
                            $response['message'] = 'Something went wrong. Please contact your technical support. (6)';
                            return;
                        }
                        
                    }
                }

            }
        }

        echo json_encode($response);
        return;
	}

    public function edit($id){
        if (!($this->session->userdata('username')))
		{
		    redirect('auth'); 
        }

        $data['page_info'] = array(
            'page_title' => 'CICC - Edit a Complaint',
            'system_web_module' => 'Complaints',
            'system_web_section' => '',
            'system_task' => '',
            'system_active_tab' => '',
            'styles_path' => array(
                'assets/libs/select2/dist/css/select2.min.css',
                // 'assets/extra-libs/DataTables/DataTables-1.12.1/css/dataTables.jqueryui.css',
                // 'assets/extra-libs/DataTables/Buttons-2.2.3/css/buttons.dataTables.min.css'
            ),
            'scripts_path' => array(
                'assets/libs/select2/dist/js/select2.full.min.js',
                'assets/libs/select2/dist/js/select2.min.js',
                'assets/vendor/php-email-form/validate.js',
                'assets/js/pages/complaint/edit.js'
            )
        );

        $data['report_types'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Report Type',0,0);
        $data['transaction_types'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Transaction Types',0,0);
        $data['offenses'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Offenses',0,0);
        $data['report_statuses'] = $this->M_report_statuses->getAllGrouped();
        $data['age_brackets'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Age Bracket',0,0);
		$data['sexes'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Sex',0,0);
		$data['marital_statuses'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Marital Status',0,0);
        $data['countries'] = $this->M_system_reference_countries->getAll();
        $data['case_officers'] = $this->M_system_user->getAllByDepartmentDivision($this->session->userdata('department_id'),$this->session->userdata('division_id'));
        $data['report'] = $this->M_reports->get($id);
        $data['report_categories'] = $this->M_report_assessments->getByReportID($id);
        $victim = $this->M_victims->getByReportID($id);
        $data['victim'] = $victim;
        $data['witness'] = $this->M_witnesses->getByReportID($id);
        $data['suspects'] = $this->M_suspects->getByReportID($id);
        $data['financial_transactions'] = $this->M_victim_financial_transactions->getByVictimID($victim[0]->id);
        $this->load->view('_includes/header', $data);
        $this->load->view('_includes/topbar', $data);
        $this->load->view('_includes/side-nav', $data);
        $this->load->view('pages/complaint/edit', $data);
        $this->load->view('_includes/customizer', $data);
        $this->load->view('_includes/footer', $data);

    }

    public function update()
	{
        $response['status'] = 0;
        $response['message'] = 'Something went wrong. Please contact your technical support. (0)';

        $report_id = $this->input->post('id');
        $report_categories = $this->input->post('rgv_report_category');
        $report_categories_cnt = count($report_categories);


        if($report_categories_cnt>0){
            for($i=0;$i<$report_categories_cnt;$i++){
                
                $cat = $this->M_report_assessments->getByReportIDCategoryID($report_id,$report_categories[$i]);
                
                if(empty($cat)){
                    $report_category_data = array(
                        'report_id' => $this->security->xss_clean($report_id),
                        'rgv_report_category_id' => $report_categories[$i],
                        'created_by' => $this->security->xss_clean($this->session->userdata('username')),
                        'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                    );
    
                    $report_category_id = $this->M_report_assessments->insert($report_category_data);
                    if($report_category_id<=0){
                        $response['status'] = 0;
                        $response['message'] = 'Something went wrong. Please contact your technical support. (5)';
                        return;
                    }
                }


                
                
            }
        }

        $categories = [];
        if($report_categories_cnt>0){
            for($i=0;$i<$report_categories_cnt;$i++){
                array_push($categories,$report_categories[$i]);
            }
        }

        $cntr = 0;
        $ctgrs = $this->M_report_assessments->getByReportID($report_id);
        if(in_array($categories,$ctgrs)){
            $cntr = $cntr + 1;
        }
        $response['ctgrs'] = $ctgrs;
        $response['categories'] = $categories;
        $response['cntr'] = $cntr;
        echo json_encode($response);

        return;


        if($this->input->post()){

            $response['status'] = 0;
            $response['message'] = 'Please complete the required fields first and try again! (1)';

            $id = $this->security->xss_clean($this->input->post('id'));
            $reference_number = $this->security->xss_clean($this->input->post('reference_number'));
            $rgv_report_type_id = $this->security->xss_clean($this->input->post('rgv_report_type_id'));
            $date_received = $this->security->xss_clean($this->input->post('date_received'));
            $time_received = ($this->input->post('time_received')!=="") ? $this->security->xss_clean(date('H:i:s', strtotime($this->input->post('time_received')))) : '';
            $officer_on_case = $this->security->xss_clean($this->input->post('officer_on_case'));
            $description_of_incident = $this->security->xss_clean($this->input->post('description_of_incident'));
            $actions_taken = $this->security->xss_clean($this->input->post('actions_taken'));
            
            $victim_first_name = strtoupper($this->security->xss_clean($this->input->post('first_name')));
            $victim_last_name = strtoupper($this->security->xss_clean($this->input->post('last_name')));
            $victim_middle_name =  ($this->security->xss_clean($this->input->post('middle_name'))!=="" ? strtoupper($this->security->xss_clean($this->input->post('middle_name'))) : "");
            $victim_email = $this->security->xss_clean($this->input->post('email'));
            $victim_mobile = $this->security->xss_clean($this->input->post('mobile_number'));
            
            if($rgv_report_type_id!=="" && $date_received!=="" && $description_of_incident!=="" 
                && $actions_taken!=="" && $victim_first_name!=="" && $victim_last_name!==""
                && $victim_email!=="" && $victim_mobile!=="")
            {

                $response['status'] = 1;
                $response['message'] = 'Report Submitted Successfully!';

                // $report_data = array(
                //     'reference_number' => $reference_number,
                //     'rgv_report_type_id' => $rgv_report_type_id,
                //     'date_received' => $date_received,
                //     'time_received' => $time_received,
                //     'report_modus' => $this->security->xss_clean($this->input->post('report_modus')),
                //     'report_group' =>  $this->security->xss_clean($this->input->post('report_group')),
                //     'description_of_incident' => $description_of_incident,
                //     'digital_signature' => $this->security->xss_clean($this->input->post('digital_signature')),
                //     'officer_on_case' => $this->security->xss_clean($this->input->post('officer_on_case')),
                //     'actions_taken' => $this->security->xss_clean($this->input->post('actions_taken')),
                //     'after_status_report' => $this->security->xss_clean($this->input->post('after_status_report')),
                //     'updated_by' => $this->security->xss_clean($this->session->userdata('username')),
                //     'updated_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                // );

                // $report_id = $this->M_reports->update($id, $report_data);
                // if($report_id<=0){
                //     $response['status'] = 0;
                //     $response['message'] = 'Something went wrong. Please contact your technical support. (1)';
                //     return;
                // }

                // $victim_id = $this->security->xss_clean($this->input->post('victim_id'));
                // $victim_data = array(
                //     'report_id' => $this->security->xss_clean($report_id),
                //     'last_name' => $victim_last_name,
                //     'first_name' => $victim_first_name,
                //     'middle_name' => $victim_middle_name,
                //     'rgv_age_bracket_id' => $this->security->xss_clean($this->input->post('rgv_age_bracket_id')),
                //     'rgv_marital_status_id' =>  $this->security->xss_clean($this->input->post('rgv_marital_status_id')),
                //     'rgv_sex_id' => $this->security->xss_clean($this->input->post('rgv_sex_id')),
                //     'email' => $victim_email,
                //     'mobile_number' => $victim_mobile,
                //     'is_in_behalf_of_business' => $this->security->xss_clean($this->input->post('is_in_behalf_of_business')),
                //     'is_impacting_business_operations' => $this->security->xss_clean($this->input->post('is_impacting_business_operations')),
                //     'business_name' => $this->security->xss_clean($this->input->post('business_name')),
                //     'country' => $this->security->xss_clean($this->input->post('country')),
                //     'province' => $this->security->xss_clean($this->input->post('province')),
                //     'city' => $this->security->xss_clean($this->input->post('city')),
                //     'address1' => $this->security->xss_clean($this->input->post('address')),
                //     'zip_code' => $this->security->xss_clean($this->input->post('zip_code')),
                //     'business_it_poc' => $this->security->xss_clean($this->input->post('business_it_poc')),
                //     'other_busines_poc' => $this->security->xss_clean($this->input->post('other_busines_poc')),
                //     'updated_by' => $this->security->xss_clean($this->session->userdata('username')),
                //     'updated_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                // );

                // $victim_id = $this->M_victims->update($victim_id,$victim_data);
                // if($victim_id<=0){
                //     $response['status'] = 0;
                //     $response['message'] = 'Something went wrong. Please contact your technical support. (2)';
                //     return;
                // }

                // $s_ctr = $this->security->xss_clean($this->input->post('s_ctr'));
                // for($s=1;$s<=$s_ctr;$s++){
                //     $suspect_id = $this->security->xss_clean($this->input->post('s_id_'.$s));
                //     $suspect_first_name = strtoupper($this->security->xss_clean($this->input->post('s_first_name_'.$s)));
                //     $suspect_middle_name =  ($this->security->xss_clean($this->input->post('s_middle_name_'.$s))!=="" ? strtoupper($this->security->xss_clean($this->input->post('s_middle_name_'.$s))) : "");
                //     $suspect_last_name = strtoupper($this->security->xss_clean($this->input->post('s_last_name_'.$s)));
                //     $suspect_business_name = $this->security->xss_clean($this->input->post('s_business_name_'.$s));
                //     $suspect_ip_address = $this->security->xss_clean($this->input->post('s_ip_address_'.$s));
                //     $suspect_website = $this->security->xss_clean($this->input->post('s_website_'.$s));
                //     $suspect_mobile_number = $this->security->xss_clean($this->input->post('s_mobile_number_'.$s));
                //     $suspect_email = $this->security->xss_clean($this->input->post('s_email_'.$s));
                //     $suspect_country = $this->security->xss_clean($this->input->post('s_country_'.$s));
                //     $suspect_province = $this->security->xss_clean($this->input->post('s_province_'.$s));
                //     $suspect_city = $this->security->xss_clean($this->input->post('s_city_'.$s));
                //     $suspect_address = $this->security->xss_clean($this->input->post('s_address_'.$s));
                //     $suspect_zip_code = $this->security->xss_clean($this->input->post('s_zip_code_'.$s));

                //     if($suspect_first_name!=="" || $suspect_middle_name!=="" || $suspect_last_name!=="" || $suspect_business_name!=="" 
                //         || $suspect_ip_address!=="" || $suspect_website!=="" || $suspect_mobile_number!=="" || $suspect_email!==""
                //         || $suspect_country!=="" || $suspect_province!=="" || $suspect_city!=="" || $suspect_address!=="" || $suspect_zip_code!==""
                //     ){
                //         if($suspect_id>0){
                //             $suspect_data = array(
                //                 'report_id' => $report_id,
                //                 'last_name' => $suspect_last_name,
                //                 'first_name' => $suspect_first_name,
                //                 'middle_name' => $suspect_middle_name,
                //                 'business_name' => $suspect_business_name,
                //                 'email' => $suspect_email,
                //                 'mobile_number' => $suspect_mobile_number,
                //                 'address1' => $suspect_address,
                //                 'country' => $suspect_country,
                //                 'province' => $suspect_province,
                //                 'city' => $suspect_city,
                //                 'zip_code' => $suspect_zip_code,
                //                 'website_link' => $suspect_website,
                //                 'ip_address' => $suspect_ip_address,
                //                 'updated_by' => $this->security->xss_clean($this->session->userdata('username')),
                //                 'updated_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                //             );

                //             $suspect_id = $this->M_suspects->update($suspect_id,$suspect_data);
                //             if($suspect_id<=0){
                //                 $response['status'] = 0;
                //                 $response['message'] = 'Something went wrong. Please contact your technical support. (3)';
                //                 return;
                //             }

                //         }else{
                //             $suspect_data = array(
                //                 'report_id' => $report_id,
                //                 'last_name' => $suspect_last_name,
                //                 'first_name' => $suspect_first_name,
                //                 'middle_name' => $suspect_middle_name,
                //                 'business_name' => $suspect_business_name,
                //                 'email' => $suspect_email,
                //                 'mobile_number' => $suspect_mobile_number,
                //                 'address1' => $suspect_address,
                //                 'country' => $suspect_country,
                //                 'province' => $suspect_province,
                //                 'city' => $suspect_city,
                //                 'zip_code' => $suspect_zip_code,
                //                 'website_link' => $suspect_website,
                //                 'ip_address' => $suspect_ip_address,
                //                 'created_by' => $this->security->xss_clean($this->session->userdata('username')),
                //                 'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                //             );

                //             $suspect_id = $this->M_suspects->insert($suspect_data);
                //             if($suspect_id<=0){
                //                 $response['status'] = 0;
                //                 $response['message'] = 'Something went wrong. Please contact your technical support. (4)';
                //                 return;
                //             }
                //         }
                //     }
                // }

                // $ft_ctr = $this->security->xss_clean($this->input->post('ft_ctr'));
                // for($f=1;$f<=$ft_ctr;$f++){
                //     $ft_id = $this->security->xss_clean($this->input->post('ft_id_'.$f));
                //     $ft_rgv_transaction_type_id = $this->security->xss_clean($this->input->post('ft_rgv_transaction_type_id_'.$f));
                //     $ft_others = $this->security->xss_clean($this->input->post('ft_others_'.$f));
                //     $ft_is_others = ($ft_others!=="" ? 1 : 0);
                //     $ft_transaction_date = ($this->input->post('ft_transaction_date_'.$f)!=="") ? $this->security->xss_clean(date('y-m-d', strtotime($this->input->post('ft_transaction_date_'.$f)))) : '';
                //     $ft_is_sent = $this->security->xss_clean($this->input->post('ft_is_sent_'.$f));
                //     $ft_amount = $this->security->xss_clean($this->input->post('ft_amount_'.$f));
                    
                //     $ft_sender_bank_name = $this->security->xss_clean($this->input->post('ft_s_bank_name_'.$f));
                //     $ft_sender_account_name = $this->security->xss_clean($this->input->post('ft_s_account_name_'.$f));
                //     $ft_sender_account_no = $this->security->xss_clean($this->input->post('ft_s_account_no_'.$f));
                //     $ft_sender_country = $this->security->xss_clean($this->input->post('ft_s_country_'.$f));
                //     $ft_sender_province = $this->security->xss_clean($this->input->post('ft_s_province_'.$f));
                //     $ft_sender_city = $this->security->xss_clean($this->input->post('ft_s_city_'.$f));
                //     $ft_sender_zip_code = $this->security->xss_clean($this->input->post('ft_s_zip_code_'.$f));
                //     $ft_sender_address = $this->security->xss_clean($this->input->post('ft_s_address_'.$f));

                //     $ft_recepient_bank_name = $this->security->xss_clean($this->input->post('ft_r_bank_name_'.$f));
                //     $ft_recepient_account_name = $this->security->xss_clean($this->input->post('ft_r_account_name_'.$f));
                //     $ft_recepient_account_no = $this->security->xss_clean($this->input->post('ft_r_account_no_'.$f));
                //     $ft_recepient_country = $this->security->xss_clean($this->input->post('ft_r_country_'.$f));
                //     $ft_recepient_province = $this->security->xss_clean($this->input->post('ft_r_province_'.$f));
                //     $ft_recepient_city = $this->security->xss_clean($this->input->post('ft_r_city_'.$f));
                //     $ft_recepient_zip_code = $this->security->xss_clean($this->input->post('ft_r_zip_code_'.$f));
                //     $ft_recepient_address = $this->security->xss_clean($this->input->post('ft_r_address_'.$f));

                //     if($ft_rgv_transaction_type_id!=="")
                //     {  
                //         if($ft_id>0){
                //             $financial_transaction_data = array(
                //                 'victim_id' => $victim_id,
                //                 'transaction_date' => $ft_transaction_date,
                //                 'rgv_transaction_type_id' => $ft_rgv_transaction_type_id,
                //                 'is_others' => $ft_is_others,
                //                 'others' => $ft_others,
                //                 'amount' => $ft_amount,
                //                 'is_sent' => $ft_is_sent,
                //                 'victim_bank_name' => $ft_sender_bank_name,
                //                 'victim_bank_address1' => $ft_sender_address,
                //                 'victim_bank_country' => $ft_sender_country,
                //                 'victim_bank_province' => $ft_sender_province,
                //                 'victim_bank_city' => $ft_sender_city,
                //                 'victim_bank_zip_code' => $ft_sender_zip_code,
                //                 'victim_account_name' => $ft_sender_account_name,
                //                 'victim_account_number' => $ft_sender_account_no,
                //                 'receipient_bank_name' => $ft_recepient_bank_name,
                //                 'receipient_bank_address1' => $ft_recepient_address,
                //                 'receipient_bank_country' => $ft_recepient_country,
                //                 'receipient_bank_province' => $ft_recepient_province,
                //                 'receipient_bank_city' => $ft_recepient_city,
                //                 'receipient_bank_zip_code' => $ft_recepient_zip_code,
                //                 'receipient_account_name' => $ft_recepient_account_name,
                //                 'receipient_account_number' => $ft_recepient_account_no,
                //                 'updated_by' => $this->security->xss_clean($this->session->userdata('username')),
                //                 'updated_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                //             );  

                //             $financial_transaction_id = $this->M_victim_financial_transactions->update($ft_id,$financial_transaction_data);
                //             if($financial_transaction_id<=0){
                //                 $response['status'] = 0;
                //                 $response['message'] = 'Something went wrong. Please contact your technical support. (5)';
                //                 return;
                //             }

                //         }else{
                //             $financial_transaction_data = array(
                //                 'victim_id' => $victim_id,
                //                 'transaction_date' => $ft_transaction_date,
                //                 'rgv_transaction_type_id' => $ft_rgv_transaction_type_id,
                //                 'is_others' => $ft_is_others,
                //                 'others' => $ft_others,
                //                 'amount' => $ft_amount,
                //                 'is_sent' => $ft_is_sent,
                //                 'victim_bank_name' => $ft_sender_bank_name,
                //                 'victim_bank_address1' => $ft_sender_address,
                //                 'victim_bank_country' => $ft_sender_country,
                //                 'victim_bank_province' => $ft_sender_province,
                //                 'victim_bank_city' => $ft_sender_city,
                //                 'victim_bank_zip_code' => $ft_sender_zip_code,
                //                 'victim_account_name' => $ft_sender_account_name,
                //                 'victim_account_number' => $ft_sender_account_no,
                //                 'receipient_bank_name' => $ft_recepient_bank_name,
                //                 'receipient_bank_address1' => $ft_recepient_address,
                //                 'receipient_bank_country' => $ft_recepient_country,
                //                 'receipient_bank_province' => $ft_recepient_province,
                //                 'receipient_bank_city' => $ft_recepient_city,
                //                 'receipient_bank_zip_code' => $ft_recepient_zip_code,
                //                 'receipient_account_name' => $ft_recepient_account_name,
                //                 'receipient_account_number' => $ft_recepient_account_no,
                //                 'created_by' => $this->security->xss_clean($this->session->userdata('username')),
                //                 'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                //             );

                //             $financial_transaction_id = $this->M_victim_financial_transactions->insert($financial_transaction_data);
                //             if($financial_transaction_id<=0){
                //                 $response['status'] = 0;
                //                 $response['message'] = 'Something went wrong. Please contact your technical support. (6)';
                //                 return;
                //             }
                //         }
                //     }
                // }

                // $report_categories = $this->input->post('rgv_report_category');
                // $report_categories_cnt = count($report_categories);
                // $categories = [];
                // if($report_categories_cnt>0){
                //     for($i=0;$i<$report_categories_cnt;$i++){
                //         array_push($categories,$report_categories[$i]);
                //     }
                // }

                // $ctgrs = $this->M_report_assessments->getByReportID($report_id);
                // echo json_encode($ctgrs);

                // if($report_categories_cnt>0){
                //     for($i=0;$i<$report_categories_cnt;$i++){
                //         $report_category_data = array(
                //             'report_id' => $this->security->xss_clean($report_id),
                //             'rgv_report_category_id' => $report_categories[$i],
                //             'created_by' => $this->security->xss_clean($this->session->userdata('username')),
                //             'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                //         );

                //         $report_category_id = $this->M_report_assessments->insert($report_category_data);
                //         if($report_category_id<=0){
                //             $response['status'] = 0;
                //             $response['message'] = 'Something went wrong. Please contact your technical support. (5)';
                //             return;
                //         }
                        
                //     }
                // }

                // $report_statuses = $this->input->post('report_status');
                // $report_status_cnt = count($report_statuses);
                // if($report_status_cnt>0){
                //     for($i=0;$i<$report_status_cnt;$i++){

                //         $report_status_data = array(
                //             'report_id' => $this->security->xss_clean($report_id),
                //             'status' => $report_statuses[$i],
                //             'created_by' => $this->security->xss_clean($this->session->userdata('username')),
                //             'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
                //         );

                //         $report_status_id = $this->M_report_statuses->insert($report_status_data);
                //         if($report_status_id<=0){
                //             $response['status'] = 0;
                //             $response['message'] = 'Something went wrong. Please contact your technical support. (6)';
                //             return;
                //         }
                        
                //     }
                // }

            }
        }

        // echo json_encode($response);
        // return;
	}

    public function delete($id)
	{
        $response['status'] = 1;
        $response['message'] = 'Deleted successfully!';

        $data = array(
            'deleted_by' => $this->security->xss_clean($this->session->userdata('username')),
            'deleted_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
        );

        $id = $this->M_reports->delete($id, $data);

        if ($id <= 0) {
            $response['status'] = 0;
            $response['message'] = 'Something went wrong. Please contact your technical support.';

            echo json_encode($response);
            return;
        }

        echo json_encode($response);
	}

    public function generateReferenceNumber($rgv_report_type_id, $division_id){

        $report_type = $this->M_system_reference_group_values->get($rgv_report_type_id);
        $report_code = $report_type[0]->code;
        $division = $this->M_system_divisions->get($division_id);
        $division_code = $division[0]->code;
        $year = date('Y');
        $month = date('m');
        $res = $this->M_report_reference_numbers->getBy_ReportTypeIDDivisionID($rgv_report_type_id, $division_id);
        $ctr = 0;
        if($res){
            $ctr = $res[0]->ctr;
        }
        $reference_number = $division_code . "-" . $report_code . "-" . (string)$year . "-" . (string)$month . "000" . (string)($ctr + 1);
        return $reference_number;
    }


    // public function getAll(){
    //     $response['status'] = 1;
    //     $response['message'] = 'Migrated successfully!';

    //     $division_id = 3; // Investigation Division
    //     $rgv_report_type_id = 58; // Online Complaint
    //     $toMigrate = $this->M_to_migrate->getAll();
    //     foreach($toMigrate as $key => $value){
    //         // echo json_encode(date('y-m-d', strtotime($value->date_received)));
    //         $reference_number = $this->generateReferenceNumber($rgv_report_type_id, $division_id);
    //         $report_data = array(
    //             'date_received' => date('y-m-d', strtotime($value->date_received)),
    //             'reference_number' => $reference_number,
    //             'description_of_incident' => $value->complaint,
    //             'actions_taken' => $value->actions_taken,
    //             'remarks' => $value->category,
    //             'created_by' => 'mazores-Migrate',
    //             'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
    //         );

    //         $report_id = $this->M_reports->insert($report_data);
    //         if ($report_id <= 0) {
    //             $response['status'] = 0;
    //             $response['message'] = 'Something went wrong. Please contact your technical support. (report)';
    //             echo json_encode($response);
    //             return;
    //         }

    //         $res = $this->M_report_reference_numbers->getBy_ReportTypeIDDivisionID($rgv_report_type_id, $division_id);
    //         $ctr = 0;
    //         if($res){
    //             $ctr = $res[0]->ctr;
    //         }

    //         $reference_data = array(
    //             'report_id' => $this->security->xss_clean($report_id),
    //             'rgv_report_type_id' => $this->security->xss_clean($rgv_report_type_id),
    //             'year' => $this->security->xss_clean(date('Y')),
    //             'month' => $this->security->xss_clean(date('m')),
    //             'system_division_id' => $this->security->xss_clean($division_id),
    //             'ctr' => $this->security->xss_clean(($ctr + 1)),
    //             'created_by' => 'mazores-Migrate',
    //             'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
    //         );

    //         $reference_id = $this->M_report_reference_numbers->insert($reference_data);
    //         if ($reference_id <= 0) {
    //             $response['status'] = 0;
    //             $response['message'] = 'Something went wrong. Please contact your technical support. (reference)';
    //             echo json_encode($response);
    //             return;
    //         }

    //         $sex = 0;
    //         if($value->sex=="M")
    //             $sex = 2;
    //         elseif($value->sex=="F")
    //             $sex = 1;
    //         else
    //             $sex = 0;

    //         $victim_data = array(
    //             'report_id' => $report_id,
    //             'first_name' => $value->complainant,
    //             'email' => $value->email,
    //             'rgv_sex_id' => $sex,
    //             'remarks' => $value->age,
    //             'mobile_number' => $value->mobile_number,
    //             'created_by' => 'mazores-Migrate',
    //             'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
    //         );

    //         $victim_id = $this->M_victims->insert($victim_data);
    //         if ($victim_id <= 0) {
    //             $response['status'] = 0;
    //             $response['message'] = 'Something went wrong. Please contact your technical support. (victim)';
    //             echo json_encode($response);
    //             return;
    //         }

    //         if($value->suspect_name!==""){
    //             $suspect_data = array(
    //                 'report_id' => $report_id,
    //                 'first_name' => $value->suspect_name,
    //                 'created_by' => 'mazores-Migrate',
    //                 'created_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
    //             );
    
    //             $suspect_id = $this->M_suspects->insert($suspect_data);
    
    //             if ($suspect_id <= 0) {
    //                 $response['status'] = 0;
    //                 $response['message'] = 'Something went wrong. Please contact your technical support. (suspect)';
    //                 echo json_encode($response);
    //                 return;
    //             }
    
    //         }
            
    //     }

    //     echo json_encode($response);
        
    // }

}
