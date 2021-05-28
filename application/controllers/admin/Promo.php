<?php defined('BASEPATH') or exit('No direct script access allowed');

class promo extends CI_Controller 
{
	public function __construct()
	{
		parent :: __construct();
			# Load model, helper and library
		$this->load->model('promo_model');
	}

	public function index()
	{
		$data['promo'] = $this->promo_model->promo_getAll();
		$this->load->view('admin/promo/v_promo', $data);
	}
	public function promo()
	{
		$data['promo'] = $this->promo_model->promo_getAll();
		$this->load->view('promo', $data);
	}

	public function add()
	{
		$harga = strip_tags($this->input->post ( 'i_harga' ));
		$nama = strip_tags( $this->input->post ('i_nama'));
		$jenis = strip_tags( $this->input->post ('i_jenis'));
			// Input Array
		$data = array (
			'harga' => $harga,
			'nama' => $nama,
			'jenis' => $jenis 
		);
			//Insert ke Database
		$x = $this->promo_model->promo_cek($nama);
		if ($x==Null) {
			$this->promo_model->promo_insert ( 'promo' , $data);
			echo '<script language=JavaScript>alert("Input Berhasil"); onclick=location.href = document.referrer</script>' ;
		}
		else
		{
			echo '<script language=JavaScript>alert("Gagal!! promo telah tersimpan sebelumnya"); onclick=history.go(-1)</script>' ;
		}
	}

	public function edit($id)
	{
		$data['promo'] = $this->promo_model->promo_getById ($id);
		$harga = strip_tags($this->input->post ( 'i_harga' ));
		$nama = strip_tags( $this->input->post ('i_nama'));
		$jenis = strip_tags( $this->input->post ('i_jenis'));
			// Input Array
		$data = array (
			'harga' => $harga,
			'nama' => $nama,
			'jenis' => $jenis 
		);
			// Insert ke Database
		$x = $this->promo_model->promo_cek ($nama);
		if ($x==Null){
			$this->promo_model->promo_update ($id, 'promo', $data);
			echo '<script language=JavaScript>alert("Update Berhasil");
			onclick=location.href = document.referrer</script>';
		}else {
			echo '<script language=JavaScript>alert("Gagal!! promo telah tersimpan sebelumnya"); onclick=history.go(-1)</script>' ;
		}
	}

	public function delete($id)
	{
		$this->promo_model->promo_delete('promo', $id );
		echo '<script language=JavaScript>alert("Delete Berhasil");
		onclick=history.go(-1)</script>';
	}
}
?>