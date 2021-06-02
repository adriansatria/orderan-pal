<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengembalian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		# Load model, helper dan library
		$this->load->model('pengembalian_model');
	}

	public function index()
	{
		$data['pengembalian'] = $this->pengembalian_model->pengembalian_getAll();
		$this->load->view('admin/pengembalian/v_pengembalian', $data);
	}
}
?>