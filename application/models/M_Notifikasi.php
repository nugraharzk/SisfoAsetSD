<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Notifikasi extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	}

	public function getAllNotif()
	{
		return $this->db->select('*')->get('notifikasi')->result();
	}

	public function insertNotif($id,$ket)
	{
		if ($id == 1) {
			$pesan = "Pengadaan ".$ket['table']." Baru : ".$ket['row'];
		}else if($id == 2){
			$pesan = "Penghapusan ".$ket['row']." Pada ".$ket['table'];
		}

		$data = array('pesan' => $pesan);
		$this->db->insert('notifikasi',$data);
	}

	public function get_jumlah_records()
	{
		//hitung jumlah semua records
		return $this->db->count_all('notifikasi');
	}

}

/* End of file M_asset.php */
/* Location: ./application/models/M_asset.php */