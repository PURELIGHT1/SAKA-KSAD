<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_model extends CI_Model
{
	public function role_getAll()
	{
		$query = $this->db->query("SELECT * FROM role");
		return $query;
	}

	public function role_getById($id)
	{
		$query = $this->db->query("SELECT * FROM role where id_role = $id");
		return $query->row();
	}

	public function role_insert($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function role_update ($id, $table, $data)
	{
		$query = $this->db->where('id_role', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function role_delete($where, $_table)
	{
		$this->db->where($where);
		$this->db->delete($_table);
	}
}

?>