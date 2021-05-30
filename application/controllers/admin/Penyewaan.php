<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class penyewaan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('penyewaan_model');
		$this->load->model('barang_model');
		$this->load->model('customer_model');

	}

	public function index()
	{
		
			$data = array(
				// 'kode_sewa' => $this->penyewaan_model->invoice_no(),
				// 'total' => $this->show_total(),
				'barang' => $this->penyewaan_model->barang_getAll(),
				'customer' => $this->customer_model->customer_getAll(),
				'penyewaan' => $this->penyewaan_model->penyewaan_getAll(),
			);
			$this->load->view('admin/penyewaan/v_penyewaan', $data);
		
	}

	public function edit($idpenyewaan)
	{
		$data['penyewaan'] = $this->penyewaan_model->penyewaan_getById ($idpenyewaan);
		$id = strip_tags($this->input->post ( 'id' ));
		$nama = strip_tags($this->input->post ( 'i_nama' ));
		$harga = strip_tags( $this->input->post ('i_harga'));
		$jumlah = strip_tags( $this->input->post ('i_jumlah'));
		
		$data = array (
			'idbarang' => $id,
			'nama_barang' => $nama,
			'harga' => $harga,
			'quantity' => $jumlah,
		);
		
		$x = $this->penyewaan_model->penyewaan_cek($idpenyewaan);
		if ($x!=Null){
			$this->penyewaan_model->penyewaan_update ($idpenyewaan, 'penyewaan', $data);
			echo '<script language=JavaScript>alert("Update Berhasil");
			onclick=location.href = document.referrer</script>';
		}else {
			echo '<script language=JavaScript>alert("Gagal!! user telah tersimpan sebelumnya"); onclick=history.go(-1)</script>' ;
		}
	}

	public function delete($id)
	{
		$this->penyewaan_model->penyewaan_delete('penyewaan', $id);
		echo '<script language=JavaScript>alert("Delete Berhasil");
		onclick=history.go(-1)</script>';
	}

	// function add_to_cart()
	// {
	// 	$data = array(
	// 		'id' => $this->input->post('product_id'),
	// 		'name' => $this->input->post('product_name'),
	// 		'price' => $this->input->post('product_price'),
	// 		'qty' => $this->input->post('quantity'),
	// 		'discount' => $this->input->post('product_discount'),
	// 		'status' => 1
	// 	);
	// 	$insert = $this->cart->insert($data);
	// 	$idbarang = $this->input->post('product_id');
	// 	$qty = $this->input->post('quantity');
	// 	if ($insert == TRUE) {
	// 		$this->penyewaan_model->min_stock($qty, $idbarang);
	// 	} else {
	// 		echo '<script language=JavaScript>alert("Fail add to cart")
	// 		</script>';
	// 	}
	// }

// 	function show_cart()
// 	{
// 		$output = '';
// 		$no = 0;
// 		$x = 0;
// 		foreach ($this->cart->contents() as $items) {
// 			if (number_format($items['status']) == 1) {
// 				$no++;
// 				$output .= '
// 				<tr>
// 				<td>' . number_format($items['id']) . '</td>
// 				<td>' . $items['name'] . '</td>
// 				<td>' . number_format($items['price']) . '</td>
// 				<td>' . number_format($items['qty']) . '</td>
// 				<td>' . number_format($items['subtotal']) . '</td>
// 				<td> <button type="button" id="' . $items['rowid'] . '" class="remove_cart btn btn-danger btn-sm">Cancel</button></td>
// 				</tr>
// 				';
// 			} else {
// 				$x++;
// 			}
// 		}
// 		if ($no == 0 && $x == 0) {
// 			$output .= '
// 			<tr>
// 			<td colspan="7" class="text-center">Tidak ada Item</td>
// 			</tr>
// 			';
// 		} else if ($no != 0 && $x == 0) {
// 			$output .= '
// 			<tr>
// 			<th colspan="5">Total</th>
// 			<th colspan="1">' . 'Rp ' . number_format($this->cart->total()) . '</th>
// 			</tr>
// 			';
// 		} else if ($no == 0 && $x != 0) {
// 			echo '<script language=JavaScript>alert("Library Cart masih digunakan di Pembelian. Tekan `Cancel` pada bagian bawah halaman Pembelian. ")
// 			onclick=location.href="pembelian"</script>';
// 		}
// 		return $output;
// 	}

// 	function load_cart()
// 	{
// 		echo $this->show_cart();
// 	}

// 	function delete_cart()
// 	{
// 		$row_id = $this->input->post('row_id');
// 		foreach ($this->cart->contents() as $items) {
// 			$row_id1 = $items['rowid'];
// 			$idbarang = $items['id'];
// 			$qty = $items['qty'];
// 			if ($row_id == $row_id1) {
// 				$this->penyewaan_model->plus_stock($qty, $idbarang);
// 				$data = array(
// 					'rowid' => $this->input->post('row_id'),
// 					'qty' => 0,
// 				);
// 				$this->cart->update($data);
// 			}
// 		}
// 		echo $this->show_cart();
// 	}

