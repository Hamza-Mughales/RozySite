<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nav extends MY_Controller
{

    /**  __construct function  */
    // --------------------------------------------------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nav_model', 'navModel');
    }

    /**  Index function  */
    // --------------------------------------------------------------------------------------------------
    public function index()
    {
        $data = [];
        $data['title'] = 'Navs';
        $data['view'] = 'nav/nav_view';
        $data['nav_data'] = $this->navModel->get_all_navs();
        $this->load->view('layout/layout', $data);
    }

    /**  Add Nav Function  */
    // --------------------------------------------------------------------------------------------------
    public function add_nav()
    {
        $data = [];
        $data['page_title'] = 'Add_nav';
        $data['edit'] = 0;
        $data['view'] = 'nav/nav_form_view';

        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('order', 'Order', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $data['name'] = $this->input->post('name');
            $data['order'] = $this->input->post('order');
        } else {
            $insert_data = [
                'nav_name' => $this->input->post('name'),
                'nav_order' => $this->input->post('order'),
            ];
            // Insert User in Database
            $output = $this->navModel->insert_nav($insert_data);
            if (!empty($output) and $output > 0) {
                // Success Add Message
                $this->session->set_flashdata('success_add', 'nav has been added successfuly');
                redirect(base_url('nav/index'));
            } else {
                // Error
                $this->session->set_flashdata('error_add', 'Sorry There was an error!');
            }
        }
        $this->load->view('layout/layout', $data);
    }

    /** Edit nav function */
    // --------------------------------------------------------------------------------------------------
    public function edit_nav($nav_id)
    {
        $data = [];
        $data['title'] = 'Edit_nav';
        $data['edit'] = 1;
        $data['view'] = 'nav/nav_form_view';

        $data['nav'] = $this->navModel->get_nav($nav_id);

        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('order', 'Order', 'trim|required|numeric');

        if ($_POST) {
            $new_data['name'] = $this->input->post('name');
            $new_data['order'] = $this->input->post('order');

            if ($this->form_validation->run() == false) {
                $data['name'] = $this->input->post('name');
                $data['order'] = $this->input->post('order');
            } else {
                // Update User in Database
                $output = $this->navModel->update_nav($nav_id, $new_data);
                if (!empty($output) and $output > 0) {
                    // Success Message
                    $this->session->set_flashdata('success_update', 'nav has been updated successfuly');
                    redirect(base_url('nav/index'));
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
    public function delete_nav($id)
    {
		$this->navModel->delete_nav($id);
		
		$this->session->set_flashdata('deleted', 'nav has been DELETED');
        redirect(base_url('nav/index'));
    }
}
