<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skills extends MY_Controller
{

    /**  __construct function  */
    // --------------------------------------------------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Skills_model', 'skillsModel');
    }

    /**  Index function  */
    // --------------------------------------------------------------------------------------------------
    public function index()
    {
        $data = [];
        $data['title'] = 'Skills';
        $data['skills'] = $this->skillsModel->get_all_skills();
        if ($data['skills'] == null) {
			redirect(base_url() . 'skills/add_skill');
        } else {
			$data['view'] = 'skills/skills_view';
        }
        $this->load->view('layout/layout', $data);
    }

    /**  Add Function  */
    // --------------------------------------------------------------------------------------------------

    public function add_skill()
    {
        $data = [];
        $data['page_title'] = 'Add_skill';
        $data['edit'] = 0;
        $data['view'] = 'skills/skills_form_view';

        $error = '';

        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('percent', 'Percent', 'trim|numeric|required');
        $this->form_validation->set_rules('order', 'Order', 'trim|numeric|required');
        $this->form_validation->set_rules('color', 'color', 'trim|required');

        if ($_POST) {
			$data['title'] = $this->input->post('title');
            $data['precent'] = $this->input->post('precent');
            $data['order'] = $this->input->post('order');
            $data['color'] = $this->input->post('color');

            if ($this->form_validation->run() == false) {
				$data['title'] = $this->input->post('title');
				$data['precnt'] = $this->input->post('precnt');
				$data['order'] = $this->input->post('order');
				$data['color'] = $this->input->post('color');
            } else {
				$insert_data = [
                    'title' => $this->input->post('title'),
                    'percent' => $this->input->post('percent'),
                    'order' => $this->input->post('order'),
                    'color' => $this->input->post('color'),
                ];
				
                // Insert in Database
                $output = $this->skillsModel->insert_skill($insert_data);
                if ($output == true) {
                    // Success Add Message
                    $this->session->set_flashdata('success_add', 'skill has been added successfuly');
                    redirect(base_url('skills/index'));
                } else {
                    // Error
                    $this->session->set_flashdata('error_add', 'Sorry There was an error!');
                }
            }
        }
        $this->load->view('layout/layout', $data);
    }

    /** Edit function */
    // --------------------------------------------------------------------------------------------------
    public function edit_skill($id)
    {
        $data = [];
        $data['title'] = 'Edit_skill';
        $data['edit'] = 1;
        $data['view'] = 'skills/skills_form_view';
		$data['skill'] = $this->skillsModel->get_skill($id);
		
        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('percent', 'Percent', 'trim');
        $this->form_validation->set_rules('order', 'Order', 'trim|required');
        $this->form_validation->set_rules('color', 'color', 'trim|required');

        if ($_POST) {

			$new_data = [];
            $new_data['title'] = $this->input->post('title');
            $new_data['percent'] = $this->input->post('percent');
            $new_data['order'] = $this->input->post('order');
            $new_data['color'] = $this->input->post('color');

            if ($this->form_validation->run() == false) {
                $data['title'] = $this->input->post('title');
                $data['percent'] = $this->input->post('percent');
                $data['order'] = $this->input->post('order');
                $data['color'] = $this->input->post('color');
			} 
			else
			{
				// Update in Database
				$output = $this->skillsModel->update_skill($id, $new_data);
				if ($output == true) {
                    // Success Message
                    $this->session->set_flashdata('updated', 'Skill has been updated successfuly');
                    redirect(base_url('skills/index'));
                } else {
                    // Error Message
                    $this->session->set_flashdata('error_update', 'Sorry There was an error! on update');
                }
            }
        }
        $this->load->view('layout/layout', $data);
    }

    /** Delete nav function */
    // --------------------------------------------------------------------------------------------------
    public function delete_skill($id)
    {
		$this->skillsModel->delete_skill($id);
		$this->session->set_flashdata('deleted', 'Skill has been DELETED');
        redirect(base_url('skills/index'));
    }
}