// 	function show_total()
// 	{
// 		if (number_format($this->cart->total()) > 0) {
// 			$output1 = number_format($this->cart->total());
// 		} else {
// 			$output1 = 0;
// 		}
// 		return $output1;
// 	}

// 	function clear_cart()
// 	{
// 		foreach ($this->cart->contents() as $items) {
// 			$idbarang = $items['id'];
// 			$qty = $items['qty'];
// 			$this->penyewaan_model->plus_stock($qty, $idbarang);
// 		}
// 		echo $this->cart->destroy();
// 		echo '<script language=JavaScript>alert("cancel cart")
// 		onclick=location.href = document.referrer</script>';
// 	}

// 	public function add_penyewaan()
// 	{
// 		$kode_sewa = $this->input->post('kode_sewa');
// 		date_default_timezone_set('Asia/Jakarta');
// 		$sale_date = date("Y-m-d | H:i:s");
// 		$member = $this->input->post('customer');
// 		$data = array(
// 			'kode_sewa' => $kode_sewa,
// 			'employee_id' => $this->session->userdata('employee_id'),
// 			'sale_date' => $sale_date,
// 			'customer_id' => $member
// 		);
// 		$this->penyewaan_model->penyewaan_insert('penyewaan', $data);
		
// 		foreach ($this->cart->contents() as $items) {
// 			$idbarang = number_format($items['id']);
// 			$qty = number_format($items['qty']);
// 			$sub_total = $items['subtotal'];
// 			$status = $items['status'];
// 			if ($status == 1) {
//  // Input Array
// 				$data = array(
// 					'idbarang' => $idbarang,
// 					'amount' => $qty,
// 					'idpenyewaan' => $this->penyewaan_model->penyewaan_last_id()->idpenyewaan,
// 					'total_price' => $sub_total
// 				);
// 				$this->penyewaan_model->d_penyewaan_insert('d_penyewaan', $data);
// 			}
// 		}
// 		$this->cart->destroy();
// 		echo '<script language=JavaScript>alert("Payment Berhasil")
// 		onclick=location.reload()</script>';
// 	}

// 	public function list_penyewaan()
// 	{
// 		if ($this->session->userdata('idpegawai') != Null) {
// 			$data = array(
				
// 				'barang' => $this->penyewaan_model->_getAll(),
// 				'penyewaan1' => $this->penyewaan_model->penyewaan_getAll1(),
// 			);
// 			$this->load->view('admin/penyewaan/v_laporan', $data);
// 		} else {
// 			$this->cart->destroy();
// 			echo '<script language=JavaScript>alert("Anda Belum Login, Silahkan Login")
//  			onclick=location.href="http://localhost/tokobuku/auth"</script>';
// 		}
// 	}

// 	public function pdf()
// 	{
// 		$this->load->library('dompdf_gen');
// 		$data = array(
// 			'penyewaan1' => $this->penyewaan_model->penyewaan_getAll(),
// 			'penyewaan2' => $this->penyewaan_model->penyewaan_getAll1(),
// 		);
// 		$this->load->view('admin/penyewaan/v_laporan_pdf', $data);
// 		$paper_size = 'A4';
// 		$orientation = 'potrait';
// 		$html = $this->output->get_output();
// 		$this->dompdf->set_paper($paper_size, $orientation);
// 		$this->dompdf->load_html($html);
// 		$this->dompdf->render();
// 		$this->dompdf->stream("Laporan_penyewaan.pdf",
// 			array('Attachment' =>0));
// 	}

// 	public function detail_penyewaan($idpenyewaan)
// 	{
// 		$data = array(
// 			'penyewaan3' =>
// 			$this->penyewaan_model->penyewaan_getAll2($idpenyewaan),
// 		);
// 		$this->load->view('admin/penyewaan/v_detail', $data);
// 	}

// 	public function chart()
// 	{
// 		if ($this->session->userdata('employee_id') != Null) {
// 			$start_date = $this->input->post('start_date');
// 			$end_date = $this->input->post('end_date');
// 			$record = $this->penyewaan_model->monthChart($start_date, $end_date)->result();
// 			$data = [];
// 			$data['label_tahun'] = "-";
// 			foreach ($record as $row) {
// 				$data['label_bulan'][] = $row->month_name;
// 				$data['label_tahun'] = $row->year_num;
// 				$data['data_jml'][] = (int) $row->count;
// 			}
// 			$data2 = array(
// 				'find_date' => $this->penyewaan_model->rangeDate($start_date, $end_date),
// 				'penyewaan1' => $this->penyewaan_model->penyewaan_getAll1(),
//  				'chart_data' => json_encode($data), // Mengkonversi datadata dalam variabel $data menjadi objek JSON
// );
// 			$this->load->view('admin/penyewaan/v_chart', $data2);
// // Load v_chart.php dengan membawa data array $data2
// 		} else {
// 			echo '<script language=JavaScript>alert("Anda Belum Login, Silahkan Login")
//  			onclick=location.href="http://localhost/tokobuku/auth"</script>';
// 		}
// 	}
}