<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('tahun_akademik_model');
		$this->load->model('role_model');
		$this->load->model('lap_keuangan');
	}

	public function index()
	{
		$ta = $this->tahun_akademik_model->getAktifTahunAkademik();
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Laporan Keuangan",
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
			'data_keuangan' => $this->lap_keuangan->listKeuangan($ta[0]['id_tahun_akademik']),
			'tahun_akademik' => $this->tahun_akademik_model->getTahunAkademik(),
			'total_keuangan' => $this->lap_keuangan->GetKeuntungan(),
			'total_pendapatan' => $this->lap_keuangan->GetTotalKeuntungan(),
			'total_pengeluaran' => $this->lap_keuangan->GetTotalPengeluaran(),
		);
		// $data['data_keuanganById'] = $this->lap_keuangan->listKeuangan_byid($idkeuangan);
		// $data['jenis'] = $this->lap_keuangan->listJenisKeuangan();
		
		$this->load->view('keuangan/v_list', $data);
	}

	public function filter($ta)
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Laporan Keuangan",
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
			'data_keuangan' => $this->lap_keuangan->listKeuangan($ta),
			'tahun_akademik' => $this->tahun_akademik_model->getTahunAkademik(),
			'total_keuangan' => $this->lap_keuangan->GetKeuntungan(),
			'total_pendapatan' => $this->lap_keuangan->GetTotalKeuntungan(),
			'total_pengeluaran' => $this->lap_keuangan->GetTotalPengeluaran(),
		);
		
		$this->load->view('keuangan/v_list', $data);
	}

	public function tambah_keuangan()
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Tambah Keuangan",
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
			'list_jenis' => $this->lap_keuangan->listJenisKeuangan(),
			'tahun_akademik' => $this->tahun_akademik_model->tahun_akademik_getAll(),
		);
		$this->load->view('keuangan/v_tambah', $data);
	}

	public function save_tambah()
	{
		$ta = $this->tahun_akademik_model->getAktifTahunAkademik();
		$in_data = array(
			'jumlah' => $this->input->post('jumlah'),
			'jenis_keuangan' => $this->input->post('jenis_keuangan'),
			'ket_keuangan' => $this->input->post('ket_keuangan'),
			'isdeleted' => 0,
			'tahun_akademik' => $this->input->post('ta')
		);

		$path = "uploads/bukti/";

		if(!is_dir($path))
		{
			mkdir($path);
		}

		if(!empty($_FILES['bukti']['name']))
		{
			$config['upload_path'] 		= "./" .$path; // ./uploads/buku
			$config['allowed_types'] 	= "gif|jpg|png|jpeg";
			$config['file_name'] 		= time();
			$config['max_size']			= 1024;
			
			$this->upload->initialize($config);

			if($this->upload->do_upload("bukti"))
			{
				$uploadData = $this->upload->data();
				$in_data['bukti'] = "./" . $path . $uploadData['file_name'];
			}
		}

		$this->lap_keuangan->insertKeuangan('keuangan', $in_data);

		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil disimpan
			</div>');
		redirect("keuangan", "refresh");
	}

	public function edit_keuangan($id_keuangan)
	{
		$id = $this->session->userdata('id_user', 'id_role');
		$data = array(
			'title' => "Edit Keuangan",
			'user' => $this->user_model->user_getById($id)->row(),
			'role' => $this->role_model->role_getById($id),
			'keuangan' => $this->lap_keuangan->listKeuangan_byid($id_keuangan),
			'list_jenis' => $this->lap_keuangan->listJenisKeuangan(),
			'tahun_akademik' => $this->tahun_akademik_model->tahun_akademik_getAll(),
		);
		$this->load->view('keuangan/v_edit', $data);
	}

	public function save_ubah($id_keuangan)
	{
		$id = $id_keuangan;
		$data = array(
			'jumlah' => $this->input->post('jumlah'),
			'jenis_keuangan' =>  $this->input->post('jenis_keuangan'),
			'ket_keuangan' => $this->input->post('ket_keuangan'),
			'isdeleted' => 0,
			'tahun_akademik' =>$this->input->post('ta')
		);

		$path = "uploads/bukti/";

		if(!is_dir($path))
		{
			mkdir($path);
		}

		if(!empty($_FILES['bukti']['name']))
		{
			
			$dataKeuangan = $this->lap_keuangan->listKeuangan_byid($id_keuangan);
			@unlink($dataKeuangan->bukti);
			
			$config['upload_path'] 		= "./" .$path; // ./uploads/buku
			$config['allowed_types'] 	= "gif|jpg|png|jpeg";
			$config['file_name'] 		= time();
			$config['max_size']			= 1024;
			$this->upload->initialize($config);

			if($this->upload->do_upload("bukti"))
			{
				$uploadData = $this->upload->data();
				$data['bukti'] = "./" . $path . $uploadData['file_name'];
			}
		}

		$this->lap_keuangan->updateKeuangan($id, 'keuangan', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil diupdate
			</div>');
		redirect("keuangan", "refresh");
	}

	public function hapus_keuangan($id_keuangan)
	{
		$id = $id_keuangan;
		// $in_data['isdeleted']= 1;

		// $this->lap_keuangan->updateKeuangan($id, 'keuangan', $in_data);
		
		 //Delete From Database
		$dataKeuangan = $this->lap_keuangan->listKeuangan_byid($id_keuangan);
		@unlink($dataKeuangan->bukti);

		$this->lap_keuangan->deleteKeuangan($id);

		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
			data berhasil dihapus
			</div>');
		redirect('keuangan');
	}
}
