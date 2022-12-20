<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
         parent::__construct();
         $this->load->model('system_web_modules_model', 'M_system_web_module');
         $this->load->model('system_web_sections_model', 'M_system_web_section');
 
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
        $this->load->model('Suspects_model','M_suspects');
        $this->load->model('Report_assessments_model','M_report_assessments');
        $this->load->model('Report_statuses_model', 'M_report_statuses');


    }
	
	public function index()
	{
        if (!($this->session->userdata('username')))
		{
		    redirect('auth'); 
        }
        
		$data['page_info'] = array(
            'title' => 'Home',
            'system_web_module' => 'Home',
            'system_web_section' => '',
            'system_task' => '',
            'system_active_tab' => '',
			'styles_path' => array(
                'assets/libs/chartist/dist/chartist.min.css',
                'assets/extra-libs/c3/c3.min.css',
				'assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css'
            ),
            'scripts_path' => array(
                'assets/libs/chartist/dist/chartist.min.js',
				'assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js',
				'assets/extra-libs/c3/d3.min.js',
				'assets/extra-libs/c3/c3.min.js',
                'assets/js/pages/dashboard/dashboard.js'
            )
        );

		$this->load->view('_includes/header', $data);
		$this->load->view('_includes/topbar', $data);
		$this->load->view('_includes/side-nav', $data);
		$this->load->view('pages/dashboard/dashboard', $data);
		// $this->load->view('_includes/customizer', $data);
		$this->load->view('_includes/footer', $data);
	}

    
}
