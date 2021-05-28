<?php defined('BASEPATH') or exit('No direct script access allowed');
class user extends CI_Controller 
{
	public function __construct()
	{
		parent :: __construct();
			# Load model, helper and library
		$this->load->model('user_model');
	}
	
	public function index()
	{
		$data['user'] = $this->user_model->user_getAll();
		$this->load->view('admin/user/v_user', $data);
	}
	public function user()
	{
		$data['user'] = $this->user_model->user_getAll();
		$this->load->view('user', $data);
	}

	public function add()
	{
		$username = strip_tags($this->input->post ( 'i_username' ));
		$password = strip_tags( $this->input->post ('i_password'));
		$role = strip_tags( $this->input->post ('i_role'));
			// Input Array
		$data = array (
			'username' => $username,
			'password' => $password,
			'role' => $role 
		);
			//Insert ke Database
		$x = $this->user_model->user_cek($username);
		if ($x==Null) {
			$this->user_model->user_insert ( 'user' , $data);
			echo '<script language=JavaScript>alert("Input Berhasil"); onclick=location.href = document.referrer</script>' ;
		}
		else
		{
			echo '<script language=JavaScript>alert("Gagal!! user telah tersimpan sebelumnya"); onclick=history.go(-1)</script>' ;
		}
	}

	public function edit($id)
	{
		$data['user'] = $this->user_model->user_getById ($id);
		$username = strip_tags($this->input->post ( 'i_username' ));
		$password = strip_tags( $this->input->post ('i_password'));
		$role = strip_tags( $this->input->post ('i_role'));
			// Input Array
		$data = array (
			'username' => $username,
			'password' => $password,
			'role' => $role
		);
			// Insert ke Database
		$x = $this->user_model->user_cek ($username);
		if ($x==Null){
			$this->user_model->user_update ($id, 'user', $data);
			echo '<script language=JavaScript>alert("Update Berhasil");
			onclick=location.href = document.referrer</script>';
		}else {
			echo '<script language=JavaScript>alert("Gagal!! user telah tersimpan sebelumnya"); onclick=history.go(-1)</script>' ;
		}
	}

	public function delete($id)
	{
		$this->user_model->user_delete('user', $id );
		echo '<script language=JavaScript>alert("Delete Berhasil");
		onclick=history.go(-1)</script>';
	}
}
?>