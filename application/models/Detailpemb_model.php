<?php defined('BASEPATH') or exit('No direct script access allowed');

class Detailpemb_model extends CI_Model
{
	public function detailpemb_getAll()
	{
		$query = $this->db->query("SELECT * FROM detailpemb");
		return $query;
	}

	public function detailpemb_getById($id)
	{
		$query = $this->db->query("SELECT * FROM detailpemb where author_id=$id");
		return $query;
	}

	public function detailpemb_insert ($table , $data)
	{
		$query = $this ->db->insert ($table , $data);
		return $query ;
	}

	public function detailpemb_update ($id , $table , $data)
	{
		$query = $this ->db->where ('iddetailpemb' , $id);
		$query = $this ->db->update ($table , $data);
		return $query ;
	}

	public function detailpemb_delete ($table , $id)
	{
		$query = $this ->db->where ('iddetailpemb' , $id);
		$query = $this ->db->delete ($table);
		return $query ;
	}

	public function detailpemb_cek ($title)
	{
		$query = $this ->db->query ("SELECT title FROM detailpemb where title = '$title'");
		return $query->result_array();
	}

}
?>