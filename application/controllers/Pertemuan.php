<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertemuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pertemuan_model');
        $this->load->model('role_model');
        $this->load->model('user_model');
    }

    public function index()
    {
        $kelas = 'all';
        $id = $this->session->userdata('id_user', 'id_role');
        $data = array(
            // 'data_pertemuan' => $this->pertemuan_model->pertemuan_getAll2($kelas),
            'user' => $this->user_model->user_getById($id)->row(),
            'data_pertemuan' => $this->pertemuan_model->pertemuan_getAll(),
            'role' => $this->role_model->role_getById($id),
            'title' => "List Pertemuan",
        );
        $this->load->view('pertemuan/v_list', $data);
    }

    public function filter($kelas)
    {
        $kelas = 'all';
        $id = $this->session->userdata('id_user', 'id_role');
        $data = array(
            'title' => "List Pertemuan",
            'data_pertemuan' => $this->pertemuan_model->pertemuan_getAll2($kelas),
            'user' => $this->user_model->user_getById($id)->row(),
            'role' => $this->role_model->role_getById($id),
        );
        $this->load->view('pertemuan/v_list', $data);
    }

    public function tambah_pertemuan()
    {
        $kelas = 'all';
        $id = $this->session->userdata('id_user', 'id_role');
        $data = array(
            'data_pertemuan' => $this->pertemuan_model->pertemuan_getAll2($kelas),
            'user' => $this->user_model->user_getById($id)->row(),
            'role' => $this->role_model->role_getById($id),
            'title' => "Tambah Pertemuan",
        );
        $this->load->view('pertemuan/v_tambah', $data);
    }

    public function save()
    {
        $data = array(
            'nama_pertemuan' => $this->input->post('nama'),
            'tanggal_pertemuan' => $this->input->post('tgl'),
            'kelas' => $this->input->post('kelas'),
            'materi' => $this->input->post('materi'),
            'open' => $this->input->post('open'),
            'closed' => $this->input->post('closed'),
            'status_pertemuan' => $this->input->post('status'),
        );
        $this->pertemuan_model->pertemuan_insert('pertemuan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil disimpan
			</div>');
        redirect("pertemuan", "refresh");
    }

    public function edit_pertemuan($id_pertemuan)
    {
        $id = $this->session->userdata('id_user', 'id_role');
        $data = array(
            'data_pertemuan' => $this->pertemuan_model->pertemuan_getById($id_pertemuan),
            'user' => $this->user_model->user_getById($id)->row(),
            'role' => $this->role_model->role_getById($id),
            'title' => "Edit Pertemuan",
        );
        $this->load->view('pertemuan/v_edit', $data);
    }

    public function update($id_pertemuan)
    {
        $id = $id_pertemuan;
        $data = array(
            'nama_pertemuan' => $this->input->post('nama'),
            'tanggal_pertemuan' => $this->input->post('tgl'),
            'kelas' => $this->input->post('kelas'),
            'materi' => $this->input->post('materi'),
            'open' => $this->input->post('open'),
            'closed' => $this->input->post('closed'),
            'status_pertemuan' => $this->input->post('status'),
        );
        $this->pertemuan_model->pertemuan_update($id, 'pertemuan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil diupdate
			</div>');
        redirect("pertemuan", "refresh");
    }

    public function hapus_pertemuan($id_pertemuan)
    {
        $this->pertemuan_model->pertemuan_delete('pertemuan', $id_pertemuan);
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil dihapus
			</div>');
        redirect('pertemuan');
    }
}
