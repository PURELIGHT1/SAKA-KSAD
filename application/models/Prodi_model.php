<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prodi_model extends CI_Model
{
	public function prodi_getAll()
	{
		$query = $this->db->query("SELECT * FROM prodi");
		return $query;
	}

	public function prodi_getById($id)
	{
		$query = $this->db->query("SELECT * FROM prodi where id_prodi = $id");
		return $query->row();
	}

	public function prodi_insert($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function prodi_update ($id, $table, $data)
	{
		$query = $this->db->where('id_prodi', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function hapus_prodi($table, $id)
	{
		$query = $this->db->where('id_prodi',$id);
		$query = $this->db->delete($table);
		return $query;
	}
}

?>