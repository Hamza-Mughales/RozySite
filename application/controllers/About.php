<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends MY_Controller
{

    /**  __construct function  */
    // --------------------------------------------------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->load->model('About_model', 'aboutModel');
    }

    /**  Index function  */
    // --------------------------------------------------------------------------------------------------
    public function index()
    {
        $data = [];
        $data['title'] = 'About';
        $data['about'] = $this->aboutModel->get_about();
        if ($data['about'] == null) {
			redirect(base_url() . 'about/add_about');
        } else {
			$data['view'] = 'about/about_view';
        }
        $this->load->view('layout/layout', $data);
    }

    /**  Add Function  */
    // --------------------------------------------------------------------------------------------------

    public function add_about()
    {
        $data = [];
        $data['title'] = 'Add_about';
        $data['edit'] = 0;
        $data['view'] = 'about/about_form_view';

        // $error = '';

        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('colored_head', 'Colored Head', 'trim');
        $this->form_validation->set_rules('headline', ' Headline', 'trim|required');
        $this->form_validation->set_rules('text', 'Text', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim');
        $this->form_validation->set_rules('location', 'Location', 'trim');

        if ($_POST) {
			$data['name'] = $this->input->post('name');
            $data['colored_head'] = $this->input->post('colored_head');
            $data['headlind'] = $this->input->post('headlind');
            $data['text'] = $this->input->post('text');
            $data['phone'] = $this->input->post('phone');
            $data['email'] = $this->input->post('email');
            $data['location'] = $this->input->post('location');

            // Upload image
			if ($_FILES['img']) 
			{
                $config['upload_path'] = APPPATH . '../files/imgs/';
                $config['allowed_types'] = 'gif|jpg|png|webp|tiff|psd|raw|bmp|heif|inddjpeg';
                $config['max_size'] = 3074;
                $config['max_width'] = 3000;
                $config['max_height'] = 3000;

                $this->load->library('upload', $config);
                $upload_process = $this->upload->do_upload('img');
                if ($upload_process == false) {
					$img_err = $this->upload->display_errors();
                }

				$img = $this->upload->data();
                $image_name = $img['file_name'];
            }
			
            if ($this->form_validation->run() == false || isset($img_err) ) {
				$data['name'] = $this->input->post('name');
                $data['colored_head'] = $this->input->post('colored_head');
				$data['headline'] = $this->input->post('headline');
				$data['text'] = $this->input->post('text');
				$data['phone'] = $this->input->post('phone');
				$data['email'] = $this->input->post('email');
				$data['location'] = $this->input->post('location');
				$data['img_err'] = $img_err;
            } else {
				$insert_data = [
					'img' => $image_name,
                    'name' => $this->input->post('name'),
                    'colored_head' => $this->input->post('colored_head'),
                    'headline' => $this->input->post('headline'),
                    'text' => $this->input->post('text'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'location' => $this->input->post('location'),
                ];
				
                // Insert in Database
                $output = $this->aboutModel->insert_about($insert_data);
                if ($output == true) {
                    // Success Add Message
                    $this->session->set_flashdata('success_add', 'about has been added successfuly');
                    redirect(base_url('about/index'));
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
    public function edit_about()
    {
        $data = [];
        $data['page_title'] = 'Edit_about';
        $data['edit'] = 1;
        $data['view'] = 'about/about_form_view';
		$data['about'] = $this->aboutModel->get_about();
		
        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('colored_head', 'Colored Head', 'trim');
        $this->form_validation->set_rules('headline', ' Headline', 'trim');
        $this->form_validation->set_rules('text', 'Text', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim');
        $this->form_validation->set_rules('location', 'Location', 'trim');

        if ($_POST) {

            $new_data = [];
            $new_data['name'] = $this->input->post('name');
            $new_data['colored_head'] = $this->input->post('colored_head');
            $new_data['headline'] = $this->input->post('headline');
            $new_data['text'] = $this->input->post('text');
            $new_data['phone'] = $this->input->post('phone');
            $new_data['email'] = $this->input->post('email');
            $new_data['location'] = $this->input->post('location');
            $new_data['img'] = $data['about']->img;

            // Upload image
            if ($_FILES['img']['size'] > 0) {
                $config['upload_path'] = APPPATH . '../files/imgs/';
                $config['allowed_types'] = 'gif|jpg|png|webp|tiff|psd|raw|bmp|heif|inddjpeg';
                $config['max_size'] = 3074;
                $config['max_width'] = 3000;
                $config['max_height'] = 3000;

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

            if ($this->form_validation->run() == false || isset($img_err) ) {
                $data['name'] = $this->input->post('name');
                $data['colored_head'] = $this->input->post('colored_word');
                $data['headline'] = $this->input->post('headline');
                $data['text'] = $this->input->post('text');
                $data['phone'] = $this->input->post('phone');
                $data['email'] = $this->input->post('email');
                $data['location'] = $this->input->post('location');
                $data['img_err'] = $img_err;
			} 
			else
			{
				// var_dump($new_data);exit;
				// Update in Database
				$output = $this->aboutModel->update_about($new_data);
				if ($output == true) {
                    // Success Message
                    $this->session->set_flashdata('updated', 'about has been updated successfuly');
                    redirect(base_url('about/index'));
                } else {
                    // Error Message
                    $this->session->set_flashdata('error_update', 'Sorry There was an error! on update');
                }
            }

        }
        $this->load->view('layout/layout', $data);
    }

}
