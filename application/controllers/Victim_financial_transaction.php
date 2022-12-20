<?php
defined('BASEPATH') OR exit('No direct s    cript access allowed');

date_default_timezone_set('Asia/Manila');

class Victim_financial_transaction extends CI_Controller {

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

    public function delete($id)
	{
        $response['status'] = 1;
        $response['message'] = 'Deleted successfully!';

        $data = array(
            'deleted_by' => $this->security->xss_clean($this->session->userdata('username')),
            'deleted_at' => $this->security->xss_clean(date('y-m-d H:i:s')),
        );

        $id = $this->M_victim_financial_transactions->delete($id, $data);

        if ($id <= 0) {
            $response['status'] = 0;
            $response['message'] = 'Something went wrong. Please contact your technical support.';

            echo json_encode($response);
            return;
        }

        echo json_encode($response);
	}
}