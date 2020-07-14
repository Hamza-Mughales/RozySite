<?php

class Home_model extends CI_Model
{

    /**  Get all navs function  */
    // --------------------------------------------------------------------------------------------------
    public function get_home()
    {
        $home = $this->db->get('home');
        return $home->row();
    }

    /**  Insert function  */
    // --------------------------------------------------------------------------------------------------
    public function insert_home($data)
    {
        return $this->db->insert('home', $data);
    }

    /*  Update function  */
    // --------------------------------------------------------------------------------------------------
    public function update_home($new_data)
    {
        $update_data = [
            'img' => $new_data['img'],
            'text' => $new_data['text'],
            'colored_word' => $new_data['colored_word'],
        ];
        return $this->db->update('home', $update_data);
    }

}
