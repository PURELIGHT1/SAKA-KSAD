<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('anggota_model');
		$this->load->model('prodi_model');
		$this->load->model('user_model');
		$this->load->model('status_model');
		$this->load->model('tahun_akademik_model');
		$this->load->model('role_model');
	}

	public function index()
	{
		$ta = $this->tahun_akademik_model->getAktifTahunAkademik();
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "List Anggota",
			'data_anggota' => $this->anggota_model->anggota_getAll($ta[0]['id_tahun_akademik'], "all"),
			'user' => $this->user_model->user_getById($id)->row(),
			'status_anggota' => $this->status_model->status_getAll(),
			'tahun_akademik' => $this->tahun_akademik_model->getTahunAkademik(),
			'role' => $this->role_model->role_getById($id),
		);
		$this->load->view('anggota/v_list', $data);
	}

	public function filter($ta, $status)
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "List Anggota",
			'data_anggota' => $this->anggota_model->anggota_getAll($ta, $status),
			'user' => $this->user_model->user_getById($id)->row(),
			'status_anggota' => $this->status_model->status_getAll(),
			'tahun_akademik' => $this->tahun_akademik_model->getTahunAkademik(),
			'role' => $this->role_model->role_getById($id),
		);
		$this->load->view('anggota/v_list', $data);
	}

	public function daftar_anggota()
	{
		$data = array(
			'tahun_akademik' => $this->tahun_akademik_model->getAktifTahunAkademik(),
			'data_prodi' => $this->prodi_model->prodi_getAll(),
		);
		$this->load->view('pendaftaran', $data);
	}

	public function save_daftar()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'npm' =>  $this->input->post('npm'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'prodi' => $this->input->post('prodi'),
			'no_hp' => $this->input->post('no_hp'),
			'email' => $this->input->post('email'),
			'keterangan' => $this->input->post('keterangan'),
			'status' => 1,
			'tahun_akademik' => $this->input->post('ta'),
			'kas' => 2,
			'pangkal' => 3,
			'ket_uang' => 0,
		);
		$this->anggota_model->anggota_insert('anggota', $data);
		// $this->load->view('submit_pendaftaran', $data);

		echo '<script language=JavaScript>alert("Pendaftaran telah berhasil dilakukan!")
		onclick=location.href="../anggota/submit"</script>';
	}

	public function submit()
	{
		$this->load->view('submit_pendaftaran');
	}

	public function tambah_anggota()
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Tambah Anggota",
			'tahun_akademik' => $this->tahun_akademik_model->tahun_akademik_getAll(),
			'data_prodi' => $this->prodi_model->prodi_getAll(),
			'status' => $this->status_model->status_getAll(),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
		);

		$this->load->view('anggota/v_tambah', $data);
	}

	public function save_tambah()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'npm' =>  $this->input->post('npm'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'prodi' => $this->input->post('prodi'),
			'no_hp' => $this->input->post('no_hp'),
			'email' => $this->input->post('email'),
			'keterangan' => $this->input->post('keterangan'),
			'status' => $this->input->post('status'),
			'tahun_akademik' => $this->input->post('tahun_akademik'),
			'kas' => 2,
			'pangkal' => 3,
			'ket_uang' => 0,
		);
		$this->anggota_model->anggota_insert('anggota', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil diupdate
			</div>');
		redirect("anggota", "refresh");
	}

	public function detail_anggota($id_anggota)
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Detail Anggota",
			'anggota' => $this->anggota_model->anggota_getById($id_anggota),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
		);
		$this->load->view('anggota/v_detail', $data);
	}

	public function edit_anggota($id_anggota)
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Edit Anggota",
			'anggota' => $this->anggota_model->anggota_getById($id_anggota),
			'prodi' => $this->prodi_model->prodi_getAll(),
			'status' => $this->status_model->status_getAll(),
			'tahun_akademik' => $this->tahun_akademik_model->tahun_akademik_getAll(),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
		);
		$this->load->view('anggota/v_edit', $data);
	}

	public function save_ubah($id_anggota)
	{
		$id = $id_anggota;
		$data = array(
			'nama' => $this->input->post('nama'),
			'npm' => $this->input->post('npm'),
			'prodi' => $this->input->post('prodi'),
			'no_hp' => $this->input->post('no_hp'),
			'email' => $this->input->post('email'),
			'keterangan' => $this->input->post('keterangan'),
			'tahun_akademik' => $this->input->post('tahun_akademik'),
			'status' => $this->input->post('status'),
			'kas' => 2,
			'pangkal' => 3,
			'ket_uang' => 1,
		);
		$this->anggota_model->anggota_update($id, 'anggota', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil diupdate
			</div>');
		redirect("anggota", "refresh");
	}

	public function hapus_anggota($id_anggota)
	{
		$id = $id_anggota;
		$in_data['status'] = 0;

// 		$this->anggota_model->hapus_anggota('anggota',$id);
		$this->anggota_model->anggota_update($id, 'anggota', $in_data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil dihapus
			</div>');
		redirect('anggota');
	}

	public function excel($ta, $status)
	{
		$data = array(
			'title' => 'Daftar Anggota KSAD',
			'anggota' => $this->anggota_model->anggota_getAll($ta, $status)->result_array()
		);
		$this->load->view('anggota/daftar_anggota_ksad_xls', $data);
	}
}
