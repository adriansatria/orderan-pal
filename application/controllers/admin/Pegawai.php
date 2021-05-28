<?php defined('BASEPATH') or exit('No direct script access allowed');

class pegawai extends CI_Controller 
{
	public function __construct()
	{
		parent :: __construct();
			# Load model, helper and library
		$this->load->model('pegawai_model');
	}

	public function index()
	{
		$data['pegawai'] = $this->pegawai_model->pegawai_getAll();
		$this->load->view('admin/pegawai/v_pegawai', $data);
	}
	public function pegawai()
	{
		$data['pegawai'] = $this->pegawai_model->pegawai_getAll();
		$this->load->view('pegawai', $data);
	}

	public function add()
	{
		$nama = strip_tags($this->input->post ( 'i_nama' ));
		$alamat = strip_tags( $this->input->post ('i_alamat'));
		$notelp = strip_tags( $this->input->post ('i_notelp'));
			// Input Array
		$data = array (
			'nama' => $nama,
			'alamat' => $alamat,
			'notelp' => $notelp, 
		);
			//Insert ke Database
		$x = $this->pegawai_model->pegawai_cek($nama);
		if ($x==Null) {
			$this->pegawai_model->pegawai_insert ( 'pegawai' , $data);
			echo '<script language=JavaScript>alert("Input Berhasil"); onclick=location.href = document.referrer</script>' ;
		}
		else
		{
			echo '<script language=JavaScript>alert("Gagal!! pegawai telah tersimpan sebelumnya"); onclick=history.go(-1)</script>' ;
		}
	}

	public function edit($id)
	{
		$data['pegawai'] = $this->pegawai_model->pegawai_getById ($id);
		$nama = strip_tags($this->input->post ( 'i_nama' ));
		$alamat = strip_tags( $this->input->post ('i_alamat'));
		$notelp = strip_tags( $this->input->post ('i_notelp'));
		$data = array (
			'nama' => $nama,
			'alamat' => $alamat,
			'notelp' => $notelp, 
		);
			// Insert ke Database
		$x = $this->pegawai_model->pegawai_cek ($nama);
		if ($x==Null){
			$this->pegawai_model->pegawai_update ($id, 'pegawai', $data);
			echo '<script language=JavaScript>alert("Update Berhasil");
			onclick=location.href = document.referrer</script>';
		}else {
			echo '<script language=JavaScript>alert("Gagal!! pegawai telah tersimpan sebelumnya"); onclick=history.go(-1)</script>' ;
		}
	}

	public function delete($id)
	{
		$this->pegawai_model->pegawai_delete('pegawai', $id );
		echo '<script language=JavaScript>alert("Delete Berhasil");
		onclick=history.go(-1)</script>';
	}
}
?>