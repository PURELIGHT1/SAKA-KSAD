<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function user_getAll()
	{
		$query = $this->db->query("SELECT * FROM user u JOIN role r ON u.`id_role`=r.`id_role`WHERE u.status=1");
		return $query;
	}

	public function user_getById($id)
	{
		$query = $this->db->query("SELECT * FROM user u JOIN role r ON u.`id_role`=u.`id_role` WHERE id_user = $id");
		return $query;
	}

	public function user_insert($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function user_update ($id, $table, $data)
	{
		$query = $this->db->where('id_user', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function user_delete($where, $_table)
	{
		$this->db->where($where);
		$this->db->delete($_table);
	}

	public function check_oldpass($id_user, $old_pass)
	{
		$this->db->where('id_user', $id_user);
		$this->db->where('password', $old_pass);
		$query = $this->db->get('user');

		if($query->num_rows() > 0)

			return true;
		else
			return false;
	}

	public function updatepass($id_user, $data)
	{
		$this->db->set($data);
		$this->db->where('id_user', $id_user);
		$query = $this->db->update('user');
	}
}

?>