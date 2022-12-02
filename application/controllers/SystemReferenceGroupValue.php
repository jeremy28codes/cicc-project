<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemReferenceGroupValue extends CI_Controller {

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
    }

	public function index()
	{
        $data['page_info'] = array (
            'page_title' => 'CICC - File a complaint'
        );

		$data['age_brackets'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Age Bracket',0,0);
		$data['sexes'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Sex',0,0);
		$data['marital_statuses'] = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision('Marital Status',0,0);
		$data['countries'] = $this->M_system_reference_countries->getAll();
		$this->load->view('pages/online_complaint/index', $data);
	}

    public function getAll(){
        if($this->input->post()){
            $result = $this->M_system_reference_group_values->getAll();
            exit(json_encode($result));
        }
    }

    public function getBy_GroupCodeDepartmentDivision(){

        if($this->input->post()){
            $group_code = $this->security->xss_clean($this->input->post('group_code'));
            $department_id = $this->security->xss_clean($this->input->post('department_id'));
            $division_id = $this->security->xss_clean($this->input->post('division_id'));

            $result = $this->M_system_reference_group_values->getBy_GroupCodeDepartmentDivision($group_code, $department_id, $division_id);
            exit(json_encode($result));
        }
        
    }

}
