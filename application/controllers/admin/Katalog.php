<?php defined('BASEPATH') or exit('No direct script access allowed');

class katalog extends CI_Controller 
{
	public function __construct()
	{
		parent :: __construct();
			# Load model, helper and library
		$this->load->model('barang_model');
	}

	public function index()
	{
		$data['barang'] = $this->barang_model->barang_getAll();
		$this->load->view('admin/katalog/v_katalog', $data);
	}
	public function barang()
	{
		$data['barang'] = $this->barang_model->barang_getAll();
		$this->load->view('barang', $data);
	}

	public function add()
	{
		$nama = strip_tags($this->input->post ( 'i_nama' ));
		$merek = strip_tags( $this->input->post ('i_merek'));
		$tipe = strip_tags( $this->input->post ('i_tipe'));
		$harga = strip_tags( $this->input->post ('i_harga'));
		$jumlah = strip_tags( $this->input->post ('i_jumlah'));
		$foto = $_FILES['i_foto'];
			// Input Array

		if ($foto = '') {
		} else {
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size'] = 1028;
			$config['overwrite'] = TRUE;
            // $config['max_width'] = 1500;
            // $config['max_height'] = 1500;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('i_foto')) {
				echo "Upload Gagal!";
				die();
			} else {
				$foto = $this->upload->data('file_name');
			}
		}

		$data = array (
			'nama' => $nama,
			'merek' => $merek,
			'tipe' => $tipe,
			'harga' => $harga,
			'jumlah' => $jumlah,
			'foto' => $foto
		);
			//Insert ke Database
		$x = $this->barang_model->barang_cek($nama);
		if ($x==Null) {
			$this->barang_model->barang_insert ( 'barang' , $data);
			echo '<script language=JavaScript>alert("Input Berhasil"); onclick=location.href = document.referrer</script>' ;
		}
		else
		{
			echo '<script language=JavaScript>alert("Gagal!! barang telah tersimpan sebelumnya"); onclick=history.go(-1)</script>' ;
		}
	}

	public function insertinto($id){
		// $query = $this->db->get('barang');
		// foreach($query->result() as $row){
		// 	$this->db->insert('penyewaan');
		// }
		$id = strip_tags($this->input->post ( 'id' ));
		$nama = strip_tags($this->input->post ( 'i_nama' ));
		$harga = strip_tags( $this->input->post ('i_harga'));
		$jumlah = strip_tags( $this->input->post ('i_jumlah'));
		// $total = $harga * $jumlah;

		$data = array (
			'idbarang' => $id,
			'nama_barang' => $nama,
			'harga' => $harga,
			'quantity' => $jumlah,
			// 'total' => $total,
		);

		$this->barang_model->insert_into($id, 'penyewaan', $data);
		echo '<script language=JavaScript>alert("Peminjaman Berhasil"); onclick=location.href = document.referrer</script>' ;

	}

	public function edit($id)
	{
		$nama = strip_tags($this->input->post ( 'i_nama' ));
		$merek = strip_tags( $this->input->post ('i_merek'));
		$tipe = strip_tags( $this->input->post ('i_tipe'));
		$harga = strip_tags( $this->input->post ('i_harga'));
		$jumlah = strip_tags( $this->input->post ('i_jumlah'));
		$foto = $_FILES['i_foto'];
			// Input Array

		if ($foto = '') {
		} else {
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size'] = 1028;
			$config['overwrite'] = TRUE;
            // $config['max_width'] = 1500;
            // $config['max_height'] = 1500;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('i_foto')) {
				echo "Upload Gagal!";
				die();
			} else {
				$foto = $this->upload->data('file_name');
			}
		}

		$data = array (
			'nama' => $nama,
			'merek' => $merek,
			'tipe' => $tipe,
			'harga' => $harga,
			'jumlah' => $jumlah,
			'foto' => $foto
		);

			// Insert ke Database
		$x = $this->barang_model->barang_cek ($nama);
		if ($x==Null){
			$this->barang_model->barang_update ($id, 'barang', $data);
			echo '<script language=JavaScript>alert("Update Berhasil");
			onclick=location.href = document.referrer</script>';
		}else {
			echo '<script language=JavaScript>alert("Gagal!! barang telah tersimpan sebelumnya"); onclick=history.go(-1)</script>' ;
		}
	}

	public function delete($id)
	{
		$this->barang_model->barang_delete('barang', $id );
		echo '<script language=JavaScript>alert("Delete Berhasil");
		onclick=history.go(-1)</script>';
	}
}
?>