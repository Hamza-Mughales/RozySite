<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends MY_Controller
{

    /**  __construct function  */
    // --------------------------------------------------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Services_model', 'servicesModel');
    }

    /**  Index function  */
    // --------------------------------------------------------------------------------------------------
    public function index()
    {
        $data = [];
        $data['title'] = 'Services';
        
        $this->load->model('Settings_model');
        $settings =$this->Settings_model->get_settings();
        $data['settings'] = $settings;
        
        $data['services'] = $this->servicesModel->get_all_services();
        if ($data['services'] == null) {
			redirect(base_url() . 'services/add_service');
        } else {
			$data['view'] = 'services/services_view';
        }
        $this->load->view('layout/layout', $data);
    }

    /**  Add Function  */
    // --------------------------------------------------------------------------------------------------

    public function add_service()
    {
        $data = [];
        $data['page_title'] = 'Add_service';
        $data['edit'] = 0;
        $data['view'] = 'services/services_form_view';

        $error = '';

        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('number', 'Number', 'trim|numeric|required');
        $this->form_validation->set_rules('order', 'Order', 'trim|numeric|required');

        if ($_POST) {
			$data['title'] = $this->input->post('title');
            $data['number'] = $this->input->post('number');
            $data['order'] = $this->input->post('order');

            if ($this->form_validation->run() == false) {
				$data['title'] = $this->input->post('title');
				$data['number'] = $this->input->post('number');
				$data['order'] = $this->input->post('order');
            } else {
				$insert_data = [
                    'title' => $this->input->post('title'),
                    'number' => $this->input->post('number'),
                    'order' => $this->input->post('order'),
                ];
				
                // Insert in Database
                $output = $this->servicesModel->insert_service($insert_data);
                if ($output == true) {
                    // Success Add Message
                    $this->session->set_flashdata('success_add', 'service has been added successfuly');
                    redirect(base_url('services/index'));
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
    public function edit_service($id)
    {
        $data = [];
        $data['title'] = 'Edit_service';
        $data['edit'] = 1;
        $data['view'] = 'services/services_form_view';
		$data['service'] = $this->servicesModel->get_service($id);
		
        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('number', 'Number', 'trim');
        $this->form_validation->set_rules('order', 'Order', 'trim|required');

        if ($_POST) {

			$new_data = [];
            $new_data['title'] = $this->input->post('title');
            $new_data['number'] = $this->input->post('number');
            $new_data['order'] = $this->input->post('order');

            if ($this->form_validation->run() == false) {
                $data['title'] = $this->input->post('title');
                $data['number'] = $this->input->post('number');
                $data['order'] = $this->input->post('order');
			} 
			else
			{
				// var_dump($new_data);exit;
				// Update in Database
				$output = $this->servicesModel->update_service($id, $new_data);
				if ($output == true) {
                    // Success Message
                    $this->session->set_flashdata('updated', 'Service has been updated successfuly');
                    redirect(base_url('services/index'));
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
    public function delete_service($id)
    {
		$this->servicesModel->delete_service($id);
		$this->session->set_flashdata('deleted', 'service has been DELETED');
        redirect(base_url('services/index'));
    }
}
