<?php

class Settings_model extends CI_Model
{


    /*  Gettings Settings function  */
    // --------------------------------------------------------------------------------------------------
    public function get_settings() {
		$settings = $this->db->get('settings');
        return $settings->row();
	} 


    /*  Update Settings function  */
    // --------------------------------------------------------------------------------------------------
    public function update_setting($new_data)
    {
        $update_data = [
            'name' => 'services_img',
            'value' => $new_data['img']
        ];
        $this->db->update('settings', $update_data);
    }

}
