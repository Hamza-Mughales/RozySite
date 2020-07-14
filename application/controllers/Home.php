<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    /**  __construct function  */
    // --------------------------------------------------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Home_model', 'homeModel');
	
    }

    /**  Index function  */
    // --------------------------------------------------------------------------------------------------
    public function index()
    {
        $data = [];
        $data['title'] = 'Home';
        $data['home'] = $this->homeModel->get_home();
        if ($data['home'] == null) {
			redirect(base_url() . 'home/add_home');
        } else {
			$data['view'] = 'home/home_view';
        }
        $this->load->view('layout/layout', $data);
    }

    /**  Add Home Function  */
    // --------------------------------------------------------------------------------------------------
    public function add_home()
    {
        $data = [];
        $data['page_title'] = 'Add_home';
        $data['edit'] = 0;
        $data['view'] = 'home/home_form_view';

        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('text', 'Home Text', 'trim|required');
		$this->form_validation->set_rules('colored_word', 'Colored word', 'trim|required');
		if(empty($_FILES['img']['name'])){
			$this->form_validation->set_rules('img', 'Image', 'required');
			}

        if ($_POST) {
            $data['text'] = $this->input->post('text');
			$data['colored_word'] = $this->input->post('colored_word');
			
            // Upload image
			if ($_FILES['img']) 
			{
                $config['upload_path'] = APPPATH . '../files/imgs/';
                $config['allowed_types'] = 'gif|jpg|png|webp|tiff|psd|raw|bmp|heif|inddjpeg';
                $config['max_size'] = 3074;
                $config['max_width'] = 2000;
				$config['max_height'] = 1500;
				
                $this->load->library('upload', $config);
				$upload_process = $this->upload->do_upload('img');
				
				if ($upload_process == false) 
				{
					$img_err = $this->upload->display_errors();
				}
				else
				{
					$img = $this->upload->data();
					$image_name = $img['file_name'];
				}
			}
            if ($this->form_validation->run() == false || isset($img_err) ) {
				$data['text'] = $this->input->post('text');
				$data['colored_word'] = $this->input->post('colored_word');
				$data['img_err'] = $img_err;
            } else {
				$insert_data = [
					'img' => $image_name,
                    'text' => $this->input->post('text'),
                    'colored_word' => $this->input->post('colored_word'),
                ];
				
                // Insert Home in Database
                $output = $this->homeModel->insert_home($insert_data);
                if ($output == true) {
                    // Success Add Message
                    $this->session->set_flashdata('success_add', 'Home has been added successfuly');
                    redirect(base_url('home/index'));
                } else {
                    // Error
                    $this->session->set_flashdata('error_add', 'Sorry There was an error!');
                }
            }
        }
        $this->load->view('layout/layout', $data);
    }

    /** Edit Function */
    // --------------------------------------------------------------------------------------------------
    public function edit_home()
    {
        $data = [];
        $data['title'] = 'Edit_home';
        $data['edit'] = 1;
        $data['view'] = 'home/home_form_view';
		$data['home'] = $this->homeModel->get_home();

        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);
		
        # Form Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('text', 'Text', 'trim|required');
        $this->form_validation->set_rules('colored_word', 'Colored Word', 'trim|required');
		
        if ($_POST) {
			$new_data['text'] = $this->input->post('text');
            $new_data['colored_word'] = $this->input->post('colored_word');
			$new_data['img'] = $data['home']->img;
			
			// Upload image
            if ($_FILES['img']['size'] > 0) {
				$config['upload_path'] = APPPATH . '../files/imgs/';
                $config['allowed_types'] = 'gif|jpg|png|webp|tiff|psd|raw|bmp|heif|inddjpeg';
                $config['max_size'] = 3074;
                $config['max_width'] = 2000;
				$config['max_height'] = 1500;
				
                $this->load->library('upload', $config);
				$upload_process = $this->upload->do_upload('img');
				
                if ($upload_process == false) {
					$img_err = $this->upload->display_errors();
                }
				else
				{
					$img = $this->upload->data();
					$image_name = $img['file_name'];
					$new_data['img'] = $image_name;
				}
			}
			// var_dump($new_data['img']);exit;
			
            if ($this->form_validation->run() == false || isset($img_err) ) {
                $data['text'] = $this->input->post('text');
                $data['colored_word'] = $this->input->post('colored_word');
                $data['img_err'] = $img_err;
            } else {
                // Update Home in Database
                $output = $this->homeModel->update_home($new_data);
                if ($output == true) {
                    // Success Message
                    $this->session->set_flashdata('updated', 'home has been updated successfuly');
                    redirect(base_url('home/index'));
                } else {
                    // Error Message
                    $this->session->set_flashdata('error_update', 'Sorry There was an error! on update');
                }
            }
        }
        $this->load->view('layout/layout', $data);
    }

}
