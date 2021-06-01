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

	public function insert()
	{
		$total_pinjam = strip_tags($this->input->post('total_pinjam'));
		$total_bayar = strip_tags($this->input->post('total_bayar'));
		$bayar = strip_tags($this->input->post('Uang_Pembayaran'));
		$kembalian = strip_tags($this->input->post('Kembalian'));

		$data = array(
			'totalpembayaran' => $total_bayar,
			'jumlahsewa' => $total_pinjam,
			'bayar' => $bayar,
			'kembalian' => $kembalian
		);

		$this->Detailpemb_model->detailpemb_insert('detailpemb', $data);
		echo '<script language=JavaScript>alert("Input Berhasil")
			onclick=location.href = document.referrer</script>';
	}
}
?>