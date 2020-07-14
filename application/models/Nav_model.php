<?php

class Nav_model extends CI_Model
{

    /**  Get all navs function  */
    // --------------------------------------------------------------------------------------------------
	public function get_all_navs(){
		$navs = $this->db->get('navs');
		return $navs->result();
	}

    /**  Get One nav function  */
    // --------------------------------------------------------------------------------------------------
	public function get_nav($id){
		$the_nav = $this->db->get_where('navs', ['nav_id' => $id]);
		return $the_nav->row();
	}

    /**  Insert function  */
    // --------------------------------------------------------------------------------------------------
	public function insert_nav($data){
		$this->db->insert('navs', $data);
		return $this->db->insert_id();
	}

    /**  Update function  */
    // --------------------------------------------------------------------------------------------------
	public function update_nav($id, $new_data){
        // Check Nav exist with nav_id
        $query = $this->db->get_where('navs', ['nav_id' =>  $id] );

        if ($this->db->affected_rows() > 0) {
            
            // Update User
            $update_data = [
                'nav_name' =>  $new_data['name'],
                'nav_order' =>  $new_data['order']
            ];

            return $this->db->update('navs', $update_data, ['nav_id' => $query->row('nav_id')]);
        }
        return false;
	}

    /**  Delete function  */
    // --------------------------------------------------------------------------------------------------
    public function delete_nav($id)
    {
		$this->db->delete('navs', ['nav_id'=>$id]);
    }

}


