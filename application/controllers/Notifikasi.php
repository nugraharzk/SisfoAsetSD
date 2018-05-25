<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//check login
		is_logged_in();
		//Load Dependencies
		$this->load->library('pagination');
        $this->load->model('M_Notifikasi');
		//$this->load->model('m_balai');
		// $this->output->enable_profiler(true);

	}

	public function index()
	{
		$dat['notif'] = $this->M_Notifikasi->getAllNotif();
		$this->session->set_userdata('page',10);

		$this->load->library('pagination');
		
		$config['base_url'] = site_url('notifikasi/page');
		$config['total_rows'] = $this->M_Notifikasi->get_jumlah_records();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$offset = $this->uri->segment(3);
		
		$this->pagination->initialize($config);

		
		
		$dat['paging'] = $this->pagination->create_links();

		//ambil data koleksi
		$dat['pageid'] = 'notifikasi';
		$dat['page_title'] = 'NOTIFIKASI';
		$dat['page_desc'] = 'Halaman untuk melihat laporan asset.';
		$dat['select'] = 10;
		$data['page'] = $this->load->view('notifikasi', $dat, true);

		$this->load->view('layouts/layout',$data);
	}

	public function insertNotif($id)
	{
		$this->M_Notifikasi->insertNotif($id);
	}
}

/* End of file notifikasi.php */
/* Location: ./application/controllers/notifikasi.php */
