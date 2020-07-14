<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	    /**  __construct function  */
    // --------------------------------------------------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Site_model', 'siteModel');
	}

	    /**  Index function  */
    // --------------------------------------------------------------------------------------------------
    public function index()
	{
		$data = $this->siteModel->get_site();
		$data['limit'] = $limit = 9;
		$data['offset'] = $offset = 0;
		$data['works'] = $this->siteModel->get_works($limit,$offset);
		$this->load->view('my_site_view', $data);
	}

	    /**  Get works function  */ // -- uses Ajax
    // --------------------------------------------------------------------------------------------------
    public function get_works(){
		$limit = $this->input->get('limit');
		$offset = $this->input->get('offset');
		
		$output = $this->siteModel->get_works($limit, $offset);
		
		if($output)
		{
			$works = $output;
			// var_dump($works);exit;

			foreach ($works as $work) {
				echo '<div class="col-sm-6 col-lg-4 item zoom-on-hover wow animate__animated animate__fadeInUp ">' .
						'<a class="lightbox" href="' . base_url() . 'files/imgs/works images/' . $work->img . '">' .
							'<img class="img-fluid image" src="' . base_url() . 'files/imgs/works images/' . $work->img . '">' .
						'</a>' .
					'</div>' ;
			}
		} else {
			return false;
		}
	}
}
