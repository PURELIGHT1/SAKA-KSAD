<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class status_model extends CI_Model
{
	public function status_getAll()
	{
		$query = $this->db->query("SELECT * FROM status ORDER BY status_anggota ASC");
		return $query->result();
	}

	public function status_insert($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function status_update ($id, $table, $data)
	{
		$query = $this->db->where('id_status', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function status_delete($where, $_table)
	{
		$this->db->where($where);
		$this->db->delete($_table);
	}
}

?>