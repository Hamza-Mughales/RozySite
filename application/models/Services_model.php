<?php

class Services_model extends CI_Model
{

    /**  Get all function  */
    // --------------------------------------------------------------------------------------------------
	public function get_all_services(){
		$services = $this->db->get('services');
		return $services->result();
	}

    /**  Get One function  */
    // --------------------------------------------------------------------------------------------------
	public function get_service($id){
		$service = $this->db->get_where('services', ['id' => $id]);
		return $service->row();
	}

    /**  Insert function  */
    // --------------------------------------------------------------------------------------------------
	public function insert_service($data){
		$this->db->insert('services', $data);
		return $this->db->insert_id();
	}

    /**  Update function  */
    // --------------------------------------------------------------------------------------------------
	public function update_service($id, $new_data){
        // Check Service exist with id
        $query = $this->db->get_where('services', ['id' =>  $id] );

        if ($this->db->affected_rows() > 0) {
            
            // Update User
            $update_data = [
                'title' =>  $new_data['title'],
                'number' =>  $new_data['number'],
                'order' =>  $new_data['order']
            ];

            return $this->db->update('services', $update_data, ['id' => $query->row('id')]);
        }
        return false;
	}

	    /**  Delete function  */
    // --------------------------------------------------------------------------------------------------
    public function delete_service($id)
    {
		$this->db->delete('services', ['id'=>$id]);
    }
}


