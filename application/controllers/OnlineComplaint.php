<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Manila');

class OnlineComplaint extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        // References: Groups and Values
        $this->load->model('System_reference_groups_model','M_system_reference_groups');
        $this->load->model('System_reference_group_values_model','M_system_reference_group_values');
        
        // References: Location
        $this->load->model('System_reference_regions_model','M_system_reference_regions');
        $this->load->model('System_reference_countries_model','M_system_reference_countries');
        $this->load->model('System_reference_provinces_model','M_system_reference_provinces');
        $this->load->model('System_reference_cities_model','M_system_reference_cities');

        // Reference: Department & Division
        $this->load->model('System_departments_model','M_system_departments');
        $this->load->model('System_divisions_model','M_system_divisions');

        // Page References
        $this->load->model('Report_reference_numbers_model','M_report_reference_numbers');
        $this->load->model('Reports_model','M_reports');
        $this->load->model('Victims_model','M_victims');
        $this->load->model('Witnesses_model','M_witnesses');
        $this->load->model('Suspects_model','M_suspects');
        $this->load->model('Victim_financial_transactions_model','M_victim_financial_transactions');
        $this->load->model('Report_attachments_model','M_report_attachments');

    }

	public function index()
	{
        if ($this->session->userdata('is_userAgree')) {
            redirect("/OnlineComplaint/create", 'refresh');
        }

        $data['page_info'] = array (
            'page_title' => 'CICC - Privacy Statement'
        );

		$this->load->view('pages/online_complaint/index', $data);
	}

    public function userAgree()
	{
        if($this->input->post()){
            
            $user_data = array(
                'is_userAgree' => TRUE
            );

            $this->session->set_userdata($user_data);
            redirect("/OnlineComplaint/create", 'refresh');
        }
        
		redirect("OnlineComplaint");
	}

    public function create(){

        if (!$this->session->userdata('is_userAgree')) {
            redirect("OnlineComplaint");
        }

        $data['page_info'] = array (
            'page_title' => 'CICC - File a complaint'
        );

		$data['age_brackets'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Age Bracket',0,0);
		$data['sexes'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Sex',0,0);
		$data['marital_statuses'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Marital Status',0,0);
        $data['countries'] = $this->M_system_reference_countries->getAll();
        	
		$this->load->view('pages/online_complaint/create', $data);
    }

    public function insert(){

        $response['status'] = 0;
        $response['message'] = 'Something went wrong. Please contact your technical support.(0)';

        if($this->input->post()){

            $f_name = $this->security->xss_clean($this->input->post('first_name'));
            $l_name = $this->security->xss_clean($this->input->post('last_name'));
            $rgv_age_bracket = $this->security->xss_clean($this->input->post('rgv_age_bracket_id'));
            $rgv_sex = $this->security->xss_clean($this->input->post('rgv_sex_id'));
            $rgv_marital_status = $this->security->xss_clean($this->input->post('rgv_marital_status_id'));
            $m_num = $this->security->xss_clean($this->input->post('mobile_number'));
            $e_add = $this->security->xss_clean($this->input->post('email'));
            $coun = $this->security->xss_clean($this->input->post('country'));
            $prov = $this->security->xss_clean($this->input->post('province'));
            $cty = $this->security->xss_clean($this->input->post('city'));
            $add = $this->security->xss_clean($this->input->post('address'));
            $d_of_incident = $this->security->xss_clean($this->input->post('digital_signature'));
            $d_signature = $this->security->xss_clean($this->input->post('description_of_incident'));
            
            if($f_name!==""
                && $l_name!==""
                && $rgv_age_bracket!==""
                && $rgv_sex!==""
                && $rgv_marital_status!==""
                && $m_num!==""
                && $e_add!==""
                && $coun!==""
                && $prov!==""
                && $cty!==""
                && $add!==""
                && $d_of_incident!=""
                && $d_signature!=""){

                $division_id = 3; // Investigation Division
                $rgv_report_type_id = 58; // Online Complaint

                $response['status'] = 1;
                $response['message'] = 'Report Submitted Successfully!';
                $path = "";

                $reference_number = $this->generateReferenceNumber($rgv_report_type_id, $division_id);

                // Report Insert
                $report_data = array(
                    'reference_number' => $this->security->xss_clean(strtoupper($reference_number)),
                    'date_received' => $this->security->xss_clean(date('y-m-d')),
                    'time_received' => $this->security->xss_clean(date('H:i:s')),
                    'rgv_report_type_id' => $this->security->xss_clean($rgv_report_type_id),
                    'description_of_incident' => $this->security->xss_clean($this->input->post('description_of_incident')),
                    'digital_signature' => $this->security->xss_clean(strtoupper($this->input->post('digital_signature'))),
                    'created_by' => $this->security->xss_clean($this->input->post('digital_signature')),
                    'created_at' => $this->security->xss_clean(date('Y-m-d H:i:s'))
                );

                $report_id = $this->M_reports->insert($report_data);
                if($report_id<=0){
                    $response['status'] = 0;
                    $response['message'] = 'Something went wrong. Please contact your technical support.(1)';
                    return;
                }

                // Report Reference Number Insert
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
                    'created_at' => $this->security->xss_clean(date('Y-m-d H:i:s'))
                );

                $reference_id = $this->M_report_reference_numbers->insert($reference_data);
                if($reference_id<=0){
                    $response['status'] = 0;
                    $response['message'] = 'Something went wrong. Please contact your technical support.(2)';
                    return;
                }

                // Victim Insert
                $victim_data = array(
                    'report_id' => $this->security->xss_clean($report_id),
                    'last_name' => $this->security->xss_clean(strtoupper($this->input->post('last_name'))),
                    'first_name' => $this->security->xss_clean(strtoupper($this->input->post('first_name'))),
                    'middle_name' => $this->security->xss_clean(strtoupper($this->input->post('middle_name'))),
                    'is_in_behalf_of_business' => $this->security->xss_clean($this->input->post('is_in_behalf_of_business')),
                    'business_name' => $this->security->xss_clean(strtoupper($this->input->post('business_name'))),
                    'is_impacting_business_operations' => $this->security->xss_clean($this->input->post('is_impacting_business_operations')),
                    'rgv_age_bracket_id' => $this->security->xss_clean($this->input->post('rgv_age_bracket_id')),
                    'rgv_marital_status_id' => $this->security->xss_clean($this->input->post('rgv_marital_status_id')),
                    'rgv_sex_id' => $this->security->xss_clean($this->input->post('rgv_sex_id')),
                    'email' => $this->security->xss_clean($this->input->post('email')),
                    'mobile_number' => $this->security->xss_clean($this->input->post('mobile_number')),
                    'address1' => $this->security->xss_clean(strtoupper($this->input->post('address'))),
                    'country' => $this->security->xss_clean(strtoupper($this->input->post('country'))),
                    'province' => $this->security->xss_clean(strtoupper($this->input->post('province'))),
                    'city' => $this->security->xss_clean(strtoupper($this->input->post('city'))),
                    'zip_code' => $this->security->xss_clean($this->input->post('zip_code')),
                    'business_it_poc' => $this->security->xss_clean($this->input->post('business_it_poc')),
                    'other_busines_poc' => $this->security->xss_clean($this->input->post('other_busines_poc')),
                    'created_by' => $this->security->xss_clean($this->input->post('digital_signature')),
                    'created_at' => $this->security->xss_clean(date('Y-m-d H:i:s'))
                );

                $victim_id = $this->M_victims->insert($victim_data);
                if($victim_id<=0){
                    $response['status'] = 0;
                    $response['message'] = 'Something went wrong. Please contact your technical support.(3)';
                    return;
                }

                $w_last_name = $this->security->xss_clean($this->input->post('w_last_name'));
                $w_first_name = $this->security->xss_clean($this->input->post('w_first_name'));
                $w_mobile = $this->security->xss_clean($this->input->post('w_mobile_number'));
                $w_email = $this->security->xss_clean($this->input->post('w_email'));
                if($w_last_name!==""
                    || $w_first_name!==""
                    || $w_mobile!==""
                    || $w_email!==""){

                    // Witness Insert
                    $witness_data = array(
                        'report_id' => $this->security->xss_clean($report_id),
                        'last_name' => $this->security->xss_clean(strtoupper($this->input->post('w_last_name'))),
                        'first_name' => $this->security->xss_clean(strtoupper($this->input->post('w_first_name'))),
                        'middle_name' => $this->security->xss_clean(strtoupper($this->input->post('w_middle_name'))),
                        'rgv_age_bracket_id' => $this->security->xss_clean($this->input->post('w_rgv_age_bracket_id')),
                        'rgv_marital_status_id' => $this->security->xss_clean($this->input->post('w_rgv_marital_status_id')),
                        'rgv_sex_id' => $this->security->xss_clean($this->input->post('w_rgv_sex_id')),
                        'email' => $this->security->xss_clean($this->input->post('w_email')),
                        'mobile_number' => $this->security->xss_clean($this->input->post('w_mobile_number')),
                        'address1' => $this->security->xss_clean(strtoupper($this->input->post('w_address'))),
                        'country' => $this->security->xss_clean(strtoupper($this->input->post('w_country'))),
                        'province' => $this->security->xss_clean(strtoupper($this->input->post('w_province'))),
                        'city' => $this->security->xss_clean(strtoupper($this->input->post('w_city'))),
                        'zip_code' => $this->security->xss_clean($this->input->post('w_zip_code')),
                        'created_by' => $this->security->xss_clean($this->input->post('digital_signature')),
                        'created_at' => $this->security->xss_clean(date('Y-m-d H:i:s'))
                    );

                    $witness_id = $this->M_witnesses->insert($witness_data);
                    if($witness_id<=0){
                        $response['status'] = 0;
                        $response['message'] = 'Something went wrong. Please contact your technical support.(4)';
                        return;
                    }
                    
                }

                // Suspects Insert
                $s_ctr = $this->security->xss_clean($this->input->post('s_ctr'));
                if($s_ctr>0){
                    for($i=1;$i<=$s_ctr;$i++){
                        $suspect_data = array(
                            'report_id' => $this->security->xss_clean($report_id),
                            'last_name' => $this->security->xss_clean(strtoupper($this->input->post('s_last_name_'.$i))),
                            'first_name' => $this->security->xss_clean(strtoupper($this->input->post('s_first_name_'.$i))),
                            'middle_name' => $this->security->xss_clean(strtoupper($this->input->post('s_middle_name_'.$i))),
                            'business_name' => $this->security->xss_clean(strtoupper($this->input->post('s_business_name_'.$i))),
                            'ip_address' => $this->security->xss_clean($this->input->post('s_ip_address_'.$i)),
                            'website_link' => $this->security->xss_clean($this->input->post('s_website_'.$i)),
                            'mobile_number' => $this->security->xss_clean($this->input->post('s_mobile_number_'.$i)),
                            'email' => $this->security->xss_clean($this->input->post('s_email_'.$i)),
                            'country' => $this->security->xss_clean(strtoupper($this->input->post('s_country_'.$i))),
                            'province' => $this->security->xss_clean(strtoupper($this->input->post('s_province_'.$i))),
                            'city' => $this->security->xss_clean(strtoupper($this->input->post('s_city_'.$i))),
                            'address1' => $this->security->xss_clean(strtoupper($this->input->post('s_address_'.$i))),
                            'zip_code' => $this->security->xss_clean($this->input->post('s_zip_code_'.$i)),
                            'created_by' => $this->security->xss_clean($this->input->post('digital_signature')),
                            'created_at' => $this->security->xss_clean(date('Y-m-d H:i:s'))
                        );

                        $suspect_id = $this->M_suspects->insert($suspect_data);
                        if($suspect_id<=0){
                            $response['status'] = 0;
                            $response['message'] = 'Something went wrong. Please contact your technical support.(5)';
                            return;
                        }
                    }
                }

                // Financial Transactions Insert
                $ft_ctr = $this->security->xss_clean($this->input->post('ft_ctr'));
                if($ft_ctr>0){
                    for($i=1;$i<=$ft_ctr;$i++){
                        $financial_transaction_data = array(
                            'victim_id' => $this->security->xss_clean($victim_id),
                            'transaction_date' => $this->security->xss_clean($this->input->post('ft_transaction_date_'.$i)),
                            'rgv_transaction_type_id' => $this->security->xss_clean($this->input->post('ft_rgv_transaction_type_id_'.$i)),
                            'is_others' => ($this->security->xss_clean($this->input->post('ft_rgv_transaction_type_id_'.$i)) == 55 ? 1 : 0),
                            'others' => $this->security->xss_clean($this->input->post('ft_others_'.$i)),
                            'amount' => $this->security->xss_clean($this->input->post('ft_amount_'.$i)),
                            'is_sent' => $this->security->xss_clean($this->input->post('ft_is_sent_'.$i)),
                            'victim_bank_name' => $this->security->xss_clean(strtoupper($this->input->post('ft_s_bank_name_'.$i))),
                            'victim_account_name' => $this->security->xss_clean($this->input->post('ft_s_account_name_'.$i)),
                            'victim_account_number' => $this->security->xss_clean($this->input->post('ft_s_account_no_'.$i)),
                            'victim_bank_address1' => $this->security->xss_clean(strtoupper($this->input->post('ft_s_address_'.$i))),
                            'victim_bank_country' => $this->security->xss_clean(strtoupper($this->input->post('ft_s_country_'.$i))),
                            'victim_bank_province' => $this->security->xss_clean(strtoupper($this->input->post('ft_s_province_'.$i))),
                            'victim_bank_city' => $this->security->xss_clean(strtoupper($this->input->post('ft_s_city_'.$i))),
                            'victim_bank_zip_code' => $this->security->xss_clean($this->input->post('ft_s_zip_code_'.$i)),
                            'receipient_bank_name' => $this->security->xss_clean(strtoupper($this->input->post('ft_r_bank_name_'.$i))),
                            'receipient_account_name' => $this->security->xss_clean($this->input->post('ft_r_account_name_'.$i)),
                            'receipient_account_number' => $this->security->xss_clean($this->input->post('ft_r_account_no_'.$i)),
                            'receipient_bank_address1' => $this->security->xss_clean(strtoupper($this->input->post('ft_r_address_'.$i))),
                            'receipient_bank_country' => $this->security->xss_clean(strtoupper($this->input->post('ft_r_country_'.$i))),
                            'receipient_bank_province' => $this->security->xss_clean(strtoupper($this->input->post('ft_r_province_'.$i))),
                            'receipient_bank_city' => $this->security->xss_clean(strtoupper($this->input->post('ft_r_city_'.$i))),
                            'receipient_bank_zip_code' => $this->security->xss_clean($this->input->post('ft_r_zip_code_'.$i)),
                            'created_by' => $this->security->xss_clean($this->input->post('digital_signature')),
                            'created_at' => $this->security->xss_clean(date('Y-m-d H:i:s'))
                        );

                        $financial_transaction_id = $this->M_victim_financial_transactions->insert($financial_transaction_data);
                        if($financial_transaction_id<=0){
                            $response['status'] = 0;
                            $response['message'] = 'Something went wrong. Please contact your technical support.(6)';
                            return;
                        }
                    }
                }

                // Report Government ID Insert
                if(!empty($_FILES['gov_id']['name'])) 
                {
                    $valid_extensions = array('jpeg', 'jpg', 'png'); 
                    $path = 'assets/img/uploads/'; 

                    $img = $_FILES['gov_id']['name'];
                    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
                    $size = $_FILES['gov_id']['size'];

                    $tmp = $_FILES['gov_id']['tmp_name'];
                    $final_gov_id_name = strval(rand(1000,1000000)).".".$ext;

                    if(in_array($ext, $valid_extensions)) 
                    { 
                        $path = $path.strtolower($final_gov_id_name); 

                        if(!(move_uploaded_file($tmp,$path))) 
                        {
                            $response['status'] = 0;
                            $response['message'] = 'Something went wrong when uploading goverment id. Please contact your technical support.(7)';
                            echo json_encode($response);
                            return;
                        }

                        $attachment_data = array(
                            'report_id' => $this->security->xss_clean($report_id),
                            'file_name' => str_replace(".".$ext,"",$img),
                            'file_type' => $ext,
                            'file_size' => $size,
                            'file_path' => $path,
                            'created_by' => $this->security->xss_clean($this->input->post('digital_signature')),
                            'created_at' => $this->security->xss_clean(date('Y-m-d H:i:s'))
                        );
                        
                        $attachment_id = $this->M_report_attachments->insert($attachment_data);
                        if($attachment_id<=0){
                            $response['status'] = 0;
                            $response['message'] = 'Something went wrong. Please contact your technical support.(8)';
                            return;
                        }

                    }else{
                        $response['status'] = 0;
                        $response['message'] = 'Accepted image files are ".jpg|.jpeg|.png" extensions.(9)';
                        echo json_encode($response);
                        return;
                    } 

                }

                // Report Attachments Insert
                if(!empty($_FILES['attachments']['name'][0]))
                {   
                    if ($_FILES['attachments'])
                    {   
                        $countfiles = count($_FILES['attachments']['name']);

                        for($i=0;$i<$countfiles;$i++){

                            $valid_extensions = array('jpeg', 'jpg', 'png'); 
                            $path = 'assets/img/uploads/'; 

                            $img = $_FILES['attachments']['name'][$i];
                            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
                            $size = $_FILES['attachments']['size'][$i];

                            $tmp = $_FILES['attachments']['tmp_name'][$i];
                            $final_attachments_name = strval(rand(1000,1000000)).".".$ext;

                            if(in_array($ext, $valid_extensions)) 
                            {
                                $path = $path.strtolower($final_attachments_name); 

                                if(!(move_uploaded_file($tmp,$path))) 
                                {
                                    $response['status'] = 0;
                                    $response['message'] = 'Something went wrong when uploading goverment id. Please contact your technical support.(10)';
                                    echo json_encode($response);
                                    return;
                                }

                                $attachment_data = array(
                                    'report_id' => $this->security->xss_clean($report_id),
                                    'file_name' => str_replace(".".$ext,"",$img),
                                    'file_type' => $ext,
                                    'file_size' => $size,
                                    'file_path' => $path,
                                    'created_by' => $this->security->xss_clean($this->input->post('digital_signature')),
                                    'created_at' => $this->security->xss_clean(date('Y-m-d H:i:s'))
                                );
                                
                                $attachment_id = $this->M_report_attachments->insert($attachment_data);
                                if($attachment_id<=0){
                                    $response['status'] = 0;
                                    $response['message'] = 'Something went wrong. Please contact your technical support.(11)';
                                    return;
                                }

                            }else{
                                $response['status'] = 0;
                                $response['message'] = 'Accepted image files are ".jpg|.jpeg|.png" extensions.(12)';
                                echo json_encode($response);
                                return;
                            }    
                        }
                    }
                }

                $sendTo = array(); 
                $sendCC = array(
                    'email' => array (
                        'azoresmelmar@gmail.com',
                        'aprilbatobato13@gmail.com'
                    )
                );
                $sendBCC = array();
                $sendInfo = array(
                    'reference_number' => $reference_number,
                    'last_name' => $this->security->xss_clean(strtoupper($this->input->post('last_name'))),
                    'first_name' => $this->security->xss_clean(strtoupper($this->input->post('first_name'))),
                    'middle_name' => $this->security->xss_clean(strtoupper($this->input->post('middle_name'))),
                    'description_of_incident' => $this->security->xss_clean($this->input->post('description_of_incident')),
                    'rgv_age_bracket_id' => $this->security->xss_clean($this->input->post('rgv_age_bracket_id')),
                    'rgv_sex_id' => $this->security->xss_clean($this->input->post('rgv_sex_id')),
                    'email' => $this->security->xss_clean($this->input->post('email')),
                    'mobile_number' => $this->security->xss_clean($this->input->post('mobile_number')),
                    'address' => $this->security->xss_clean(strtoupper($this->input->post('address'))),
                    'country' => $this->security->xss_clean(strtoupper($this->input->post('country'))),
                    'province' => $this->security->xss_clean(strtoupper($this->input->post('province'))),
                    'city' => $this->security->xss_clean(strtoupper($this->input->post('city')))
                );

                // if(!$this->sendToOrg($sendTo, $sendCC, $sendBCC, $sendInfo)){
                //     // $response['status'] = 0;
                //     // $response['message'] = 'Something went wrong. Please contact your technical support.(14)';
                //     $response['message'] = $this->sendToOrg($sendTo, $sendCC, $sendBCC, $sendInfo);
                //     echo json_encode($response);
                //     return;
                // }

                // if(!$this->sendToComp($sendInfo)){
                //     $response['status'] = 0;
                //     $response['message'] = 'Something went wrong. Please contact your technical support.(15)';
                //     echo json_encode($response);
                //     return;
                // }


            }else{
                $response['status'] = 0;
                $response['message'] = 'Please fill up the required fields first and try again!(13)';
            }
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

    public function unsetUserData(){
        $this->session->unset_userdata($user_data);
        $this->session->sess_destroy();

        redirect("OnlineComplaint");
    }

    function sendToOrg($sendTo, $sendCC, $sendBCC, $sendInfo){

        $age_bracket = $this->M_system_reference_group_values->get($sendInfo["rgv_age_bracket_id"]);
        $age_bracket_name = $age_bracket[0]->name;
        $sex = $this->M_system_reference_group_values->get($sendInfo["rgv_sex_id"]);
        $sex_name = $sex[0]->name;

        /* Load PHPMailer library */
        $this->load->library('phpmailer_lib');
       
        /* PHPMailer object */
        $mail = $this->phpmailer_lib->load();
       
        /* SMTP configuration */
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'reportcicc@gmail.com';
        $mail->Password = 'ptjbsrumnrgrjixq';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;
       
        $mail->setFrom('reportcicc@gmail.com', 'CICC - Reports');
        //$mail->addReplyTo('reportcicc@gmail.com', 'CICC - Reports');
       
        /* Add a recipient */
        $mail->addAddress('cicc.investigation.gov.ph@gmail.com');

        if(!empty($sendTo)){
            foreach($sendTo["email"] as $value){
                $mail->addAddress($value);
            }
        }

        /* Add CC */
        if(!empty($sendCC)){
            foreach($sendCC["email"] as $value){
                $mail->addCC($value);
            }
        }

        /* Add BCC */
        if(!empty($sendBCC)){
            foreach($sendBCC["email"] as $value){
                $mail->addBCC($value);
            }
        }
        
        /* Add cc or bcc */
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
       
        /* Email subject */
        $mail->Subject = 'CICC "Complaint"';
       
        /* Set email format to HTML */
        $mail->isHTML(true);
       
        /* Email body content */
        $mailContent =  "<p>From: " . $sendInfo["first_name"] . " " . $sendInfo["middle_name"] . " " . $sendInfo["last_name"] . "<br/>" 
                        ."Subject: Cyber Complaint<br/><br/>"
                        ."Complainant Information<br/>"
                        ."Name: " . $sendInfo["first_name"] . " " . $sendInfo["middle_name"] . " " . $sendInfo["last_name"] . " <br/>" 
                        ."Age: " . $age_bracket_name . " <br/>"
                        ."Gender: " . $sex_name . " <br/>"
                        ."Address: " . $sendInfo["address"] . " <br/>"
                        .$sendInfo["city"] . ", ". $sendInfo["province"] . ", " . $sendInfo["country"] . " <br/>"
                        ."Contact Details: " . $sendInfo["mobile_number"] . " <br/><br/>"
                        ."<p>Complaint:<br/>" 
                        .$sendInfo["description_of_incident"]. "<br/>"
                        ."</p>";

        $mail->Body = $mailContent;
       
        /* Send email */
        if(!$mail->send()){
            echo 'Mail could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            // return FALSE;
        }else{
            return TRUE;
        }
    }

    function sendToComp($sendInfo){

        $prefix = ($sendInfo["rgv_sex_id"] == 1 ? " Ms." : ($sendInfo["rgv_sex_id"] == 2 ? " Mr.":"")) ;
        
        /* Load PHPMailer library */
        $this->load->library('phpmailer_lib');
       
        /* PHPMailer object */
        $mail = $this->phpmailer_lib->load(); 
       
        /* SMTP configuration */
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'reportcicc@gmail.com';
        $mail->Password = 'ptjbsrumnrgrjixq';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
       
        $mail->setFrom('reportcicc@gmail.com', 'CICC - Reports');
        //$mail->addReplyTo('reportcicc@gmail.com', 'CICC - Reports');
       
        /* Add a recipient */
        $mail->addAddress($sendInfo["email"]);

        // if(!empty($sendTo)){
        //     foreach($sendTo["email"] as $value){
        //         $mail->addAddress($value);
        //     }
        // }

        /* Add CC */
        // if(!empty($sendCC)){
        //     foreach($sendCC["email"] as $value){
        //         $mail->addCC($value);
        //     }
        // }

        /* Add BCC */
        // if(!empty($sendBCC)){
        //     foreach($sendBCC["email"] as $value){
        //         $mail->addBCC($value);
        //     }
        // }
        
        /* Add cc or bcc */
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
       
        /* Email subject */
        $mail->Subject = 'CICC "Complaint" (Please do not reply)';
       
        /* Set email format to HTML */
        $mail->isHTML(true);
       
        /* Email body content */
        $mailContent =  "<p>Greetings! <br/><br/>" 
                        ."Dear:" . $prefix . " " . strtoupper($sendInfo["last_name"]) . ",<br/><br/>"
                        ."We appreciate you for reaching out to us. We will have your case reviewed and rest assured that we will take actions accordingly. Thank you!<br/></br>"
                        ."Your reference number is: <b>". $sendInfo["reference_number"] ."</b><br/></br>"
                        ."Warmest Regards,<br/><br/>" 
                        ."CICC - ID<br/><br/>"
                        ."</p>";

        $mail->Body = $mailContent;
       
        /* Send email */
        if(!$mail->send()){
            // echo 'Mail could not be sent.';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
            return FALSE;
        }else{
            return TRUE;
        }
    }
}
