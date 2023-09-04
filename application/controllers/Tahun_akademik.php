<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_akademik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('tahun_akademik_model');
		$this->load->model('role_model');
	}

	public function index()
	{
		$id = $this->session->userdata('id_user','id_role');
		$data = array(
			'ta' => $this->tahun_akademik_model->tahun_akademik_getAll(),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
			'title' => "Tahun Akademik",
		);
		$this->load->view('tahun_akademik/v_list', $data);
	}

	public function tambah_tahun_akademik()
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'ta' => $this->tahun_akademik_model->tahun_akademik_getAll(),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
			'title' => "Tambah Tahun Akademik",
		);
		$this->load->view('tahun_akademik/v_tambah', $data);
	}

	public function save_tahun_akademik()
	{
		$data = array(
			'tahun_akademik' => $this->input->post('tahun_akademik'),
		);
		$this->tahun_akademik_model->tahun_akademik_insert('tahun_akademik', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil disimpan
			</div>');
		redirect("tahun_akademik", "refresh");
	}

	public function edit_tahun_akademik($id_tahun_akademik)
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'ta' => $this->tahun_akademik_model->tahun_akademik_getById($id_tahun_akademik),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
			'title' => "Edit Tahun Akademik",
		);
		$this->load->view('tahun_akademik/v_edit', $data);
	}

	public function save_ubah($id_tahun_akademik)
	{
		$id = $id_tahun_akademik;
		$data = array(
			'tahun_akademik' => $this->input->post('tahun_akademik'),
		);
		$this->tahun_akademik_model->tahun_akademik_update($id, 'tahun_akademik', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil diupdate
			</div>');
		redirect("tahun_akademik", "refresh");
	}

	public function hapus($id)
	{
		$this->tahun_akademik_model->hapus_ta('tahun_akademik',$id);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil dihapus
			</div>');
		redirect('tahun_akademik');
	}
}
