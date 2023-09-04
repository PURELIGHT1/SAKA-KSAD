<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Lap_model extends CI_Model
{
	
	// public function kas_getAll()
	// {
	// 	$query = $this->db->query("SELECT * FROM uang");
	// 	return $query;
	// }
	public function list_kas()
	{
			$query = $this->db->query("SELECT * FROM kas ORDER BY id_kas");
		return $query;
		// $query = $this->db->query("SELECT a.*, k.uang_kas FROM anggota a JOIN kas k ON k.id_kas = a.kas");
		// return $query->row();
	}

	public function list_pangkal()
	{
		$query = $this->db->query("SELECT * FROM pangkal ORDER BY id_pangkal");
		return $query;
		// $query = $this->db->query("SELECT a.*, p.uang_pangkal FROM anggota a JOIN pangkal p ON p.id_pangkal= a.pangkal");
		// return $query->row();
	}

	public function kas_getAll()
	{
		$query = $this->db->query("SELECT * FROM kas");
		return $query;
	}
	public function pangkal_getAll()
	{
		$query = $this->db->query("SELECT * FROM pangkal");
		return $query;
	}

	public function keterangan_getAll()
	{
		$query = $this->db->query("SELECT * FROM ket_uang");
		return $query;
	}

}
?>