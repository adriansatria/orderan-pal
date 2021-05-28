<?php defined('BASEPATH') or exit('No direct script access allowed');


class pegawai_model extends CI_model
{

	public function pegawai_getAll()
	{
		$query = $this->db->query("SELECT * FROM pegawai");
		return $query;
	}

	public function pegawai_getById($id)
	{
		$query = $this->db->query("SELECT * FROM pegawai where idpegawai = $id");
		return $query;
	}

	public function pegawai_insert($table , $data)
	{
		$query = $this->db->insert($table , $data);
		return $query;
	}

	public function pegawai_update($id , $table , $data)
	{
		$query = $this->db->where('idpegawai' , $id);
		$query = $this->db->update($table , $data);
		return $query;
	}

	public function pegawai_delete($table , $id)
	{
		$query = $this->db->where('idpegawai' , $id);
		$query = $this->db->delete($table);
		return $query;
	}

	public function pegawai_cek($nama)
	{
		$query = $this->db->query( "SELECT nama FROM pegawai where nama = '$nama'");
		return $query->result_array ();
	}
}
?>