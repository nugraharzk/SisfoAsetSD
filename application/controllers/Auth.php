<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		//$this->output->enable_profiler(TRUE);
		$this->load->model('M_Auth');

	}

	// List all your items
	public function index()
	{
		$data['page_title'] = 'Pengelola Barang Milik Daerah';
		$data['page_desc'] = 'Login Page';
		// $data['user'] = $this->m_auth->get_id_row($id);
		// $data['page'] = $this->load->view('login','',true);

		$this->load->view('login',$data);
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//check jika tombol submit ditekan
		if(!$username || !$password){
			redirect('auth');
		}else{

			$user = $this->M_Auth->login($username,$password);

			if(!$user){
				$data['nama'] = $username;
				$this->load->view('v_error', $data);
			}else{
				//set session
				$data = $user->row();
				$array = array(
					'is_logged_in' => true,
					'user_id' => $data->id,
					'level' => $data->level,
					'nama' => $data->nama,
					'username' => $data->username,
					'page' => 1
				);
				
				$this->session->set_userdata( $array );
				redirect('dashboard');
			}
		}
	}

	public function updateAkun()
	{
		$id = $this->input->post('id');
		$data = $this->input->post(array('nama','username','password','level'));
		$this->M_Auth->updateUser($id,$data);

		$updated = $this->M_Auth->get_id_row($id);
		$data = array(
					'is_logged_in' => true,
					'user_id' => $updated->id,
					'nama' => $updated->nama,
					'username' => $updated->username,
					'level' => $updated->level
				);
		$this->session->set_userdata($data);

		redirect('dashboard');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
