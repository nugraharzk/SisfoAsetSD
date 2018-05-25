<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//check login
		is_logged_in();
		//load model
        $this->load->model('M_Asset');
        $this->load->model('M_Notifikasi');
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->kib_a();
	}

	public function kib_a()
	{
		$this->session->set_userdata('page',2);

		$config = array();
        $config["base_url"] = site_url('asset/kib_a');
        $config["total_rows"] = $this->M_Asset->count_kiba();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
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
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Back';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$dat['asset'] = $this->M_Asset->getKiba($config["per_page"],$page);
		
		$dat['links'] = $this->pagination->create_links();

		$dat['pageid'] = 'kiba';
		$dat['page_title'] = 'KIB A';
		$dat['page_desc'] = 'Asset dari KIB A';
		$data['page'] = $this->load->view('kib_a', $dat, true);

		$this->load->view('layouts/layout',$data);
	}

	public function tambahKibA()
	{
		$input = $this->input->post();
		
		$this->M_Asset->insertKibA($input);
		$data['table'] = 'KIB A';
		$data['row'] = $input['nama_barang'];

		$this->M_Notifikasi->insertNotif(1,$data);

		redirect('asset/kib_a');
	}

	public function editKIBA()
	{
		$id = $this->input->post('id_barang');
		$input = $this->input->post(array('nama_barang','luas','tahun_peroleh','status_hak','penggunaan'));
		$this->M_Asset->updateKIBA($id,$input);
		redirect('asset/kib_a');
	}

	public function deleteKiba($id)
	{
		$asset = $this->M_Asset->getOneKiba($id);
		$this->M_Asset->deleteKiba($id);

		$data['table'] = 'KIB A';
		$data['row'] = $asset->nama_barang;

		$this->M_Notifikasi->insertNotif(2,$data);

		redirect('asset/kib_a');
	}

	public function kib_b()
	{
		/*date_default_timezone_set('UTC');
		$now = date('Y-m-d H:i:s');
		echo $now;*/
	}

	public function kir_kantor()
	{
		# code...
	}

	public function kib_c()
	{
		# code...
	}

	public function kib_d()
	{
		# code...
	}

	public function kib_e()
	{
		# code...
	}

	public function kib_f()
	{
		# code...
	}

	public function atb()
	{
		# code...
	}
}

/* End of file asset.php */
/* Location: ./application/controllers/asset.php */
