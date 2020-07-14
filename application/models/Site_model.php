<?php

class Site_model extends CI_Model
{

	
    /**  Get all Function  */
    // --------------------------------------------------------------------------------------------------
    public function get_site()
    {
		$data = [];
        $data['navs'] = $this->db->order_by('nav_order')->get('navs')->result();
        $data['home'] = $this->db->get('home')->result();
        $data['about'] = $this->db->get('about')->result();
        $data['services'] = $this->db->order_by('order')->get('services')->result();
        $data['skills'] = $this->db->order_by('order')->get('skills')->result();
        $data['settings'] = $this->db->get('settings')->result();
				return $data;
			}
			
			// Get Limited Works
			public function get_works( $limit , $offset){
				$works = $this->db
															->order_by('order')
															->where('view',1)
															->get('works', $limit, $offset)
															->result();
				return $works;
		}
}
