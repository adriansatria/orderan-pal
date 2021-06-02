<?php defined('BASEPATH') or exit('No direct script access allowed');

class pengembalian_model extends CI_Model
{
    public function pengembalian_getAll()
	{
		$query = $this->db->query("SELECT * FROM pengembalian");
		return $query;
	}

	public function pengembalian_getById($id)
	{
		$query = $this->db->query("SELECT * FROM pengembalian where idpengembalian=$id");
		return $query;
	}

	public function pengembalian_delete($table , $id)
	{
		$query = $this->db->where('idpengembalian' , $id);
		$query = $this->db->delete($table);
		return $query;
	}
}
?>