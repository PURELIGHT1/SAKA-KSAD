<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('prodi_model');
		$this->load->model('role_model');
	}

	public function index()
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "List Prodi",
			'prodi' => $this->prodi_model->prodi_getAll(),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
		);
		$this->load->view('prodi/v_list', $data);
	}

	public function tambah_prodi()
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Tambah Prodi",
			'prodi' => $this->prodi_model->prodi_getAll(),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
		);
		$this->load->view('prodi/v_tambah', $data);
	}

	public function save_prodi()
	{
		$data = array(
			'nama_prodi' => $this->input->post('nama_prodi'),
		);
		$this->prodi_model->prodi_insert('prodi', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil disimpan
			</div>');
		redirect("prodi", "refresh");
	}

	public function edit_prodi($id_prodi)
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Edit Prodi",
			'prodi' => $this->prodi_model->prodi_getById($id_prodi),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
		);
		$this->load->view('prodi/v_edit', $data);
	}

	public function save_ubah($id_prodi)
	{
		$id = $id_prodi;
		$data = array(
			'nama_prodi' => $this->input->post('nama_prodi'),
		);
		$this->prodi_model->prodi_update($id, 'prodi', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil diupdate
			</div>');
		redirect("prodi", "refresh");
	}
	public function hapus($id)
	{
		$this->prodi_model->hapus_prodi('prodi',$id);
			$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil dihapus
			</div>');
		redirect('prodi');
	}
}
