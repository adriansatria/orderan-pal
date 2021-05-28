<?php defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller 
{
	public function __construct()
	{
		parent :: __construct();
			# Load model, helper and library
		$this->load->model('customer_model');
	}

	public function index()
	{
		$data['customer'] = $this->customer_model->customer_getAll();
		$this->load->view('admin/customer/v_customer', $data);
	}
	public function customer()
	{
		$data['customer'] = $this->customer_model->customer_getAll();
		$this->load->view('customer', $data);
	}

	public function add()
	{
		$nama = strip_tags($this->input->post ( 'i_nama' ));
		$NIK = strip_tags( $this->input->post ('i_NIK'));
		$notelp = strip_tags( $this->input->post ('i_notelp'));
		$alamat = strip_tags( $this->input->post ('i_alamat'));
			// Input Array
		$data = array (
			'nama' => $nama,
			'NIK' => $NIK,
			'notelp' => $notelp,
			'alamat' => $alamat 
		);
			//Insert ke Database
		$x = $this->customer_model->customer_cek($NIK);
		if ($x==Null) {
			$this->customer_model->customer_insert ( 'customer' , $data);
			echo '<script language=JavaScript>alert("Input Berhasil"); onclick=location.href = document.referrer</script>' ;
		}
		else
		{
			echo '<script language=JavaScript>alert("Gagal!! Customer telah tersimpan sebelumnya"); onclick=history.go(-1)</script>' ;
		}
	}

	public function edit($id)
	{
		$data['customer'] = $this->customer_model->customer_getById ($id);
		$nama = strip_tags($this->input->post ('i_nama'));
		$NIK = strip_tags($this->input->post ('i_NIK'));
		$notelp = strip_tags( $this->input->post ('i_notelp'));
		$alamat = strip_tags( $this->input->post ('i_alamat'));
			// Input Array
		$data = array (
			'nama' => $nama,
			'NIK' => $NIK,
			'notelp' => $notelp,
			'alamat' => $alamat
		);
			// Insert ke Database
		$x = $this->customer_model->customer_cek ($NIK);
		if ($x==Null){
			$this->customer_model->customer_update ($id, 'customer', $data);
			echo '<script language=JavaScript>alert("Update Berhasil");
			onclick=location.href = document.referrer</script>';
		}else {
			echo '<script language=JavaScript>alert("Gagal!! Customer telah tersimpan sebelumnya"); onclick=history.go(-1)</script>' ;
		}
	}

	public function delete($id)
	{
		$this->customer_model->customer_delete('customer', $id );
		echo '<script language=JavaScript>alert("Delete Berhasil");
		onclick=history.go(-1)</script>';
	}
}
?>