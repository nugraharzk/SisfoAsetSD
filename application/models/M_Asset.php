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

	public function getOneKiba($id)
	{
		return $this->db->select('*')->where('id_barang',$id)->get('kib_a')->row();
	}

	public function getKiba($limit,$start)
	{
		$this->db->limit($limit, $start);
        $query = $this->db->get("kib_a");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
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

	public function count_kiba()
	{
		return $this->db->count_all('kib_a');
	}

}

/* End of file M_asset.php */
/* Location: ./application/models/M_asset.php */