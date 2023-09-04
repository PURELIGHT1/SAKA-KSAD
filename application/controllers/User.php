<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('role_model');
	}

	public function index()
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "List User",
			'data_user' => $this->user_model->user_getAll(),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
		);
		$this->load->view('user/v_list', $data);
	}

	public function profil()
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Profil User",
			'data_user' => $this->user_model->user_getAll(),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
		);
		$this->load->view('user/v_profil', $data);
	}

	// public function ganti_password($id_user)
	// {
	// 	$username = $this->session->userdata['username'];

	// 	$this->form_validation->set_rules('oldpass', 'old password', 'required');
	// 	$this->form_validation->set_rules('newpass','new password','required');
	// 	$this->form_validation->set_rules('passconf','confirm password','required|matches[newpass]');

	// 	if($this->form_validation->run() == false) {
	// 		echo '<script language="javascript">';
	// 		echo 'alert("Password tidak sesuai!")';
	// 		echo '</script>';
	// 		redirect('user/profil', 'refresh');
	// 	}
	// 	else 
	// 	{
	// 		// echo "string"; die();
	// 		$data = array(
	// 			'password' => md5($this->input->post('newpass')),
	// 		);
	// 		$result = $this->user_model->check_oldpass($id_user, md5($this->input->post('oldpass')));
	// 		if($result == true)
	// 		{
	// 			$result = $this->user_model->updatepass($id_user, $data);
	// 			if($result > 0)
	// 			{
	// 				echo 'string1'; die();
	// 				echo '<script language="javascript">';
	// 				echo 'alert("Password tidak berhasil diubah. Silahkan coba kembali!")';
	// 				echo '</script>';
	// 				return redirect('user/profil', 'refresh');
	// 			}else
	// 			{
	// 				echo '<script language="javascript">';
	// 				echo 'alert("Password telah berhasil diubah!")';
	// 				echo '</script>';
	// 				// echo 'string2'; die();
	// 				return redirect('dashboard', 'refresh');
	// 			}
	// 		}
	// 		else
	// 		{
	// 			echo '<script language="javascript">';
	// 			echo 'alert("Password lama salah!")';
	// 			echo '</script>';
	// 			return redirect('user/profil', 'refresh');
	// 		}
	// 	}
	// }

	public function tambah_user()
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Tambah User",
			'data_user' => $this->user_model->user_getAll(),
			'data_role' => $this->role_model->role_getAll(),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
		);
		$this->load->view('user/v_tambah', $data);
	}

	public function save_user()
	{
		$data = array(
			'nama_user' => $this->input->post('nama_user'),
			'username' => $this->input->post('username'),
			'id_role' => $this->input->post('role'),
			'password' => password_hash('admin', PASSWORD_DEFAULT),
			'status' => 1,
		);
		$this->user_model->user_insert('user', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil disimpan
			</div>');
		redirect("user", "refresh");
	}

	public function edit_user($id_user)
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Edit User",
			'user' => $this->user_model->user_getById($id_user)->row(),
			'data_role' => $this->role_model->role_getAll(),
			'role' => $this->role_model->role_getById($id),
		);
		$this->load->view('user/v_edit', $data);
	}

	public function save_ubah($id_user)
	{
		$id = $id_user;
		$data = array(
			'nama_user' => $this->input->post('nama_user'),
			'username' => $this->input->post('username'),
			'id_role' => $this->input->post('role'),
		);
		$this->user_model->user_update($id, 'user', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil diupdate
			</div>');
		redirect("user", "refresh");
	}

	public function hapus_user($id_user)
	{
		$id = $id_user;
		$in_data['status']= 0;

		$this->user_model->user_update($id, 'user', $in_data);
			$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil dihapus
			</div>');
				$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil dihapus
			</div>');
		redirect('user');
	}

//fitur ubah password user bozzqu awokaokwaok
	public function changepassword()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Change password';

		// VALIDASI DULU
		$this->form_validation->set_rules('current_password', 'Current passsword','required|trim');
		$this->form_validation->set_rules('new_password1', 'New passsword','required|trim|min_length[7]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New passsword','required|trim|min_length[7]|matches[new_password1]');

		//JIKA VALIDASI LOLOS
		if($this->form_validation->run() == false){
			$this->load->view('user/v_changepassword',$data);
		}else{
			$current_password 	= $this->input->post('current_password');
			$new_password 		= $this->input->post('new_password1');

			if(!password_verify($current_password, $data['user']['password'])){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Password saat ini salah!
					</div>');
				redirect('user/changepassword');
			}else{
				//current dengan new tidak boleh sama
				if($current_password == $new_password){
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Password baru tidak boleh sama dengan password saat ini!
						</div>');
					redirect('user/changepassword');
				}else{
					//password sudah oke
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));
					$this->db->update('user');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah, silahkan login kembali</div>');
					redirect('user/changepassword');
				}

			}
		}
	} 
}
