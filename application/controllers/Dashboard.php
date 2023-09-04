<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('anggota_model');
		$this->load->model('tahun_akademik_model');
		$this->load->model('lap_keuangan');
		$this->load->model('user_model');
		$this->load->model('role_model');
	}

	public function index()
	{
		$ta = $this->tahun_akademik_model->getAktifTahunAkademik();
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Dashboard",
			'anggota_aktif' => $this->anggota_model->anggota_aktif($ta[0]['id_tahun_akademik']),
			'anggota_pasif' => $this->anggota_model->anggota_pasif(),
			'anggota_baru' => $this->anggota_model->anggota_baru($ta[0]['id_tahun_akademik']),
			'total_anggota' => $this->anggota_model->total_anggota(),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
			'pendapatan' => $this->lap_keuangan->GetJumlahPendapatan(),
			'pengeluaran' => $this->lap_keuangan->GetJumlahPengeluaran(),
		);
		$this->load->view('beranda', $data);
	}
}
