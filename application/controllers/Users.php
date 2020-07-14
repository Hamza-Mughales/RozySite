<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load User Model
        $this->load->model('user_model', 'userModel');
        $this->load->library('form_validation');
    }

    /**  Index function  */
    // --------------------------------------------------------------------------------------------------
    public function index()
    {
        $data = [];
        $data['title'] = 'Users';
        $data['users'] = $this->userModel->get_users();
        
		$data['view'] = 'users/user_view';
        
        $this->load->view('layout/layout', $data);
    }

    /**
     * User Register
     * --------------------------
     * @param: name
     * @param: password
     * @param: email
     * @param: phone
     * --------------------------
     */
    public function register()
    {
		$data = [];
        $data['page_title'] = 'Add User';
        $data['edit'] = 0;
        $data['view'] = 'users/user_form_view';
        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]',
            array('is_unique' => 'This %s هذا الايميل موجود مسبقا'));

        if ($this->form_validation->run() == false) {
            // Form Validation Errors
            $data['name'] = $this->input->post('name');
            $data['password'] = $this->input->post('password');
            $data['email'] = $this->input->post('email');
        } else {
            $insert_data = [
                'name' => $this->input->post('name', true),
                'password' => md5($this->input->post('password', true)),
                'email' => $this->input->post('email', true),
            ];

            // Insert User in Database
            $output = $this->userModel->insert_user($insert_data);
            if (!empty($output) and $output > 0) {
                // Success Message
                $this->session->set_flashdata('registerd', 'user has been registerd successfuly');
                redirect(base_url('users/index'));
            } else {
                // Error
                $this->session->set_flashdata('error', 'Sorry there was an error!');
            }
		}
		$this->load->view('layout/layout',$data);
    }

    /**
     * Update a User
     * @method: PUT
     */
    public function user_update($id)
    {
        $data = [];
        $data['page_title'] = 'Edit_User';
        $data['edit'] = 1;
        $data['view'] = 'users/user_form_view';
		$data['user'] = $this->userModel->get_users($id);
		
        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if ($_POST) {
			$new_data = [];
            $new_data['name'] = $this->input->post('name');
            $new_data['password'] = md5($this->input->post('password'));
            $new_data['email'] = $this->input->post('email');

            if ($this->form_validation->run() == false ) {
                $data['name'] = $this->input->post('name');
                $data['password'] = $this->input->post('password');
                $data['email'] = $this->input->post('email');
                $data['img_err'] = $img_err;
			} 
			else
			{
				// Update in Database
				$output = $this->userModel->user_update($id, $new_data);
				if ($output == true) {
                    // Success Message
                    $this->session->set_flashdata('updated', 'user has been updated successfuly');
                    redirect(base_url('users/index'));
                } else {
                    // Error Message
                    $this->session->set_flashdata('error_update', 'Sorry There was an error on update!');
                }
            }
        }
        $this->load->view('layout/layout', $data);
    }

	// Delete User
	public function user_delete($id)
	{
		$this->userModel->delete_user($id);
		$this->session->set_flashdata('deleted', 'User has been DELETED');
        redirect(base_url('users/index'));
	}
}
