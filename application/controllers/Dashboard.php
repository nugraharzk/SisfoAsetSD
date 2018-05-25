<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

		is_logged_in();
		//$this->output->enable_profiler(TRUE);

	}

	// index dashboard
	public function index( )
	{	
		$data['pageid'] = 'dasbor';
		$data['page_title'] = 'Dasbor';
		$data['page_desc'] = 'Halaman dasbor';
		$data['id'] = $this->session->userdata('user_id');
		$this->session->set_userdata('page',1);
		$data['condition'] = false;
		$data['page']       = $this->load->view('dashboard', '', true);

		$this->load->view('layouts/layout',$data);
	}	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
