<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detailpemb extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		# Load model, helper dan library
		$this->load->model('detailpemb_model');
	}

	public function index()
	{
		$data['detailpemb']		=$this->detailpemb_model->detailpemb_getAll();
		$this->load->view('admin/detailpemb/v_detailpemb', $data);
	}

	public function add()
	{
		$idpenyewaan = strip_tags($this->input->post('i_idpenyewaan'));
		$idpembayaran = strip_tags($this->input->post('i_idpembayaran'));
		$idpromo = strip_tags($this->input->post('i_idpromo'));
		$totalpembayaran = strip_tags($this->input->post('i_totalpembayaran'));
		$jumlahsewa = strip_tags($this->input->post('i_jumlahsewa'));

		// Input Array
		$data = array(
			'idpenyewaan'			=> $idpenyewaan,
			'idpembayaran'	=> $idpembayaran,
			'idpromo'	=> $idpromo,
			'totalpembayaran'			=> $totalpembayaran,
			'jumlahsewa'			=> $jumlahsewa
		);

		// Insert ke Database
		$x = $this->detailpemb_model->detailpemb_cek($idpenyewaan );
		if ($x == Null) {
			$this->detailpemb_model->detailpemb_insert('detailpemb', $data );
			echo '<script language=JavaScript>alert("Input Berhasil")
			onclick=location.href = document.referrer</script>';
		}else
		{
			echo '<script language=JavaScript>alert("Gagal!! detailpemb telat tersimpan sebelumnya")
			onclick=history.go(-1)</script>';
		}
	}

	public function edit($id)
	{
		$data['detailpemb']	= $this->detailpemb_model->detailpemb_getById($id);

		$idpenyewaan = strip_tags($this->input->post('i_idpenyewaan'));
		$idpembayaran = strip_tags($this->input->post('i_idpembayaran'));
		$idpromo = strip_tags($this->input->post('i_idpromo'));
		$totalpembayaran = strip_tags($this->input->post('i_totalpembayaran'));
		$jumlahsewa = strip_tags($this->input->post('i_jumlahsewa'));
		//Input Array

		$data = array(
			'idpenyewaan'			=> $idpenyewaan,
			'idpembayaran'	=> $idpembayaran,
			'idpromo'	=> $idpromo,
			'totalpembayaran'			=> $totalpembayaran,
			'jumlahsewa'			=> $jumlahsewa
		);

		// Inser ke Database
		$x = $this->detailpemb_model->detailpemb_cek($idpenyewaan);
		if ($x == Null) {
			$this->detailpemb_model->detailpemb_update($id,'detailpemb', $data);
			echo '<script language=JavaScript>alert("Update Berhasil")
			onclick=location.href = document.referrer</script>';
		}else{
			echo '<script language=JavaScript>alert("Gagal!! detailpemb telat tersimpan sebelumnya")
			onclick=history.go(-1)</script>';
		}
	}

	public function delete($id)
	{
		$this->detailpemb_model->detailpemb_delete ('detailpemb', $id);
		echo '<script language=JavaScript>alert("Delete Berhasil")
		onclick=history.go(-1)</script>';
	}

}
?>