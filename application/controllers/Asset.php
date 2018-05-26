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
		$dat['asset'] = $this->M_Asset->getAsset("kib_a",$config["per_page"],$page);
		
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

		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		
		$this->M_Asset->insertKibA($input);
		$data['table'] = 'KIB A';
		$data['row'] = $input['nama_barang'];

		$this->M_Notifikasi->insertNotif(1,$data);

		redirect('asset/kib_a');
	}

	public function editKIBA()
	{
		$id = $this->input->post('id_barang');
		$input = $this->input->post();
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
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
		$this->session->set_userdata('page',3);

		$config = array();
        $config["base_url"] = site_url('asset/kib_b');
        $config["total_rows"] = $this->M_Asset->count_kibb();
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
		$dat['asset'] = $this->M_Asset->getAsset("kib_b",$config["per_page"],$page);
		
		$dat['links'] = $this->pagination->create_links();

		$dat['pageid'] = 'kibb';
		$dat['page_title'] = 'KIB B';
		$dat['page_desc'] = 'Asset dari KIB B';
		$data['page'] = $this->load->view('kib_b', $dat, true);

		$this->load->view('layouts/layout',$data);
	}

	public function tambahKibB()
	{
		$input = $this->input->post();
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		$this->M_Asset->insertKibB($input);
		$data['table'] = 'KIB B';
		$data['row'] = $input['nama_barang'];

		$this->M_Notifikasi->insertNotif(1,$data);

		redirect('asset/kib_b');
	}

	public function editKibB()
	{
		$id = $this->input->post('id_barang');
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		$input = $this->input->post();
		$this->M_Asset->updateKibB($id,$input);

		redirect('asset/kib_b');
	}

	public function deleteKibB($id)
	{
		$asset = $this->M_Asset->getOneKibB($id);
		$this->M_Asset->deleteKibB($id);

		$data['table'] = 'KIB B';
		$data['row'] = $asset->nama_barang;

		$this->M_Notifikasi->insertNotif(2,$data);

		redirect('asset/kib_b');
	}

	public function kir_kantor()
	{
		$this->session->set_userdata('page',4);

		$config = array();
        $config["base_url"] = site_url('asset/kir_kantor');
        $config["total_rows"] = $this->M_Asset->count_kirkantor();
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
		$config['cur_tag_open'] = '<b>';
		$config['cur_tag_close'] = '</b>';

		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$dat['asset'] = $this->M_Asset->getAsset("kir_kantor",$config["per_page"],$page);
		
		$dat['links'] = $this->pagination->create_links();
		$dat['depresi'] = $this->depreciationMethod($dat['asset'][0]->tahun_beli, $dat['asset'][0]->harga, null);

		$dat['pageid'] = 'kirkantor';
		$dat['page_title'] = 'KIR KANTOR';
		$dat['page_desc'] = 'Asset dari KIR KANTOR';
		$data['page'] = $this->load->view('kir_kantor', $dat, true);

		$this->load->view('layouts/layout',$data);
	}

	public function tambahKir()
	{
		$input = $this->input->post();

		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], '');

		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		
		$this->M_Asset->insertKir($input);
		$data['table'] = 'KIR KANTOR';
		$data['row'] = $input['nama_barang'];

		$this->M_Notifikasi->insertNotif(1,$data);

		redirect('asset/kir_kantor');
	}

	public function editKir()
	{
		$id = $this->input->post('id_barang');
		
		$input = $this->input->post();
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], '');
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];

		$this->M_Asset->updateKir($id,$input);

		redirect('asset/kir_kantor');
	}

	public function deleteKir($id)
	{
		$asset = $this->M_Asset->getOneKir($id);
		$this->M_Asset->deleteKir($id);

		$data['table'] = 'KIR KANTOR';
		$data['row'] = $asset->nama_barang;

		$this->M_Notifikasi->insertNotif(2,$data);

		redirect('asset/kir_kantor');
	}

	public function kib_c()
	{
		$this->session->set_userdata('page',5);

		$config = array();
        $config["base_url"] = site_url('asset/kib_c');
        $config["total_rows"] = $this->M_Asset->count_kibc();
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
		$dat['asset'] = $this->M_Asset->getAsset("kib_c",$config["per_page"],$page);
		
		$dat['links'] = $this->pagination->create_links();

		$dat['pageid'] = 'kibc';
		$dat['page_title'] = 'KIB C';
		$dat['page_desc'] = 'Asset dari KIB C';
		$data['page'] = $this->load->view('kib_c', $dat, true);

		$this->load->view('layouts/layout',$data);
	}

	public function tambahKibc()
	{
		$input = $this->input->post();
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		$this->M_Asset->insertKibc($input);
		$data['table'] = 'KIB C';
		$data['row'] = $input['nama_barang'];

		$this->M_Notifikasi->insertNotif(1,$data);

		redirect('asset/kib_c');
	}

	public function editKibc()
	{
		$id = $this->input->post('id_barang');
		$input = $this->input->post();
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		$this->M_Asset->updateKibc($id,$input);

		redirect('asset/kib_c');
	}

	public function deleteKibc($id)
	{
		$asset = $this->M_Asset->getOneKibc($id);
		$this->M_Asset->deleteKibc($id);

		$data['table'] = 'KIB C';
		$data['row'] = $asset->nama_barang;

		$this->M_Notifikasi->insertNotif(2,$data);

		redirect('asset/kib_c');
	}

	public function kib_d()
	{
		$this->session->set_userdata('page',6);

		$config = array();
        $config["base_url"] = site_url('asset/kib_d');
        $config["total_rows"] = $this->M_Asset->count_kibd();
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
		$dat['asset'] = $this->M_Asset->getAsset("kib_d",$config["per_page"],$page);
		
		$dat['links'] = $this->pagination->create_links();

		$dat['pageid'] = 'kibd';
		$dat['page_title'] = 'KIB D';
		$dat['page_desc'] = 'Asset dari KIB D';
		$data['page'] = $this->load->view('kib_d', $dat, true);

		$this->load->view('layouts/layout',$data);
	}

	public function tambahKibd()
	{
		$input = $this->input->post();
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		$this->M_Asset->insertKibd($input);
		$data['table'] = 'KIB D';
		$data['row'] = $input['nama_barang'];

		$this->M_Notifikasi->insertNotif(1,$data);

		redirect('asset/kib_d');
	}

	public function editKibd()
	{
		$id = $this->input->post('id_barang');
		$input = $this->input->post();
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		$this->M_Asset->updateKibd($id,$input);

		redirect('asset/kib_d');
	}

	public function deleteKibd($id)
	{
		$asset = $this->M_Asset->getOneKibd($id);
		$this->M_Asset->deleteKibd($id);

		$data['table'] = 'KIB D';
		$data['row'] = $asset->nama_barang;

		$this->M_Notifikasi->insertNotif(2,$data);

		redirect('asset/kib_d');
	}

	public function kib_e()
	{
		$this->session->set_userdata('page',7);

		$config = array();
        $config["base_url"] = site_url('asset/kib_e');
        $config["total_rows"] = $this->M_Asset->count_kibe();
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
		$dat['asset'] = $this->M_Asset->getAsset("kib_e",$config["per_page"],$page);
		
		$dat['links'] = $this->pagination->create_links();

		$dat['pageid'] = 'kibe';
		$dat['page_title'] = 'KIB E';
		$dat['page_desc'] = 'Asset dari KIB E';
		$data['page'] = $this->load->view('kib_e', $dat, true);

		$this->load->view('layouts/layout',$data);
	}

	public function tambahKibe()
	{
		$input = $this->input->post();
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		$this->M_Asset->insertKibe($input);
		$data['table'] = 'KIB E';
		$data['row'] = $input['nama_barang'];

		$this->M_Notifikasi->insertNotif(1,$data);

		redirect('asset/kib_e');
	}

	public function editKibe()
	{
		$id = $this->input->post('id_barang');
		$input = $this->input->post();
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		$this->M_Asset->updateKibe($id,$input);

		redirect('asset/kib_e');
	}

	public function deleteKibe($id)
	{
		$asset = $this->M_Asset->getOneKibe($id);
		$this->M_Asset->deleteKibe($id);

		$data['table'] = 'KIB E';
		$data['row'] = $asset->nama_barang;

		$this->M_Notifikasi->insertNotif(2,$data);

		redirect('asset/kib_e');
	}

	public function kib_f()
	{
		$this->session->set_userdata('page',8);

		$config = array();
        $config["base_url"] = site_url('asset/kib_f');
        $config["total_rows"] = $this->M_Asset->count_kibf();
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
		$dat['asset'] = $this->M_Asset->getAsset("kib_f",$config["per_page"],$page);
		
		$dat['links'] = $this->pagination->create_links();

		$dat['pageid'] = 'kibf';
		$dat['page_title'] = 'KIB F';
		$dat['page_desc'] = 'Asset dari KIB F';
		$data['page'] = $this->load->view('kib_f', $dat, true);

		$this->load->view('layouts/layout',$data);
	}

	public function tambahKibf()
	{
		$input = $this->input->post();
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		$this->M_Asset->insertKibf($input);
		$data['table'] = 'KIB F';
		$data['row'] = $input['nama_barang'];

		$this->M_Notifikasi->insertNotif(1,$data);

		redirect('asset/kib_f');
	}

	public function editKibf()
	{
		$id = $this->input->post('id_barang');
		$input = $this->input->post();
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		$this->M_Asset->updateKibf($id,$input);

		redirect('asset/kib_f');
	}

	public function deleteKibf($id)
	{
		$asset = $this->M_Asset->getOneKibf($id);
		$this->M_Asset->deleteKibf($id);

		$data['table'] = 'KIB F';
		$data['row'] = $asset->nama_barang;

		$this->M_Notifikasi->insertNotif(2,$data);

		redirect('asset/kib_f');
	}

	public function atb()
	{
		$this->session->set_userdata('page',9);

		$config = array();
        $config["base_url"] = site_url('asset/atb');
        $config["total_rows"] = $this->M_Asset->count_atb();
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
		$dat['asset'] = $this->M_Asset->getAsset("atb",$config["per_page"],$page);
		
		$dat['links'] = $this->pagination->create_links();

		$dat['pageid'] = 'atb';
		$dat['page_title'] = 'ATB';
		$dat['page_desc'] = 'Asset dari ATB';
		$data['page'] = $this->load->view('atb', $dat, true);

		$this->load->view('layouts/layout',$data);
	}

	public function tambahAtb()
	{
		$input = $this->input->post();
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		$this->M_Asset->insertAtb($input);
		$data['table'] = 'ATB';
		$data['row'] = $input['nama_barang'];

		$this->M_Notifikasi->insertNotif(1,$data);

		redirect('asset/atb');
	}

	public function editAtb()
	{
		$id = $this->input->post('id_barang');
		$input = $this->input->post();
		$depresi = $this->depreciationMethod($input['masa_manfaat'], $input['harga'], 0);
		$input['penyusutan_akhir'] = $depresi[$depresi['jumlah']-1]['total'];
		$this->M_Asset->updateAtb($id,$input);

		redirect('asset/atb');
	}

	public function deleteAtb($id)
	{
		$asset = $this->M_Asset->getOneAtb($id);
		$this->M_Asset->deleteAtb($id);

		$data['table'] = 'ATB';
		$data['row'] = $asset->nama_barang;

		$this->M_Notifikasi->insertNotif(2,$data);

		redirect('asset/atb');
	}


	public function depreciationMethod($year,$price,$acc=0)
	{
		for ($i=0; $i < $year; $i++) { 
			if ($i == 0) {
				$weight = ((100/$year * 2)/100) * $price;
				$acc = $acc + $weight;
				$total = $price - $acc;

				$data[$i]['beban'] = $weight;
				$data[$i]['acc'] = $acc;
				$data[$i]['total'] = $total;
			}
			else{
				$weight = ((100/$year * 2)/100) * $total;
				$acc = $acc + $weight;
				$total = $price - $acc;

				$data[$i]['beban'] = $weight;
				$data[$i]['acc'] = $acc;
				$data[$i]['total'] = $total;
			}

			/*print_r($data[$i]['beban']."   ");
			print_r($data[$i]['acc']."   ");
			print_r($data[$i]['total']."<br>");*/
		}

		$data['jumlah'] = $i;

		return $data;
	}
}

/* End of file asset.php */
/* Location: ./application/controllers/asset.php */
