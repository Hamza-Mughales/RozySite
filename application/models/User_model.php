<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model
{
    protected $user_table = 'users';

	/**
     * Get User
     * @param: {array} User Data
     */
	public function get_users($user_id = NULL) 
	{
		if($user_id != NULL)
		{
			// git a user where id 
			$user = $this->db->get_where('users', ['id' => $user_id]);
			return $user->row();
		}
		else
		{
			// get all users
			$users = $this->db->get($this->user_table)->result();
			if ($users){
				return $users;
			}else
			{
				return FALSE;
			}
		}
    }

    /**
     * Use Registration
     * @param: {array} User Data
     */
    public function insert_user(array $data) {
        $this->db->insert($this->user_table, $data);
        return $this->db->insert_id();
    }

    /**
     * User Login
     * ----------------------------------
     * @param: user name or email address
     * @param: password
     */
    public function user_login($name, $password)
    {
        $this->db->where('email', $name);
        $this->db->or_where('name', $name);
        $q = $this->db->get($this->user_table);
        if( $q->num_rows() ) 
        {
            $user_pass = $q->row('password');
            if(md5($password) === $user_pass) {
                return $q->row();
            }
            return FALSE;
        }else{
            return FALSE;
        }
	}
	
	/**
     * Update User
     * @param: {array} User Data
     */
    public function user_update($id, array $user_data)
    {
        /**
         * Check User exist with user_id
         */
        $query = $this->db->get_where($this->user_table, ['id' => $id ]);

        if ($this->db->affected_rows() > 0) {
            
            // Update User
            $update_data = [
                'name' =>  $user_data['name'],
                'password' =>  $user_data['password'],
                'email' =>  $user_data['email']
            ];

            return $this->db->update($this->user_table, $update_data, ['id' => $query->row('id')]);
        }   
        return false;
    }

	    /**  Delete function  */
    // --------------------------------------------------------------------------------------------------
    public function delete_user($id)
    {
		$this->db->delete('users', ['id'=>$id]);
    }
}
