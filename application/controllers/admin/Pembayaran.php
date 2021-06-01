<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pembayaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		# Load model, helper dan library
		$this->load->model('Detailpemb_model');
	}

	public function index()
	{
		$data['detailpemb']	= $this->Detailpemb_model->detailpemb_getAll();
		$this->load->view('admin/pembayaran/v_pembayaran', $data);
	}
}
?>