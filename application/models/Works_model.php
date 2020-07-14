<?php

class Works_model extends CI_Model
{

    /**  Get all function  */
    // --------------------------------------------------------------------------------------------------
	public function get_all_works(){
		$works = $this->db->get('works');
		return $works->result();
	}

    /**  Get One function  */
    // --------------------------------------------------------------------------------------------------
	public function get_work($id){
		$work = $this->db->get_where('works', ['id' => $id]);
		return $work->row();
	}

    /**  Insert function  */
    // --------------------------------------------------------------------------------------------------
	public function insert_work($data){
		$this->db->insert('works', $data);
		return $this->db->insert_id();
	}

    /**  Update function  */
    // --------------------------------------------------------------------------------------------------
	public function update_work($id, $new_data){
        // Check work exist with id
        $query = $this->db->get_where('works', ['id' =>  $id] );

        if ($this->db->affected_rows() > 0) {
            
            // Update User
            $update_data = [
                'title' =>  $new_data['title'],
                'description' =>  $new_data['description'],
                'img' =>  $new_data['img'],
                'order' =>  $new_data['order'],
            ];

            return $this->db->update('works', $update_data, ['id' => $query->row('id')]);
        }
        return false;
	}



	/****  View work on site */
	//--------------------------------------------------------------------------------------------------
	public function view_onsite($workID, $view)
	{
		$query = $this->db->get_where('works', ['id' =>  $workID] );

        if ($this->db->affected_rows() > 0) {
            
            // Update User
            $update_data = [
                'view' =>  $view
            ];

            return $this->db->update('works', $update_data, ['id' => $query->row('id')]);
        }
	}



	    /**  Delete function  */
    // --------------------------------------------------------------------------------------------------
    public function delete_work($id)
    {
		$this->db->delete('works', ['id'=>$id]);
    }
}


