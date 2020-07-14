<?php

class About_model extends CI_Model
{

    /**  Get all navs function  */
    // --------------------------------------------------------------------------------------------------
    public function get_about()
    {
        $about = $this->db->get('about');
        return $about->row();
    }

    /**  Insert function  */
    // --------------------------------------------------------------------------------------------------
    public function insert_about($data)
    {
        return $this->db->insert('about', $data);
    }

    /*  Update function  */
    // --------------------------------------------------------------------------------------------------
    public function update_about($new_data)
    {
        $update_data = [
            'name' => $new_data['name'],
            'headline' => $new_data['headline'],
            'colored_head' => $new_data['colored_head'],
            'text' => $new_data['text'],
            'phone' => $new_data['phone'],
            'email' => $new_data['email'],
            'img' => $new_data['img'],
            'location' => $new_data['location'],
        ];
	 //var_dump($update_data);exit;
        return $this->db->update('about', $update_data);
    }

}
