<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Laporan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('role_model');
		$this->load->model('lap_model');
		$this->load->model('anggota_model');
		$this->load->model('tahun_akademik_model');
		$this->load->model('status_model');
	}

	public function index()
	{
		$ta = $this->tahun_akademik_model->getAktifTahunAkademik();
		// $kas = $this->lap_model->list_kas();
		// $pangkal = $this->lap_model->list_pangkal();
		$id = $this->session->userdata('id_user', 'id_role', 'npm');
		$data = array(
			'title' => "Laporan Anggota",
			'data_anggota' => $this->anggota_model->anggota_getAll3($ta[0]['id_tahun_akademik'], "all"),
			'tahun_akademik' => $this->tahun_akademik_model->getTahunAkademik(),
			'status_anggota' => $this->status_model->status_getAll(),
			'role' => $this->role_model->role_getById($id),
			'user' => $this->user_model->user_getById($id)->row(),
			'kas' => $this->lap_model->kas_getAll(),
			'pangkal' => $this->lap_model->pangkal_getAll(),
			'ket_uang' => $this->lap_model->keterangan_getAll(),
		);
		$this->load->view('laporan/v_list', $data);
	}

	public function filter($ta, $status)
	{
		$id = $this->session->userdata('id_user','id_role');
		$data = array(
			'title' => "Laporan Anggota",
			'data_anggota' => $this->anggota_model->anggota_getAll3($ta, $status=null),
			'tahun_akademik' => $this->tahun_akademik_model->getTahunAkademik(),
			'status_anggota' => $this->status_model->status_getAll(),
			'role' => $this->role_model->role_getById($id),
			'user' => $this->user_model->user_getById($id)->row(),
		);
		$this->load->view('laporan/v_list', $data);
	}

	public function edit_laporan($id_anggota)
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Edit Laporan Anggota",
			'anggota' => $this->anggota_model->anggota_getById($id_anggota),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
			'kas' => $this->lap_model->kas_getAll(),
			'pangkal' => $this->lap_model->pangkal_getAll(),
			'ket_uang' => $this->lap_model->keterangan_getAll(),
		);
		$this->load->view('laporan/v_edit', $data);
	}

	public function save_ubah($id_anggota)
	{
		$id = $id_anggota;
		$data = array(
			'kas' => $this->input->post('kas'),
			'pangkal' => $this->input->post('pangkal'),
			'ket_uang' => $this->input->post('ket_uang'),
		);
		$this->anggota_model->anggota_update($id, 'anggota', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil diupdate
			</div>');
		redirect("laporan", "refresh");
	}

	public function detail_laporan($id_anggota)
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Detail Laporan Kas Anggota",
			'anggota' => $this->anggota_model->anggota_getById2($id_anggota),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
		);
		$this->load->view('laporan/v_detail', $data);
	}

}