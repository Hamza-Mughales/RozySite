<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Works extends MY_Controller
{

    /**  __construct function  */
    // --------------------------------------------------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Works_model', 'workModel');
    }

    /**  Index function  */
    // --------------------------------------------------------------------------------------------------
    public function index()
    {
		$sess_data = $this->session->has_userdata('id', 
	);
		// var_dump($sess_data);exit;
		
        $data = [];
        $data['title'] = 'Works';
		$data['works'] = $this->workModel->get_all_works();
        if ($data['works'] == null) {
			redirect(base_url() . 'works/add_work');
        } else {
			$data['view'] = 'works/works_view';
        }
        $this->load->view('layout/layout', $data);
    }

    /**  Add Function  */
    // --------------------------------------------------------------------------------------------------

    public function add_work()
    {
        $data = [];
        $data['page_title'] = 'Add_work';
        $data['edit'] = 0;
        $data['view'] = 'works/works_form_view';

        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim');
		$this->form_validation->set_rules('order', 'Order', 'trim');
		if(empty($_FILES['img']['name'])){
		$this->form_validation->set_rules('img', 'Image', '|required');
		}

        if ($_POST) {
			$data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['order'] = $this->input->post('order');

            // Upload image
			if ($_FILES['img']) 
			{
				$config['upload_path'] = APPPATH . '../files/imgs/works images/';
				$config['allowed_types'] = 'gif|jpg|png|webp|tiff|psd|raw|bmp|heif|inddjpeg';
				$config['max_size'] = 0;
				//$config['max_width'] = 1000;
				//$config['max_height'] = 1000;
				
                $this->load->library('upload', $config);
				$upload_process = $this->upload->do_upload('img');
				
                if ($upload_process == false) {
					$img_err = $this->upload->display_errors();
				}
				else{
					$img = $this->upload->data();
					$image_name = $img['file_name'];
				}
			}
            if ($this->form_validation->run() == false || isset($img_err) ) {
				$data['title'] = $this->input->post('title');
                $data['description'] = $this->input->post('description');
				$data['order'] = $this->input->post('order');
				$data['img_err'] = $img_err;
			}
			else 
			{
				$insert_data = [
					'img' => $image_name,
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'order' => $this->input->post('order'),
                ];
				
                // Insert in Database
                $output = $this->workModel->insert_work($insert_data);
                if ($output == true) {
                    // Success Add Message
                    $this->session->set_flashdata('success_add', 'Work has been added successfuly');
                    redirect(base_url('works/index'));
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
    public function edit_work($id)
    {
        $data = [];
        $data['title'] = 'Edit_work';
        $data['edit'] = 1;
        $data['view'] = 'works/works_form_view';
		$data['work'] = $this->workModel->get_work($id);
		
        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        $this->form_validation->set_rules('order', 'Order', 'trim');

        if ($_POST) {
			$new_data = [];
            $new_data['title'] = $this->input->post('title');
            $new_data['description'] = $this->input->post('description');
            $new_data['order'] = $this->input->post('order');
			$new_data['img'] = $data['work']->img;
			
			// var_dump($_POST, $_FILES);exit;
            // Upload image
			if ($_FILES['img']['size'] > 0) 
			{
				$config['upload_path'] = APPPATH . '../files/imgs/works images/';
                $config['allowed_types'] = 'gif|jpg|png|webp|tiff|psd|raw|bmp|heif|inddjpeg';
                $config['max_size'] = 0;
                //$config['max_width'] = 1000;
                //$config['max_height'] = 1000;
				
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
                $data['title'] = $this->input->post('title');
                $data['description'] = $this->input->post('description');
				$data['order'] = $this->input->post('order');
                $data['img_err'] = $img_err;
			} 
			else
			{
				// Update in Database
				$output = $this->workModel->update_work($id, $new_data);
				if ($output == true) {
                    // Success Message
                    $this->session->set_flashdata('updated', 'Work has been updated successfuly');
                    redirect(base_url('works/index'));
                } else {
                    // Error Message
                    $this->session->set_flashdata('error_update', 'Sorry There was an error! on update');
                }
            }
        }
		$this->load->view('layout/layout', $data);
	}


    /** Vivew img on site function */
    // --------------------------------------------------------------------------------------------------
    public function view_onsite()
    {
		//var_dump($_POST);exit;
		if (isset($_POST['view']) && isset($_POST['workID'])) {
			
			$workID = $this->input->post('workID');
			$view = $this->input->post('view');
			
			if($view == 1 || $view == 0 )
			{
				$this->workModel->view_onsite($workID, $view);
			} 
			else
			{
                echo "Sorry There was an error.";
			}
		}
    }


    /** Delete function */
    // --------------------------------------------------------------------------------------------------
    public function delete_work($id)
    {
		$this->workModel->delete_work($id);
		
		$this->session->set_flashdata('deleted', 'work has been DELETED');
        redirect(base_url('works/index'));
    }

}
