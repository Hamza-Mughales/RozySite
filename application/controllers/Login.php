<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load User Model
        $this->load->model('User_model', 'userModel');
    }

    public function index()
    {
        // Check if there is a user in DB
        $users = $this->userModel->get_users();
        // var_dump($users);exit;
        if ($users == true) {
            redirect(base_url() . 'login/login');
        } else {
            echo 'Sorry there is no user yet!';
        }
    }

    /**
     * User Login
     * --------------------
     * @param: name or email
     * @param: password
     * ---------------------
     */
    public function login()
    {
        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

			// var_dump($_POST);exit;
			

        if ($_POST) {
			# Form Validation
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name or Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if ($this->form_validation->run() == false) {
                // Form Validation Errors
                $data['name'] = $this->input->post('name');
                $data['password'] = $this->input->post('password');
            } else {
                $name = $this->input->post('name');
                $password = $this->input->post('password');
                // Load Login Function
                $output = $this->userModel->user_login($name, $password);
                if (!empty($output) and $output != false) {

                    // Logged in success
                    #******** Set Session ********
                    $userdata = array(
                        'user_id' => $output->id,
                        'user_name' => $output->name,
                        'logged_in' => true,
                    );
                    $this->session->set_userdata($userdata);

                    $this->session->set_flashdata('logeding', 'Hello, ' . $output->name);
                    redirect(base_url() . 'works/index');

                } else {
                    // Error
                    $this->session->set_flashdata('error', 'Sorry there was a login error!');
                }
            }
        }
		$this->load->view('login_view');
	}
	
	// Logout function 
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
