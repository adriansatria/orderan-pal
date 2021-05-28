<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false)
		{
			$data['title'] = 'Login SIPAL';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		}else{
		//validasi sukses
			$this->_login();
		}
	}
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if($user){
			if(password_verify($password,$user['password'])){
				$data = [
					'username' => ['username'],
					'iduser' => ['iduser'],
				];
				$this->session->set_userdata($data);
				redirect('admin/overview');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!!</div>');
				redirect('auth');
			}
		}else if($employee){
		if(password_verify($password, $employee->password)){
			$data = [
				'employee_id' => $employee->employee_id,
				'email' => $employee->email,
				'name' => $employee->name,
				'level_id' => $employee->level_id,
			];
			$this->session->set_userdata($data);
			redirect('admin/overview');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Employee Salah!!</div>');
			redirect('auth');
		}
	}
	else{
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login Gagal!!</div>');
			redirect('auth');
	}
}
	public function registration()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',['matches' => 'Password Tidak Sama!','min_length' => 'Password Terlalu Pendek!']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false)
		{
			$data['title'] = 'Registrasi SIPAL';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		}
		else{
			$data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Telah Berhasil!!. Silahkan Login!</div>');
			redirect('auth'); 
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		// $this->session->unset_userdata('email');
		$this->session->set_flashdata('message', '<div class="alert alert-success"
			role="alert">Logout Telah Berhasil! Silahkan Login.</div>');
		redirect('auth');
	}
}