<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentor extends CI_Controller
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
            'title' => "List Tentor",
            'data_tentor' => $this->anggota_model->anggota_getAll2($ta[0]['id_tahun_akademik'], "all"),
            'user' => $this->user_model->user_getById($id)->row(),
            'status_anggota' => $this->status_model->status_getAll(),
            'tahun_akademik' => $this->tahun_akademik_model->getTahunAkademik(),
            'role' => $this->role_model->role_getById($id),
        );
        $this->load->view('tentor/v_list', $data);
    }

    public function daftar_tentor()
    {
        $data = array(
            'tahun_akademik' => $this->tahun_akademik_model->getAktifTahunAkademik(),
            'data_prodi' => $this->prodi_model->prodi_getAll(),
        );
        $this->load->view('tutup', $data);
    }

    public function save_daftar()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'npm' =>  $this->input->post('npm'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'prodi' =>  $this->input->post('prodi'),
            'no_hp' => "0",
            'email' => "null",
            'alasan' => $this->input->post('alasan'),
            'status' => 2,
            'tahun_akademik' => $this->input->post('ta'),
            'kas' => 1,
            'pangkal' => 1,
            'ket_uang' => 0,
            'pengurus' => "Tentor",
            'angkatan' => $this->input->post('angkatan'),
        );
        $this->anggota_model->anggota_insert('anggota', $data);
        // $this->load->view('submit_pendaftaran', $data);

        echo '<script language=JavaScript>alert("Pendaftaran telah berhasil dilakukan!")
		onclick=location.href="https://ksaduajy.com/"</script>';
    }

    public function submit()
    {
        $data = array(
            'tahun_akademik' => $this->tahun_akademik_model->getAktifTahunAkademik(),
        );
        $this->load->view('submit_pendaftaran', $data);
    }

    public function filter($ta, $status)
    {
        $id = $this->session->userdata('id_user', 'id_role');
        $data = array(
            'title' => "List Tentor",
            'data_tentor' => $this->anggota_model->anggota_getAll2($ta, $status),
            'user' => $this->user_model->user_getById($id)->row(),
            'status_anggota' => $this->status_model->status_getAll(),
            'tahun_akademik' => $this->tahun_akademik_model->getTahunAkademik(),
            'role' => $this->role_model->role_getById($id),
        );
        $this->load->view('tentor/v_list', $data);
    }
    
    public function tambah_anggota()
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Tambah Tentor",
			'tahun_akademik' => $this->tahun_akademik_model->tahun_akademik_getAll(),
			'data_prodi' => $this->prodi_model->prodi_getAll(),
			'status' => $this->status_model->status_getAll(),
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
		);

		$this->load->view('tentor/v_tambah', $data);
	}

	public function save_tambah()
	{
		$data = array(
		    'nama' => $this->input->post('nama'),
            'npm' =>  $this->input->post('npm'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'prodi' =>  $this->input->post('prodi'),
            'no_hp' => "0",
            'email' => "null",
            'alasan' => $this->input->post('alasan'),
            'status' => 2,
            'tahun_akademik' => $this->input->post('ta'),
            'kas' => 1,
            'pangkal' => 1,
            'ket_uang' => 0,
            'pengurus' => "Tentor",
            'angkatan' => $this->input->post('angkatan'),
			'tahun_akademik' => $this->input->post('tahun_akademik'),
		);
		$this->anggota_model->anggota_insert('anggota', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil diupdate
			</div>');
		redirect("tentor", "refresh");
	}
	
// 	public function edit_anggota($id_anggota)
// 	{
// 		$id = $this->session->userdata('id_user', 'id_role');
// 		$data = array(
// 			'title' => "Edit Tentor",
// 			'anggota' => $this->anggota_model->anggota_getById($id_anggota),
// 			'prodi' => $this->prodi_model->prodi_getAll(),
// 			'status' => $this->status_model->status_getAll(),
// 			'tahun_akademik' => $this->tahun_akademik_model->tahun_akademik_getAll(),
// 			'user' => $this->user_model->user_getById($id)->row(),
// 			'role' => $this->role_model->role_getById($id),
// 		);
// 		$this->load->view('tentor/v_edit', $data);
// 	}

	public function save_ubah($id_anggota)
	{
		$id = $id_anggota;
		$data = array(
			'status' => 1,
		);
		$this->anggota_model->anggota_update($id, 'anggota', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil diupdate
			</div>');
		redirect("tentor", "refresh");
	}

	public function hapus_anggota($id_anggota)
	{
		$id = $id_anggota;

		$this->anggota_model->hapus_anggota('anggota', $id);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil dihapus
			</div>');
		redirect('tentor');
	}
}
