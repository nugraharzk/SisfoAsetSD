<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

	public function printLaporan()
	{
		if ($this->session->userdata('page') == 2) {
			$array['tabel'] = "KIB A";
			$array['id'] = "kib_a";
		}else if($this->session->userdata('page') == 3){
			$array['tabel'] = "KIB B";
			$array['id'] = "kib_b";
		}else if($this->session->userdata('page') == 4){
			$array['tabel'] = "KIR KANTOR";
			$array['id'] = "kir_kantor";
		}else if($this->session->userdata('page') == 5){
			$array['tabel'] = "KIB C";
			$array['id'] = "kib_c";
		}else if($this->session->userdata('page') == 6){
			$array['tabel'] = "KIB D";
			$array['id'] = "kib_d";
		}else if($this->session->userdata('page') == 7){
			$array['tabel'] = "KIB E";
			$array['id'] = "kib_e";
		}else if($this->session->userdata('page') == 8){
			$array['tabel'] = "KIB F";
			$array['id'] = "kib_f";
		}else if($this->session->userdata('page') == 9){
			$array['tabel'] = "ATB";
			$array['id'] = "atb";
		}

		// Load plugin PHPExcel nya
	    // include APPPATH.'third_party/PHPExcel.php';
	    $this->load->library('excel');
	    
	    // Panggil class PHPExcel nya
	    $excel = $this->excel;

	    // Settingan awal fil excel
	    $excel->getProperties()->setCreator('Admin')
	                 ->setLastModifiedBy('Administrator')
	                 ->setTitle($array['tabel'])
	                 ->setSubject("Asset")
	                 ->setDescription("Laporan Semua Data Asset dari ".$array['tabel'])
	                 ->setKeywords("Asset");

	    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	    $style_col = array(
	      'font' => array('bold' => true), // Set font nya jadi bold
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	    $style_row = array(
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA ".$array['tabel']); // Set kolom A1 dengan tulisan "DATA SISWA"
	    $excel->getActiveSheet()->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

	    // Buat header tabel nya pada baris ke 3
	    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID BARANG"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA BARANG"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('D3', "HARGA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
	    $excel->setActiveSheetIndex(0)->setCellValue('E3', "MASA MANFAAT"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('F3', "PENYUSUTAN AKHIR"); // Set kolom E3 dengan tulisan "ALAMAT"

	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);

	    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	    $asset = $this->M_Asset->getAllAsset($array['id']);
	    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
	    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4

	    foreach($asset as $data){ // Lakukan looping pada variabel asset
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_barang);
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_barang);
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, "Rp.".$data->harga);
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->masa_manfaat." Tahun");
	      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, "Rp.".$data->penyusutan_akhir);
	      
	      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	      
	      $no++; // Tambah 1 setiap kali looping
	      $numrow++; // Tambah 1 setiap kali looping
	    }

	    // Set width kolom
	    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(35); // Set width kolom B
	    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
	    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
	    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom F
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

	    // Set orientasi kertas jadi LANDSCAPE
	    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

	    // Set judul file excel nya
	    $excel->getActiveSheet(0)->setTitle($array['tabel']);
	    $excel->setActiveSheetIndex(0);

	    // Proses file excel
	    ob_clean();
	    header('Content-Type: application/vnd.ms-excel');
	    header('Content-Disposition: attachment; filename="'.$array['tabel'].'.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	    $write->save('php://output');

	    redirect('asset/kib_a');
	}
}

/* End of file asset.php */
/* Location: ./application/controllers/asset.php */
