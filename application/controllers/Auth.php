<?php
defined('BASEPATH') OR exit('No direct s    cript access allowed');

date_default_timezone_set('Asia/Manila');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

		$this->load->model('System_users_model', 'M_system_user');
        $this->load->model('System_user_roles_model', 'M_system_user_role');
       
    }
	public function index()
	{
        $data['page_info'] = array (
            'page_title' => 'CICC - Login'
        );

        if (!($this->session->userdata('username')))
		{
		    $this->load->view('login', $data);
        }
        else
        {
            redirect('dashboard'); 
        }

	}

    public function php_ver()
	{
        echo  phpversion();
	}

	public function login()
    {

        $response['status'] = 0;
        $response['message'] = 'Incorrect Credentials. Please try again.';

        if (!($this->session->userdata('username')))
		{
		    $username = $this->security->xss_clean($this->input->post('username'));
		    $password = $this->security->xss_clean($this->input->post('password'));

            $result = $this->M_system_user->login($username);
            if ( !empty($result) ) 
			{
                if($result[0]->login_attempt>=4)
                {
                    $response['message'] = 'You have reached the maximum retries allowed. Account blocked. Please contact your system administrator.';
                    echo json_encode($response);
                    return;
                }

				$verified = password_verify($password, $result[0]->password);

                if($verified)
				{
                    $role = $this->M_system_user_role->get_by_user_id($result[0]->id);
                    
                    if(empty($role)){
                        $response['message'] = 'You do not have permission to access the system. Please contact your system administrator.';
                        echo json_encode($response);
                        return;
                    }
                    else
                    {
                        if($role[0]->id<=0)
                        {
                            $response['message'] = 'You do not have permission to access the system. Please contact your system administrator.';
                            echo json_encode($response);
                            return;
                        }
                    }

                    $user_data = array( 
                        'user_id' => $result[0]->id,
                        'role_id' => $role[0]->role_id,
                        'department_id' => $result[0]->department_id,
                        'division_id' => $result[0]->division_id,
                        'username'  => $result[0]->username, 
                        'first_name'  => $result[0]->first_name, 
                        'middle_name'  => $result[0]->middle_name, 
                        'last_name'  => $result[0]->last_name,
                        'job_title'  => $result[0]->job_title,  
                        'pic_img_path'  => $result[0]->pic_img_path, 
                        'logged_in' => TRUE
                     );  
                     
                    $this->session->set_userdata($user_data);

                    $login_attempt = array (
                        'login_attempt' => 0
                    );

                    $this->M_system_user->update($login_attempt,$result[0]->id);

					$response['status'] = 1;
       		 		$response['message'] = 'Logged in successfully!';
				}
                else{
                    
                    $login_attempt = array (
                        'login_attempt' => $result[0]->login_attempt + 1
                    );

                    $this->M_system_user->update($login_attempt,$result[0]->id);

                    echo json_encode($response);
                    return;
                }

			}
            else
            {
                echo json_encode($response);
                return;
            }
        }
        else
        {
            redirect('dashboard'); 
        }

		echo json_encode($response);
    }

    public function logout()
    {   
        if (!($this->session->userdata('username')))
		{
		    redirect('/'); 
        }

        $user_data = array('user_id' => '',
                        'role_id' => '',
                        'username' => '',
                        'first_name' => '',
                        'middle_name' => '',
                        'last_name' => '',
                        'job_title'  => '',  
                        'pic_img_path'  => '',   
                        'department_id' => '',
                        'division_id' => '',
                        'logged_in' => FALSE
                    );

		$this->session->unset_userdata($user_data);
        $this->session->sess_destroy();
        redirect('auth'); 
    }

    public function updateUserPass($user_id){
        $hash = password_hash('password', PASSWORD_DEFAULT);

        $data = array(
            'password' => $hash
        );

        $id = $this->M_system_user->update($data,$user_id);
        if($id>0){
            echo 'Update Successful!';
        }else{
            echo 'Update Failed!';
        }
    }

}
