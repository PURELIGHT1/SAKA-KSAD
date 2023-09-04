<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehadiran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('role_model');
		$this->load->model('anggota_model');
		$this->load->model('status_model');
		$this->load->model('tahun_akademik_model');
		$this->load->model('prodi_model');
		$this->load->model('kehadiran_model');
		$this->load->model('pertemuan_model');
	}

	public function index()
	{
		$ta = $this->tahun_akademik_model->getAktifTahunAkademik();
		$id = $this->session->userdata('id_user', 'id_role');
		$kelas = 'Beginner';
		$data = array(
			'title' => "Rekap Kehadiran Anggota",
			'data_presensi' => $this->kehadiran_model->kehadiran_getAll2(),
			'data_pertemuan' => $this->pertemuan_model->pertemuan_getAll2($kelas),
			'tahun_akademik' => $this->tahun_akademik_model->getTahunAkademik(),
			'status_anggota' => $this->status_model->status_getAll(),
			'role' => $this->role_model->role_getById($id),
			'user' => $this->user_model->user_getById($id)->row(),
		);
		$this->load->view('kehadiran/v_list', $data);
	}

	public function filter($ta, $pert)
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$kelas = 'Beginner';
		$data = array(
			'title' => "Rekap Kehadiran Anggota",
			'data_presensi' => $this->kehadiran_model->kehadiran_getAll3($ta, $pert),
			'user' => $this->user_model->user_getById($id)->row(),
			'data_pertemuan' => $this->pertemuan_model->pertemuan_getAll2($kelas),
			'tahun_akademik' => $this->tahun_akademik_model->getTahunAkademik(),
			'role' => $this->role_model->role_getById($id),

		);
		$this->load->view('kehadiran/v_list', $data);
	}

	public function isi_presensi()
	{
		$kelas = "all";
		$data = array(
			'tahun_akademik' => $this->tahun_akademik_model->getAktifTahunAkademik(),
			'data_pertemuan' => $this->pertemuan_model->pertemuan_getAll3($kelas),
		);
		date_default_timezone_set("Asia/Jakarta");
		$hari_ini = new DateTime();
		$result = $this->pertemuan_model->getTanggal();
		// var_dump($result);
		// exit();
		if ($hari_ini->format('Y-m-d') == $result[0]->tanggal_pertemuan || $hari_ini->format('Y-m-d') == $result[1]->tanggal_pertemuan) {
			if ($hari_ini->format('H:i:s') >= $result[0]->open && $hari_ini->format('H:i:s') <= $result[0]->closed || $hari_ini->format('H:i:s') >= $result[1]->open && $hari_ini->format('H:i:s') <= $result[1]->closed) {
				$this->load->view('form_presensi', $data);
			} else {
				$this->load->view('submit_presensi', $data);
			}
		} else {
			$this->load->view('submit_presensi', $data);
		}
	}

	public function submit()
	{
		$data = array(
			'npm' => $this->input->post('npm'),
			'kelas' =>  $this->input->post('kelas'),
			'pertemuan' => $this->input->post('pertemuan'),
			'keterangan' => $this->input->post('keterangan'),
			'status_kehadiran' => "Hadir",
			'tahun_akademik' => $this->input->post('ta'),
		);
		$this->kehadiran_model->kehadiran_insert('absen', $data);

		echo '<script language=JavaScript>alert("Absensi telah berhasil dilakukan!")
		onclick=location.href="https://ksaduajy.com/"</script>';
	}

	public function tambah_presensi()
	{
		$kelas = "all";
		$data = array(
			'title' => "Tambah Kehadiran Anggota",
			'tahun_akademik' => $this->tahun_akademik_model->getAktifTahunAkademik(),
			'data_pertemuan' => $this->pertemuan_model->pertemuan_getAll2($kelas),
		);
		$this->load->view('kehadiran/v_tambah', $data);
	}

	public function save_tambah()
	{
		$data = array(
			'npm' => $this->input->post('npm'),
			'kelas' =>  $this->input->post('kelas'),
			'pertemuan' => $this->input->post('pertemuan'),
			'keterangan' => $this->input->post('keterangan'),
			'status_kehadiran' => $this->input->post('status'),
			'tahun_akademik' => $this->input->post('ta'),
			'verifikasi' => date('Y-m-d H:i:s'),
		);
		$this->kehadiran_model->kehadiran_insert('absen', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil diupdate
			</div>');
		redirect("kehadiran", "refresh");
	}

	public function verifikasi_kehadiran($id)
	{
		$id = $id;
		$data['verifikasi'] = date('Y-m-d H:i:s');

		$this->kehadiran_model->kehadiran_update($id, 'absen', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil diupdate
			</div>');
		redirect('kehadiran');
	}

	public function edit_kehadiran($id_kehadiran)
	{
		$kelas = 'Beginner';
		$idM = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Edit Absensi Anggota KSAD",
			'data_presensi' => $this->kehadiran_model->kehadiran_getById($id_kehadiran),
			'data_pertemuan' => $this->pertemuan_model->pertemuan_getAll2($kelas),
			'tahun_akademik' => $this->tahun_akademik_model->tahun_akademik_getAll(),
			'user' => $this->user_model->user_getById($idM)->row(),
			'role' => $this->role_model->role_getById($idM),
		);
		$this->load->view('kehadiran/v_edit', $data);
	}

	public function save_ubah($id)
	{
		$id = $id;
		$data = array(
			'npm' => $this->input->post('npm'),
			'kelas' =>  $this->input->post('kelas'),
			'pertemuan' => $this->input->post('pertemuan'),
			'keterangan' => $this->input->post('keterangan'),
			'status_kehadiran' => $this->input->post('status_kehadiran'),
			'tahun_akademik' => $this->input->post('ta'),
			'verifikasi' => date('Y-m-d H:i:s'),
		);
		$this->kehadiran_model->kehadiran_update($id, 'absen', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil diupdate
			</div>');
		redirect('kehadiran');
	}

	public function hapus_kehadiran($id)
	{
		$id = $id;
		$this->kehadiran_model->kehadiran_delete($id, 'absen');

		// 		$this->anggota_model->anggota_update($id, 'anggota', $in_data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil dihapus
			</div>');
		redirect('kehadiran');
	}

	public function excel($ta, $pert)
	{
		$data = array(
			'title' => 'Absensi Anggota KSAD',
			'data_presensi' => $this->kehadiran_model->kehadiran_getAll4($ta, $pert)->result_array(),
		);
		$this->load->view('kehadiran/absensi_ksad_xls', $data);
	}
}
