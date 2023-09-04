<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tahun_akademik_model extends CI_Model
{
	public function tahun_akademik_getAll()
	{
		$query = $this->db->query("SELECT * FROM tahun_akademik ORDER BY id_tahun_akademik DESC");
		return $query;
	}

	public function getTahunAkademik()
	{
		return $this->db->query("SELECT * FROM tahun_akademik ORDER BY id_tahun_akademik DESC LIMIT 10")->result();
	}

	public function getAktifTahunAkademik()
	{
		return $this->db->query("SELECT * FROM tahun_akademik ORDER BY id_tahun_akademik DESC LIMIT 1")->result_array();
	}


	public function tahun_akademik_getById($id)
	{
		$query = $this->db->query("SELECT * FROM tahun_akademik where id_tahun_akademik = $id");
		return $query->row();
	}

	public function tahun_akademik_insert($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function tahun_akademik_update ($id, $table, $data)
	{
		$query = $this->db->where('id_tahun_akademik', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function hapus_ta($table, $id)
	{
		$query = $this->db->where('id_tahun_akademik',$id);
		$query = $this->db->delete($table);
		return $query;
	}

}

?>