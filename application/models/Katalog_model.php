<?php defined('BASEPATH') or exit('No direct script access allowed');


class barang_model extends CI_model
{

	public function barang_getAll()
	{
		$query = $this->db->query("SELECT * FROM barang");
		return $query;
	}

	public function barang_getById($id)
	{
		$query = $this->db->query("SELECT * FROM barang where idbarang = $id");
		return $query;
	}

	public function barang_insert($table , $data)
	{
		$query = $this->db->insert($table , $data);
		return $query;
	}

	public function barang_update($id , $table , $data)
	{
		$query = $this->db->where('idbarang' , $id);
		$query = $this->db->update($table , $data);
		return $query;
	}

	public function barang_delete($table , $id)
	{
		$query = $this->db->where('idbarang' , $id);
		$query = $this->db->delete($table);
		return $query;
	}

	public function barang_cek($nama)
	{
		$query = $this->db->query( "SELECT nama FROM barang where nama = '$nama'");
		return $query->result_array ();
	}

	public function tampil_data(){
		return $this->db->get('barang');
	}
}
?>