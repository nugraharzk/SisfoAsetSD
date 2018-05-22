<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Asset extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	}

	public function getAllKIBA()
	{
		return $this->db->select('*')->get('kib_a')->result();
	}

	public function insertKibA($data)
	{
		$this->db->insert('kib_a',$data);
	}

	public function updateKIBA($id,$data)
	{
		$this->db->where('id_barang',$id)->update('kib_a',$data);
	}

	public function deleteKiba($id)
	{
		$this->db->where('id_barang',$id)->delete('kib_a');
	}

	public function get_jumlah_records()
	{
		//hitung jumlah semua records
		return $this->db->count_all('kib_a');
	}

}

/* End of file M_asset.php */
/* Location: ./application/models/M_asset.php */