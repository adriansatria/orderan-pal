<?php defined('BASEPATH') or exit('No direct script access allowed');


class User_model extends CI_model
{

	public function user_getAll()
	{
		$query = $this->db->query("SELECT * FROM user");
		return $query;
	}

	public function user_getById($id)
	{
		$query = $this->db->query("SELECT * FROM user where iduser = $id");
		return $query;
	}

		public function user_insert($table , $data)
	{
		$query = $this->db->insert($table , $data);
		return $query;
	}

		public function user_update($id , $table , $data)
	{
		$query = $this->db->where('iduser' , $id);
		$query = $this->db->update($table , $data);
		return $query;
	}

		public function user_delete($table , $id)
	{
		$query = $this->db->where('iduser' , $id);
		$query = $this->db->delete($table);
		return $query;
	}

	public function user_cek($username)
	{
		$query = $this->db->query( "SELECT username FROM user where username = '$username'");
		return $query->result_array ();
	}
	
}
?>