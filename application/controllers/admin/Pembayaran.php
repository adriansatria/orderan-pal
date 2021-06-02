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
		$tglpinjam = strip_tags($this->input->post('tanggalPinjam'));
		$tglkembali = strip_tags($this->input->post('tanggalKembali'));

		$data = array(
			'totalpembayaran' => $total_bayar,
			'jumlahsewa' => $total_pinjam,
			'bayar' => $bayar,
			'kembalian' => $kembalian,
			'tanggalpeminjaman' => $tglpinjam,
			'tanggalpengembalian' => $tglkembali
		);

		$this->Detailpemb_model->detailpemb_insert('detailpemb', $data);
		echo '<script language=JavaScript>alert("Input Berhasil")
			onclick=location.href = document.referrer</script>';
	}

	// INSERT INTO TRANSAKSI PENGEMBALIAN
	public function insertinto($id)
	{
		$id = strip_tags($this->input->post ( 'id' ));
		$total = strip_tags($this->input->post ( 'i_total' ));
		$jumlahsewa = strip_tags( $this->input->post ('i_jumlah'));
		$bayar = strip_tags( $this->input->post ('i_bayar'));
		$kembali = strip_tags( $this->input->post ('i_kembali'));
		$tgl_pinjam = strip_tags( $this->input->post ('i_pinjam'));
		$tgl_kembali = strip_tags( $this->input->post ('i_pengembali'));
		$ketdenda = strip_tags( $this->input->post ('i_ketdenda'));
		$total_denda = strip_tags( $this->input->post ('i_totaldenda'));

		$data = array (
			'iddetailpemb' => $id,
			'totalpembayaran' => $total,
			'jumlahsewa' => $jumlahsewa,
			'bayar' => $bayar,
			'kembalian' => $kembali,
			'tanggalpeminjaman' => $tgl_pinjam,
			'tanggalpengembalian' => $tgl_kembali,
			'keterangandenda' => $ketdenda,
			'totaldenda' => $total_denda
		);

		$this->Detailpemb_model->detailpemb_insertinto($id, 'pengembalian', $data);
		echo '<script language=JavaScript>alert("Pengembalian Berhasil"); onclick=location.href = document.referrer</script>' ;

	}
}
?>