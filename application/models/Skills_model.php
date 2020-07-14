<?php

class Skills_model extends CI_Model
{

    /**  Get all function  */
    // --------------------------------------------------------------------------------------------------
	public function get_all_skills(){
		$skills = $this->db->get('skills');
		return $skills->result();
	}

    /**  Get One function  */
    // --------------------------------------------------------------------------------------------------
	public function get_skill($id){
		$skill = $this->db->get_where('skills', ['id' => $id]);
		return $skill->row();
	}

    /**  Insert function  */
    // --------------------------------------------------------------------------------------------------
	public function insert_skill($data){
		$this->db->insert('skills', $data);
		return $this->db->insert_id();
	}

    /**  Update function  */
    // --------------------------------------------------------------------------------------------------
	public function update_skill($id, $new_data){
        // Check skill exist with id
        $query = $this->db->get_where('skills', ['id' =>  $id] );

        if ($this->db->affected_rows() > 0) {
            
            // Update User
            $update_data = [
                'title' =>  $new_data['title'],
                'percent' =>  $new_data['percent'],
                'order' =>  $new_data['order'],
                'color' =>  $new_data['color'],
            ];

            return $this->db->update('skills', $update_data, ['id' => $query->row('id')]);
        }
        return false;
	}

	    /**  Delete function  */
    // --------------------------------------------------------------------------------------------------
    public function delete_skill($id)
    {
		$this->db->delete('skills', ['id'=>$id]);
    }
}


