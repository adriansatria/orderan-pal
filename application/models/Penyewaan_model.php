<?php defined('BASEPATH') or exit('No direct script access allowed');

class penyewaan_model extends CI_Model
{
	public function barang_getAll()
	{
		$query = $this->db->query("SELECT * FROM barang");
		return $query;
	}

	public function penyewaan_getAll()
	{
		$query = $this->db->query("SELECT * FROM penyewaan");
		return $query;
	}

	public function customer_getAll()
	{
		$query = $this->db->query("SELECT * FROM customer");
		return $query;
	}

// 	public function book_getAll1()
// 	{
// 		$query = $this->db->query("SELECT * FROM book INNER JOIN book_author ON book.book_id=book_author.book_id INNER JOIN author ON book_author.author_id=author.author_id");
// 		return $query;
// 	}

// 	public function book_getAll2()
// 	{
// 		$query = $this->db->query("SELECT * FROM book INNER JOIN book_bookcat ON book.book_id=book_bookcat.book_id INNER JOIN book_category ON book_bookcat.book_category_id=book_category.book_category_id");
// 		return $query;
// 	}

// 	public function book_getById($id)
// 	{
// 		$query = $this->db->query("SELECT * FROM book where book_id=$id");
// 		return $query;
// 	}

// 	public function min_stock($qty, $book_id)
// 	{
// 		$query = $this->db->query (" UPDATE book SET stock = stock - $qty Where book_id = $book_id");
// 		return $query;
// 	}

// 	public function plus_stock($qty, $book_id)
// 	{
// 		$query = $this->db->query ("UPDATE book SET stock = stock + $qty Where book_id = $book_id");
// 		return $query;
// 	}

// 	public function invoice_no()
// 	{
// 		$query = $this->db->query ("SELECT MAX(penyewaan_id) as invoice_no from penyewaan");
// 		if ($query->num_rows() > 0) {
// 			$row = $query->row();
// 			$n = ((int) $row->invoice_no) + 1;
// 			$no = sprintf("%09s", $n);
// 		} else {
// 			$no = sprintf("%09s", 1);
// 		}
// 		$kode_jual = "PNJ" . $no;
// 		return $kode_jual;
// 	}

// 	public function penyewaan_insert($table, $data)
// 	{
// 		$query = $this->db->insert($table, $data);
// 		return $query;
// 	}

// 	public function penyewaan_last_id()
// 	{
// 		$query = $this->db->query("SELECT MAX(penyewaan_id) as penyewaan_id FROM penyewaan");
// 		return $query->row();
// 	}
	
// 	public function d_penyewaan_insert($table, $data)
// 	{
// 		$query = $this->db->insert($table, $data);
// 		return $query;
// 	}

// 	public function penyewaan_getAll()
// 	{
// 		$query = $this->db->query("SELECT penyewaan.penyewaan_id, penyewaan.kode_jual, customer.customer_id, customer.name as customer_name, employee.employee_id, employee.name as employee_name, penyewaan.sale_date 
// 			FROM penyewaan LEFT JOIN customer ON penyewaan.customer_id=customer.customer_id
// 			INNER JOIN employee ON penyewaan.employee_id=employee.employee_id");
// 		return $query;
// 	}

// 	public function penyewaan_getAll1()
// 	{
// 		$query = $this->db->query("SELECT * FROM d_penyewaan INNER JOIN penyewaan ON d_penyewaan.penyewaan_id=penyewaan.penyewaan_id");
// 		return $query;
// 	}

// 	public function penyewaan_getById($penyewaan_id)
// 	{
// 		$query = $this->db->query("SELECT * FROM penyewaan where penyewaan_id=$penyewaan_id");
// 		return $query;
// 	}

// 	public function penyewaan_getAll2($penyewaan_id)
// 	{
// 		$query = $this->db->query("SELECT * FROM d_penyewaan INNER JOIN book ON d_penyewaan.book_id=book.book_id where penyewaan_id=$penyewaan_id");
// 		return $query;
// 	}

// 	public function rangeDate($start_date, $end_date) // menarik data dr tabel penyewaan, customer, dan employee sesuai rentang tanggal d ari inputan user
// 	{
// 		$query = $this->db->query("SELECT penyewaan.penyewaan_id, penyewaan.kode_jual, customer.customer_id, customer.name as customer_name, employee.employee_id, employee.name as employee_name, penyewaan.
// 			sale_date
// 			FROM penyewaan
// 			LEFT JOIN customer ON penyewaan.customer_id = customer.customer_id
// 			INNER JOIN employee ON penyewaan.employee_id = employee.employee_id
// 			WHERE penyewaan.sale_date >= '$start_date' AND penyewaan.sale_date <= '$end_date'");

// 		return $query;
// 	}

//  public function monthChart($start_date, $end_date) // menghitung jml buku terju al per bulan (current year)
// {
// 	$query = $this->db->query("SELECT penyewaan.penyewaan_id, d_penyewaan.penyewaan_id, SUM(d_penyewaan.amount) as count, MONTHNAME(sale_date) as month_name, YEAR(CURDATE()) as year_num
// 		FROM penyewaan
// 		INNER JOIN d_penyewaan ON d_penyewaan.penyewaan_id = penyewaan.penyewaan_id
// 		WHERE sale_date >= '$start_date' AND sale_date <= '$end_date'
// 		GROUP BY YEAR(sale_date), MONTH(sale_date)");
// 	return $query;
// }


}