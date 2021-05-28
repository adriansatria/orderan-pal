<?php defined('BASEPATH') or exit('No direct script access allowed');


class promo_model extends CI_model
{

	public function promo_getAll()
	{
		$query = $this->db->query("SELECT * FROM promo");
		return $query;
	}

	public function promo_getById($id)
	{
		$query = $this->db->query("SELECT * FROM promo where idpromo = $id");
		return $query;
	}

	public function promo_insert($table , $data)
	{
		$query = $this->db->insert($table , $data);
		return $query;
	}

	public function promo_update($id , $table , $data)
	{
		$query = $this->db->where('idpromo' , $id);
		$query = $this->db->update($table , $data);
		return $query;
	}

	public function promo_delete($table , $id)
	{
		$query = $this->db->where('idpromo' , $id);
		$query = $this->db->delete($table);
		return $query;
	}

	public function promo_cek($nama)
	{
		$query = $this->db->query( "SELECT nama FROM promo where nama = '$nama'");
		return $query->result_array ();
	}
}
?>