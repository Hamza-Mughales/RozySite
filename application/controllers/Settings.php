<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends MY_Controller
{
	/**  __construct function  */
	// --------------------------------------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Settings_model', 'settingsModel');
	}

	/** Edit Settings Function */
	// --------------------------------------------------------------------------------------------------
	public function edit_settings()
	{
		
		if (isset($_FILES['services_img']['name'])) {

			 //var_dump( $_FILES);exit();

				$config['upload_path'] = APPPATH . '../files/imgs/';
				$config['allowed_types'] = 'gif|jpg|png|webp|tiff|psd|raw|bmp|heif|inddjpeg';
				$config['max_size'] =  0;
				$config['max_width'] = 4000;
				$config['max_height'] = 4000;
				
				$this->load->library('upload', $config);
				$upload_process = $this->upload->do_upload('services_img');
				
				if ($upload_process == false) {
					// $img_err = $this->upload->display_errors();
					echo $this->upload->display_errors();
				}
				else
				{
					$img = $this->upload->data();
					$img_name = $img['file_name'];
					$new_data['img'] = $img_name;
					$this->settingsModel->update_setting($new_data);
					echo base_url('files/imgs/') . $img_name;
					
				}
		}
		}
}
