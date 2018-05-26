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

	public function getOneKibB($id)
	{
		return $this->db->select('*')->where('id_barang',$id)->get('kib_b')->row();
	}

	public function getOneKir($id)
	{
		return $this->db->select('*')->where('id_barang',$id)->get('kir_kantor')->row();
	}

	public function getAsset($table,$limit,$start)
	{
		$this->db->limit($limit, $start);
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	/* KIB A */

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

	/* --------------------------- KIB B --------------------------- */

	public function insertKibB($data)
	{
		$this->db->insert('kib_b',$data);
	}

	public function updateKibB($id,$data)
	{
		$this->db->where('id_barang',$id)->update('kib_b',$data);
	}

	public function deleteKibB($id)
	{
		$this->db->where('id_barang',$id)->delete('kib_b');
	}

	/* --------------------------- KIR KANTOR --------------------------- */

	public function insertKir($data)
	{
		$this->db->insert('kir_kantor',$data);
	}

	public function updateKir($id,$data)
	{
		$this->db->where('id_barang',$id)->update('kir_kantor',$data);
	}

	public function deleteKir($id)
	{
		$this->db->where('id_barang',$id)->delete('kir_kantor');
	}

	/* --------------------------- KIB C --------------------------- */

	public function insertKibC($data)
	{
		$this->db->insert('kib_c',$data);
	}

	public function updateKibC($id,$data)
	{
		$this->db->where('id_barang',$id)->update('kib_c',$data);
	}

	public function deleteKibC($id)
	{
		$this->db->where('id_barang',$id)->delete('kib_c');
	}

	/* --------------------------- KIB D --------------------------- */

	public function insertKibD($data)
	{
		$this->db->insert('kib_d',$data);
	}

	public function updateKibD($id,$data)
	{
		$this->db->where('id_barang',$id)->update('kib_d',$data);
	}

	public function deleteKibD($id)
	{
		$this->db->where('id_barang',$id)->delete('kib_d');
	}

	/* --------------------------- KIB E --------------------------- */

	public function insertKibE($data)
	{
		$this->db->insert('kib_e',$data);
	}

	public function updateKibE($id,$data)
	{
		$this->db->where('id_barang',$id)->update('kib_e',$data);
	}

	public function deleteKibE($id)
	{
		$this->db->where('id_barang',$id)->delete('kib_e');
	}

	/* --------------------------- KIB F --------------------------- */

	public function insertKibF($data)
	{
		$this->db->insert('kib_f',$data);
	}

	public function updateKibF($id,$data)
	{
		$this->db->where('id_barang',$id)->update('kib_f',$data);
	}

	public function deleteKibF($id)
	{
		$this->db->where('id_barang',$id)->delete('kib_f');
	}

	/* --------------------------- ATB --------------------------- */

	public function insertATB($data)
	{
		$this->db->insert('atb',$data);
	}

	public function updateATB($id,$data)
	{
		$this->db->where('id_barang',$id)->update('atb',$data);
	}

	public function deleteATB($id)
	{
		$this->db->where('id_barang',$id)->delete('atb');
	}




	/* ------------------------------- COUNT METHOD -------------------------------- */

	public function count_kiba()
	{
		return $this->db->count_all('kib_a');
	}

	public function count_kibb()
	{
		return $this->db->count_all('kib_b');
	}

	public function count_kibc()
	{
		return $this->db->count_all('kib_c');
	}

	public function count_kibd()
	{
		return $this->db->count_all('kib_d');
	}

	public function count_kibe()
	{
		return $this->db->count_all('kib_e');
	}

	public function count_kibf()
	{
		return $this->db->count_all('kib_f');
	}

	public function count_kirkantor()
	{
		return $this->db->count_all('kir_kantor');
	}

	public function count_atb()
	{
		return $this->db->count_all('atb');
	}

}

/* End of file M_asset.php */
/* Location: ./application/models/M_asset.php */